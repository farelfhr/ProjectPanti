document.addEventListener("DOMContentLoaded", () => {
    const eventCards = document.querySelectorAll(".event-card");
    const modal = document.getElementById("eventDetailModal");

    if (!modal || eventCards.length === 0) {
        return;
    }

    // Ambil CSRF token dari meta tag
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content");

    // Set untuk melacak acara yang sudah diikuti
    let followedEvents = new Set();

    // Inisialisasi daftar acara yang sudah diikuti dari dashboard
    function initializeFollowedEvents() {
        const dashboardEvents = document.querySelectorAll(
            "#acara-diikuti-section [data-event-id]"
        );
        dashboardEvents.forEach((event) => {
            const eventId = event.getAttribute("data-event-id");
            if (eventId) {
                followedEvents.add(eventId);
            }
        });
    }

    // Panggil inisialisasi
    initializeFollowedEvents();

    function openModal(modalId) {
        const modalToOpen = document.getElementById(modalId);
        if (modalToOpen) {
            modalToOpen.classList.remove("hidden");
            modalToOpen.classList.add("flex");
            document.body.classList.add("overflow-hidden");
        }
    }

    window.closeModal = function (modalId) {
        const modalToClose = document.getElementById(modalId);
        if (modalToClose) {
            modalToClose.classList.add("hidden");
            modalToClose.classList.remove("flex");
            document.body.classList.remove("overflow-hidden");
        }
    };

    // Fungsi untuk update status tombol
    function updateFollowButtonStatus(eventId, followButton) {
        if (followedEvents.has(eventId)) {
            followButton.className =
                "bg-gray-400 text-white font-bold py-2 px-4 rounded transition duration-300 cursor-not-allowed";
            followButton.textContent = "Sudah Diikuti";
            followButton.disabled = true;
        } else {
            followButton.className =
                "bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300";
            followButton.textContent = "Ikuti Acara";
            followButton.disabled = false;
        }
    }

    eventCards.forEach((card) => {
        card.addEventListener("click", () => {
            const data = card.dataset;

            console.log("Card data:", data); // Debug: lihat semua data

            // Update modal content dengan error handling
            const modalJudul = modal.querySelector("#modal-judul");
            const modalGambar = modal.querySelector("#modal-gambar");
            const modalPembicara = modal.querySelector("#modal-pembicara");
            const modalLokasi = modal.querySelector("#modal-lokasi");
            const modalTanggal = modal.querySelector("#modal-tanggal");
            const modalWaktu = modal.querySelector("#modal-waktu");
            const modalDeskripsi = modal.querySelector(
                "#modal-deskripsi-panjang"
            );

            // Update text content
            if (modalJudul) modalJudul.textContent = data.judul || "";
            if (modalPembicara)
                modalPembicara.textContent = data.pembicara || "";
            if (modalLokasi) modalLokasi.textContent = data.lokasi || "";
            if (modalTanggal) modalTanggal.textContent = data.tanggal || "";
            if (modalWaktu) modalWaktu.textContent = data.waktu || "";
            if (modalDeskripsi)
                modalDeskripsi.textContent = data.deskripsiPanjang || "";

            // Handle gambar dengan debug
            if (modalGambar) {
                const gambarUrl = data.gambar;
                console.log("Original gambar URL:", gambarUrl); // Debug

                // Bersihkan src sebelumnya
                modalGambar.src = "";

                if (
                    gambarUrl &&
                    gambarUrl !== "undefined" &&
                    gambarUrl !== "null"
                ) {
                    // Set src dan alt
                    modalGambar.src = gambarUrl;
                    modalGambar.alt = `Gambar untuk ${
                        data.judul || "kegiatan"
                    }`;

                    console.log("Setting image src to:", gambarUrl); // Debug

                    // Event listener untuk debugging loading gambar
                    modalGambar.onload = function () {
                        console.log("Image loaded successfully:", this.src);
                    };

                    modalGambar.onerror = function () {
                        console.error("Failed to load image:", this.src);
                        // Fallback ke gambar default
                        this.src = "/images/PantiStock/panti-asuhan.jpg";
                        this.alt = "Gambar default kegiatan";
                    };
                } else {
                    // Gunakan gambar default jika tidak ada gambar
                    modalGambar.src = "/images/PantiStock/panti-asuhan.jpg";
                    modalGambar.alt = "Gambar default kegiatan";
                    console.log("Using default image"); // Debug
                }
            }

            // Set event ID dan update status tombol follow
            const followButton = modal.querySelector("#followEventButton");
            if (followButton) {
                followButton.dataset.eventId = data.id;
                updateFollowButtonStatus(data.id, followButton);
            }

            openModal("eventDetailModal");
        });
    });

    // Event listener untuk klik di luar modal
    modal.addEventListener("click", (e) => {
        if (e.target === modal) {
            closeModal("eventDetailModal");
        }
    });

    // Event listener untuk tombol follow
    const followEventButton = document.getElementById("followEventButton");
    if (followEventButton) {
        followEventButton.addEventListener("click", function () {
            const eventId = this.dataset.eventId;

            if (!eventId || !csrfToken) {
                showNotification(
                    "Terjadi kesalahan. Silakan muat ulang halaman.",
                    "error"
                );
                return;
            }

            // Cek apakah sudah mengikuti acara ini
            if (followedEvents.has(eventId)) {
                showNotification("Anda sudah mengikuti acara ini.", "error");
                return;
            }

            // Disable button
            this.disabled = true;
            this.textContent = "Memproses...";

            fetch(`/kegiatan/${eventId}/follow`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                    Accept: "application/json",
                },
            })
                .then((response) =>
                    response.json().then((data) => ({
                        status: response.status,
                        body: data,
                    }))
                )
                .then(({ status, body }) => {
                    if (status === 200) {
                        // Sukses - tambahkan ke set acara yang diikuti
                        followedEvents.add(eventId);

                        // Update tombol ke status sukses
                        this.className =
                            "bg-green-500 text-white font-bold py-2 px-4 rounded transition duration-300 cursor-not-allowed";
                        this.textContent = "Berhasil Diikuti";

                        showNotification(body.message, "success");

                        // Update dashboard jika ada
                        if (document.querySelector("#acara-diikuti-section")) {
                            addEventToDashboard(body.kegiatan);
                        }

                        // Setelah 2 detik, ubah ke status "Sudah Diikuti"
                        setTimeout(() => {
                            this.className =
                                "bg-gray-400 text-white font-bold py-2 px-4 rounded transition duration-300 cursor-not-allowed";
                            this.textContent = "Sudah Diikuti";
                        }, 2000);
                    } else if (status === 409) {
                        // Sudah mengikuti - tambahkan ke set dan update tombol
                        followedEvents.add(eventId);
                        this.className =
                            "bg-gray-400 text-white font-bold py-2 px-4 rounded transition duration-300 cursor-not-allowed";
                        this.textContent = "Sudah Diikuti";
                        showNotification(body.message, "error");
                    } else {
                        throw new Error(
                            body.message || "Gagal mengikuti acara."
                        );
                    }
                })
                .catch((error) => {
                    console.error("Fetch Error:", error);
                    // Reset tombol ke keadaan semula hanya jika belum mengikuti
                    if (!followedEvents.has(eventId)) {
                        this.disabled = false;
                        this.textContent = "Ikuti Acara";
                        this.className =
                            "bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300";
                    }
                    showNotification(error.message, "error");
                });
        });
    }

    /**
     * Menambahkan kartu acara baru ke section dashboard secara dinamis.
     * @param {object} kegiatan - Objek kegiatan dari server.
     */
    function addEventToDashboard(kegiatan) {
        const dashboardSection = document.querySelector(
            "#acara-diikuti-section"
        );
        if (!dashboardSection) return;

        const emptyMessage = dashboardSection.querySelector(".pesan-kosong");
        if (emptyMessage) {
            emptyMessage.remove();
        }

        // Cek agar tidak menambahkan acara yang sama dua kali
        if (
            dashboardSection.querySelector(
                `[data-event-id="${kegiatan.id_kegiatan}"]`
            )
        ) {
            return;
        }

        const card = document.createElement("div");
        card.className =
            "flex items-center p-4 border rounded-lg hover:bg-gray-50 transition";
        card.setAttribute("data-event-id", kegiatan.id_kegiatan);
        card.innerHTML = `
            <img src="${
                kegiatan.gambar
                    ? "/storage/" + kegiatan.gambar
                    : "/images/PantiStock/panti-asuhan.jpg"
            }" 
                 alt="${kegiatan.judul}" 
                 class="w-20 h-20 object-cover rounded-md mr-4">
            <div class="flex-grow">
                <h4 class="text-lg font-bold text-gray-900">${
                    kegiatan.judul
                }</h4>
                <p class="text-sm text-gray-600">
                    Diselenggarakan oleh: ${
                        kegiatan.panti
                            ? kegiatan.panti.nama_panti
                            : "Informasi tidak tersedia"
                    }
                </p>
                <p class="text-sm text-gray-500 mt-1">
                    <span class="font-medium">Tanggal:</span> 
                    ${new Date(kegiatan.tanggal).toLocaleDateString("id-ID", {
                        weekday: "long",
                        day: "numeric",
                        month: "long",
                        year: "numeric",
                    })}
                </p>
            </div>
        `;

        dashboardSection.appendChild(card);
    }

    // Fungsi showNotification yang konsisten
    function showNotification(message, type = "success") {
        const popup = document.getElementById("notification-popup");
        const messageElement = document.getElementById("notification-message");

        if (!popup || !messageElement) return;

        // Clear any existing timeout
        if (window.notificationTimeout) {
            clearTimeout(window.notificationTimeout);
        }

        messageElement.textContent = message;

        // Remove all color classes first
        popup.classList.remove("bg-red-500", "bg-green-500");

        // Add appropriate color class
        if (type === "success") {
            popup.classList.add("bg-green-500");
        } else {
            popup.classList.add("bg-red-500");
        }

        // Show notification
        popup.classList.remove("translate-x-full");

        // Hide notification after 3 seconds
        window.notificationTimeout = setTimeout(() => {
            popup.classList.add("translate-x-full");
        }, 3000);
    }
});
