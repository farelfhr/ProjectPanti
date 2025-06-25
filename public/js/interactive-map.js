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

    const size = Math.max(20, Math.min(50, (data.jumlah_anak || 0) / 3));
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
            <p class="text-sm"><strong>Anak Asuh:</strong> ${data.jumlah_anak || 0}</p>
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
function updateMarkers(filteredData, selectedKecamatan = null) {
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
    updateStats(filteredData, selectedKecamatan);
}

// Fungsi normalisasi kecamatan (sederhana, data sudah konsisten)
function normalizeKecamatan(str) {
    return (str || '').toLowerCase().trim();
}

// Fungsi untuk memfilter data berdasarkan kecamatan
function filterByKecamatan(kecamatan) {
    console.log('Filtering by kecamatan:', kecamatan);
    
    // Normalisasi nilai kecamatan yang dipilih
    const selectedKecamatan = kecamatan === 'all' || kecamatan === 'semua' 
        ? 'all' 
        : normalizeKecamatan(kecamatan);
    
    if (selectedKecamatan === 'all') {
        updateMarkers(orphanageData, null);
    } else {
        console.log('Orphanage data BEFORE filtering:', orphanageData);
        const filteredData = orphanageData.filter(data => {
            const dataKecamatan = normalizeKecamatan(data.kecamatan);
            return dataKecamatan === selectedKecamatan;
        });
        console.log('Filtered data:', filteredData);
        updateMarkers(filteredData, selectedKecamatan);
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

// Fungsi untuk memperbarui statistik
function updateStats(data, selectedKecamatan = null) {
    // Hitung total anak dari data hasil filter
    const totalChildren = data.reduce((sum, panti) => sum + (parseInt(panti.jumlah_anak) || 0), 0);

    // Perbaiki lokasi aktif:
    let totalLocations = 0;
    if (selectedKecamatan && selectedKecamatan !== 'all' && selectedKecamatan !== 'semua') {
        // Jika filter kecamatan, lokasi aktif = jumlah panti di kecamatan tsb
        totalLocations = data.length;
    } else {
        // Jika semua, lokasi aktif = jumlah panti yang punya lat/lng
        totalLocations = data.filter(panti => panti.lat && panti.lng).length;
    }

    // Update elemen statistik
    const totalChildrenElement = document.getElementById('totalChildren');
    const totalLocationsElement = document.getElementById('totalLocations');
    const totalProgramsElement = document.getElementById('totalPrograms');

    if (totalChildrenElement) totalChildrenElement.textContent = totalChildren.toLocaleString();
    if (totalLocationsElement) totalLocationsElement.textContent = totalLocations;

    // Ambil jumlah program/kegiatan dari API, filter jika ada kecamatan terpilih
    if (totalProgramsElement) {
        fetch('/api/kegiatan')
            .then(res => res.json())
            .then(kegiatan => {
                let filtered = kegiatan;
                if (selectedKecamatan && selectedKecamatan !== 'all' && selectedKecamatan !== 'semua') {
                    filtered = kegiatan.filter(k =>
                        normalizeKecamatan(k.lokasi) === selectedKecamatan
                    );
                }
                totalProgramsElement.textContent = filtered.length;
            })
            .catch(() => {
                totalProgramsElement.textContent = '-';
            });
    }
}

// Fungsi untuk update statistik dari API (untuk data real-time)
function updateStatsFromAPI() {
    fetch('/api/panti-stats')
        .then(res => res.json())
        .then(stats => {
            const totalChildrenElement = document.getElementById('totalChildren');
            const totalLocationsElement = document.getElementById('totalLocations');
            const totalProgramsElement = document.getElementById('totalPrograms');

            if (totalChildrenElement) totalChildrenElement.textContent = stats.total_anak.toLocaleString();
            if (totalLocationsElement) totalLocationsElement.textContent = stats.lokasi_aktif;
            if (totalProgramsElement) totalProgramsElement.textContent = stats.total_program;
        })
        .catch(error => {
            console.error('Error fetching stats:', error);
        });
}

// Fungsi untuk refresh data secara otomatis
function refreshData() {
    fetchOrphanageData();
    updateStatsFromAPI(); // Update statistik dari API
}

// Fungsi untuk mengambil data dari API dengan cache busting
async function fetchOrphanageData() {
    try {
        // Tambahkan timestamp untuk cache busting
        const timestamp = new Date().getTime();
        const response = await fetch(`/api/pantiasuhan?t=${timestamp}`);
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        orphanageData = await response.json();
        console.log('Fetched RAW data:', orphanageData); // Debug log
        // Data sudah benar, pastikan lat/lng tetap float dan jumlah_anak integer
        orphanageData = orphanageData.map(data => ({
            ...data,
            lat: parseFloat(data.lat),
            lng: parseFloat(data.lng),
            jumlah_anak: parseInt(data.jumlah_anak) || 0
        }));
        console.log('Fetched NORMALIZED data:', orphanageData); // Debug log
        // Inisialisasi peta dengan semua data
        updateMarkers(orphanageData);
        // Update statistik dari data lokal
        updateStats(orphanageData);
        // Update statistik dari API untuk memastikan data real-time
        updateStatsFromAPI();
    } catch (error) {
        console.error('Error fetching orphanage data:', error);
    }
}

// Panggil fungsi untuk mengambil data saat halaman dimuat
fetchOrphanageData();
updateStatsFromAPI(); // Hanya sekali saat load awal

// Auto-refresh data setiap 30 detik untuk memastikan data selalu up-to-date
setInterval(() => {
    // Jika filter kecamatan = semua, update dari API, jika tidak, update dari data lokal
    const locationFilter = document.getElementById('locationFilter');
    if (locationFilter && (locationFilter.value === 'all' || locationFilter.value === 'semua')) {
        updateStatsFromAPI();
    } else {
        // updateStats akan dipanggil otomatis oleh updateMarkers saat filter berubah
    }
    refreshData();
}, 30000);

// Event listener untuk refresh data saat halaman menjadi visible
// (hanya update dari API jika filter = semua)
document.addEventListener('visibilitychange', function() {
    if (!document.hidden) {
        const locationFilter = document.getElementById('locationFilter');
        if (locationFilter && (locationFilter.value === 'all' || locationFilter.value === 'semua')) {
            updateStatsFromAPI();
        }
        refreshData();
    }
});

// Event listener untuk refresh data saat window focus
window.addEventListener('focus', function() {
    const locationFilter = document.getElementById('locationFilter');
    if (locationFilter && (locationFilter.value === 'all' || locationFilter.value === 'semua')) {
        updateStatsFromAPI();
    }
    refreshData();
});

// Event listener untuk mendeteksi perubahan URL (jika ada navigasi dari admin)
let currentUrl = window.location.href;
setInterval(() => {
    if (window.location.href !== currentUrl) {
        currentUrl = window.location.href;
        refreshData();
    }
}, 1000);

// Event listener untuk mendeteksi perubahan data dari localStorage (jika admin update data)
window.addEventListener('storage', function(e) {
    if (e.key === 'panti_data_updated') {
        refreshData();
    }
});

// Fungsi untuk menandai bahwa data telah diupdate (bisa dipanggil dari admin panel)
function markDataAsUpdated() {
    localStorage.setItem('panti_data_updated', Date.now());
}

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
