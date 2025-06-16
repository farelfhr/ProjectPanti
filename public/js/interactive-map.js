import { orphanageData } from './orphange-data.js';

// Inisialisasi peta
let map = L.map("map").setView([-7.966724, 112.632532], 13);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap contributors",
}).addTo(map);

let markers = [];
let currentYear = 2025;
let timelineChart;
let isPlaying = false;

// Fungsi untuk membuat marker kustom
function createCustomMarker(data) {
    const size = Math.max(20, Math.min(50, data.children / 3));
    const color = data.programs.includes("pendidikan")
        ? "#41644A"
        : data.programs.includes("kesehatan")
        ? "#0D4715"
        : data.programs.includes("keterampilan")
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
    }).addTo(map);

    // Event listener untuk tooltip hover
    marker.on("mouseover", function (e) {
        showTooltip(e, data);
    });

    marker.on("mouseout", function () {
        hideTooltip();
    });

    // Event listener untuk click
    marker.on("click", function (e) {
        showOrphanageDetails(data);
    });

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
            <div class="yearly-stats">
                <h3>Perkembangan Jumlah Anak</h3>
                <div class="stats-grid">
                    ${Object.entries(data.yearlyData).map(([year, count]) => `
                        <div class="stat-item">
                            <span class="year">${year}</span>
                            <span class="count">${count}</span>
                        </div>
                    `).join('')}
                </div>
            </div>
        </div>
    `;

    // Tampilkan container
    detailsContainer.style.display = "block";
}

// Fungsi untuk memperbarui marker berdasarkan filter
function updateMarkers() {
    const programFilter = document.getElementById("programFilter").value;
    const locationFilter = document.getElementById("locationFilter").value;

    // Hapus marker yang ada
    markers.forEach((marker) => map.removeLayer(marker));
    markers = [];

    // Filter data
    let filteredData = orphanageData.filter((item) => {
        const programMatch =
            programFilter === "all" || item.programs.includes(programFilter);
        const locationMatch =
            locationFilter === "all" || item.city === locationFilter;
        return programMatch && locationMatch;
    });

    // Buat marker baru
    filteredData.forEach((data) => {
        const marker = createCustomMarker(data);
        markers.push(marker);
    });

    // Update statistik
    updateStatistics(filteredData);
}

// Fungsi untuk memperbarui statistik
function updateStatistics(data) {
    const totalChildren = data.reduce((sum, item) => sum + item.children, 0);
    const totalLocations = data.length;
    const totalPrograms =
        [...new Set(data.flatMap((item) => item.programs))].length *
        data.length;

    document.getElementById("totalChildren").textContent =
        totalChildren.toLocaleString();
    document.getElementById("totalLocations").textContent = totalLocations;
    document.getElementById("totalPrograms").textContent = totalPrograms;
}

// Fungsi untuk inisialisasi chart timeline
function initTimelineChart() {
    const ctx = document.getElementById("timelineChart").getContext("2d");
    const years = ["2020", "2021", "2022", "2023", "2024"];
    const datasets = orphanageData.map((item, index) => ({
        label: item.name,
        data: years.map((year) => item.yearlyData[year] || 0),
        borderColor: `hsl(${120 + index * 30}, 60%, 40%)`,
        backgroundColor: `hsla(${120 + index * 30}, 60%, 40%, 0.1)`,
        borderWidth: 3,
        fill: false,
        tension: 0.4,
    }));

    timelineChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: years,
            datasets: datasets,
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: "Perkembangan Jumlah Anak per Tahun",
                    font: {
                        size: 16,
                        weight: "bold",
                    },
                    color: "#41644A",
                },
                legend: {
                    position: "bottom",
                    labels: {
                        boxWidth: 15,
                        padding: 20,
                    },
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: "Jumlah Anak",
                    },
                },
                x: {
                    title: {
                        display: true,
                        text: "Tahun",
                    },
                },
            },
            animation: {
                duration: 2000,
                easing: "easeInOutQuart",
            },
        },
    });
}

// Fungsi untuk animasi timeline
function playTimeline() {
    if (isPlaying) return;

    isPlaying = true;
    const playButton = document.getElementById("playTimeline");
    const playIcon = document.getElementById("playIcon");
    const playText = document.getElementById("playText");

    playIcon.textContent = "⏸";
    playText.textContent = "Menjalankan...";

    const years = [2020, 2021, 2022, 2023, 2024];
    let currentIndex = 0;

    const interval = setInterval(() => {
        if (currentIndex >= years.length) {
            clearInterval(interval);
            isPlaying = false;
            playIcon.textContent = "▶";
            playText.textContent = "Putar Timeline";
            return;
        }

        const year = years[currentIndex];
        document.getElementById("yearSlider").value = year;
        document.getElementById("yearValue").textContent = year;

        // Update chart dengan animasi
        timelineChart.update("active");

        currentIndex++;
    }, 1500);
}

// Event listeners
document
    .getElementById("programFilter")
    .addEventListener("change", updateMarkers);
document
    .getElementById("locationFilter")
    .addEventListener("change", updateMarkers);
document.getElementById("yearSlider").addEventListener("input", function (e) {
    document.getElementById("yearValue").textContent = e.target.value;
    currentYear = parseInt(e.target.value);
});
document.getElementById("playTimeline").addEventListener("click", playTimeline);

// Inisialisasi
document.addEventListener("DOMContentLoaded", function () {
    updateMarkers();
    initTimelineChart();
});

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

    .yearly-stats {
        margin-top: 20px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
        gap: 10px;
        margin-top: 10px;
    }

    .stat-item {
        background: #f5f5f5;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
    }

    .stat-item .year {
        display: block;
        font-weight: bold;
        color: #41644A;
    }

    .stat-item .count {
        display: block;
        font-size: 1.2em;
        margin-top: 5px;
    }

    .details-info p {
        margin: 10px 0;
        line-height: 1.5;
    }
`;
document.head.appendChild(style);
