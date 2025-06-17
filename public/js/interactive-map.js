// Inisialisasi peta
let map = L.map("map").setView([-7.966724, 112.632532], 13);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap contributors",
}).addTo(map);

let markers = [];
let orphanageData = []; // Variabel untuk menyimpan data panti asuhan

// Fungsi untuk membuat marker kustom
function createCustomMarker(data) {
    if (!data.lat || !data.lng) {
        console.warn('Missing coordinates for:', data.nama);
        return null;
    }

    const size = Math.max(20, Math.min(50, (data.children || 0) / 3));
    const color = data.programs && data.programs.includes("pendidikan")
        ? "#41644A"
        : data.programs && data.programs.includes("kesehatan")
        ? "#0D4715"
        : data.programs && data.programs.includes("keterampilan")
        ? "#2D5233"
        : "#1F4025";

    const marker = L.circleMarker([data.lat, data.lng], {
        radius: size,
        fillColor: color,
        color: "#fff",
        weight: 3,
        opacity: 1,
        fillOpacity: 0.8,
        className: "marker-pulse",
    });

    // Tambahkan popup dengan informasi panti
    marker.bindPopup(`
        <div class="p-2">
            <h3 class="font-bold text-lg mb-2">${data.nama}</h3>
            <p class="text-sm mb-1"><strong>Alamat:</strong> ${data.alamat}</p>
            <p class="text-sm mb-1"><strong>Kecamatan:</strong> ${data.kecamatan}</p>
            <p class="text-sm mb-1"><strong>Program:</strong> ${(data.programs || []).join(", ")}</p>
            <p class="text-sm"><strong>Anak Asuh:</strong> ${data.children || 0}</p>
        </div>
    `);

    return marker;
}

// Fungsi untuk menampilkan tooltip
function showTooltip(e, data) {
    const tooltip = document.getElementById("tooltip");
    const tooltipTitle = document.getElementById("tooltipTitle");
    const tooltipContent = document.getElementById("tooltipContent");

    tooltipTitle.textContent = data.name;
    tooltipContent.innerHTML = `
                <strong>Jumlah Anak:</strong> ${data.children}<br>
                <strong>Program:</strong> ${data.programs.join(", ")}<br>
                <strong>Lokasi:</strong> ${data.city}<br>
                <strong>Cerita:</strong> ${data.stories}
            `;

    tooltip.style.left = e.originalEvent.pageX + 10 + "px";
    tooltip.style.top = e.originalEvent.pageY + 10 + "px";
    tooltip.classList.add("show");
}

// Fungsi untuk menyembunyikan tooltip
function hideTooltip() {
    document.getElementById("tooltip").classList.remove("show");
}

// Fungsi untuk menampilkan detail panti asuhan
function showOrphanageDetails(data) {
    const detailsContainer = document.getElementById("orphanageDetails");
    if (!detailsContainer) {
        // Buat container jika belum ada
        const container = document.createElement("div");
        container.id = "orphanageDetails";
        container.className = "orphanage-details";
        document.body.appendChild(container);
    }

    // Update konten
    detailsContainer.innerHTML = `
        <div class="details-content">
            <button class="close-button" onclick="document.getElementById('orphanageDetails').style.display='none'">×</button>
            <h2>${data.name}</h2>
            <div class="details-info">
                <p><strong>Jumlah Anak:</strong> ${data.children}</p>
                <p><strong>Program:</strong> ${data.programs.join(", ")}</p>
                <p><strong>Lokasi:</strong> ${data.city}</p>
                <p><strong>Cerita:</strong> ${data.stories}</p>
            </div>
        </div>
    `;

    // Tampilkan container
    detailsContainer.style.display = "block";
}

// Fungsi untuk memperbarui marker berdasarkan filter
function updateMarkers(filteredData) {
    // Hapus semua marker yang ada
    markers.forEach(marker => map.removeLayer(marker));
    markers = [];

    // Tambahkan marker baru untuk data yang difilter
    filteredData.forEach(data => {
        const marker = createCustomMarker(data);
        if (marker) {
            marker.addTo(map);
            markers.push(marker);
        }
    });

    // Update statistik
    updateStats(filteredData);
}

// Fungsi untuk memfilter data berdasarkan kecamatan
function filterByKecamatan(kecamatan) {
    console.log('Filtering by kecamatan:', kecamatan);
    
    // Normalisasi nilai kecamatan yang dipilih
    const selectedKecamatan = kecamatan === 'all' || kecamatan === 'semua' 
        ? 'all' 
        : kecamatan.toLowerCase().trim();
    
    if (selectedKecamatan === 'all') {
        updateMarkers(orphanageData);
    } else {
        console.log('Orphanage data BEFORE filtering:', orphanageData);
        const filteredData = orphanageData.filter(data => {
            const dataKecamatan = data.kecamatan ? String(data.kecamatan).toLowerCase().trim() : '';
            console.log('Evaluating filter for:', data.name, '[Data Kec]:', dataKecamatan, '[Selected Kec]:', selectedKecamatan, 'Match:', dataKecamatan === selectedKecamatan);
            return dataKecamatan === selectedKecamatan;
        });
        console.log('Filtered data:', filteredData);
        updateMarkers(filteredData);
    }
}

// Event listener untuk dropdown dan button kecamatan
document.addEventListener('DOMContentLoaded', function() {
    // Event listener untuk dropdown
    const locationFilter = document.getElementById('locationFilter');
    if (locationFilter) {
        locationFilter.addEventListener('change', function() {
            filterByKecamatan(this.value);
        });
    }

    // Event listener untuk button kecamatan
    const kecamatanButtons = document.querySelectorAll('.flex-wrap button[data-district]');
    kecamatanButtons.forEach(button => {
        button.addEventListener('click', function() {
            const kecamatan = this.dataset.district;
            
            // Update tampilan button
            kecamatanButtons.forEach(btn => {
                btn.classList.remove('bg-[#41644A]', 'text-[#F1F0E9]');
                btn.classList.add('border-2', 'border-[#D0D5CB]');
            });
            this.classList.remove('border-2', 'border-[#D0D5CB]');
            this.classList.add('bg-[#41644A]', 'text-[#F1F0E9]');
            
            // Update dropdown jika ada
            if (locationFilter) {
                locationFilter.value = kecamatan === 'semua' ? 'all' : kecamatan;
            }
            
            filterByKecamatan(kecamatan);
        });
    });
});

// Fungsi untuk mengambil data dari API
async function fetchOrphanageData() {
    try {
        const response = await fetch('/api/pantiasuhan');
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        orphanageData = await response.json();
        console.log('Fetched RAW data:', orphanageData);
        
        // Normalisasi data (termasuk mengekstrak kecamatan dari 'city')
        orphanageData = orphanageData.map(data => {
            const kecamatanMatch = data.city ? data.city.match(/Kec\. ([^,]+)/) : null;
            const extractedKecamatan = kecamatanMatch && kecamatanMatch[1] ? kecamatanMatch[1].toLowerCase().trim() : '';

            return {
                ...data,
                kecamatan: extractedKecamatan,
                lat: parseFloat(data.lat),
                lng: parseFloat(data.lng)
            };
        });
        
        console.log('Fetched NORMALIZED data:', orphanageData);
        
        // Inisialisasi peta dengan semua data
        updateMarkers(orphanageData);
        
        // Update statistik
        updateStats(orphanageData);
    } catch (error) {
        console.error('Error fetching orphanage data:', error);
    }
}

// Fungsi untuk memperbarui statistik
function updateStats(data) {
    const totalChildren = data.reduce((sum, panti) => sum + (parseInt(panti.children) || 0), 0);
    const totalLocations = new Set(data.map(panti => panti.kecamatan)).size;
    const totalPrograms = new Set(data.flatMap(panti => panti.programs || [])).size;
    
    // Update elemen statistik
    const totalChildrenElement = document.getElementById('totalChildren');
    const totalLocationsElement = document.getElementById('totalLocations');
    const totalProgramsElement = document.getElementById('totalPrograms');
    
    if (totalChildrenElement) totalChildrenElement.textContent = totalChildren.toLocaleString();
    if (totalLocationsElement) totalLocationsElement.textContent = totalLocations;
    if (totalProgramsElement) totalProgramsElement.textContent = totalPrograms;
}

// Panggil fungsi untuk mengambil data saat halaman dimuat
fetchOrphanageData();

// Tambahkan CSS untuk styling
const style = document.createElement('style');
style.textContent = `
    .orphanage-details {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.2);
        z-index: 1000;
        max-width: 500px;
        width: 90%;
        max-height: 80vh;
        overflow-y: auto;
    }

    .details-content {
        position: relative;
    }

    .close-button {
        position: absolute;
        right: 0;
        top: 0;
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
        color: #666;
    }

    .details-info {
        margin: 20px 0;
    }

    .details-info p {
        margin: 10px 0;
        line-height: 1.5;
    }
`;
document.head.appendChild(style);
