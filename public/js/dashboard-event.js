document.addEventListener("DOMContentLoaded", function () {
    // Handle tombol batal ikuti di dashboard
    const unfollowButtons = document.querySelectorAll(".unfollow-event-btn");
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content");

    unfollowButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();

            const eventId = this.dataset.eventId;
            const eventTitle = this.dataset.eventTitle;

            // Konfirmasi sebelum membatalkan
            if (
                !confirm(
                    `Apakah Anda yakin ingin membatalkan partisipasi pada acara "${eventTitle}"?`
                )
            ) {
                return;
            }

            // Disable button
            this.disabled = true;
            this.innerHTML =
                '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Memproses...';

            fetch(`/kegiatan/${eventId}/unfollow`, {
                method: "DELETE",
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
                    // Response Anda menggunakan format: { status: 'success', message: '...' }
                    if (status === 200 && body.status === "success") {
                        // Sukses - hapus card dari dashboard
                        const eventCard = this.closest("[data-event-id]");
                        if (eventCard) {
                            eventCard.style.opacity = "0";
                            eventCard.style.transform = "translateY(-10px)";
                            eventCard.style.transition = "all 0.3s ease";

                            setTimeout(() => {
                                eventCard.remove();

                                // Cek apakah masih ada acara yang diikuti
                                const remainingCards =
                                    document.querySelectorAll(
                                        "#acara-diikuti-section [data-event-id]"
                                    );
                                if (remainingCards.length === 0) {
                                    // Tampilkan pesan kosong
                                    const emptyMessage =
                                        document.createElement("p");
                                    emptyMessage.className =
                                        "text-gray-600 pesan-kosong";
                                    emptyMessage.innerHTML =
                                        'Anda belum mengikuti acara apapun. Jelajahi halaman <a href="/kerjasama" class="text-blue-500 hover:underline">Kerjasama</a> untuk menemukan acara menarik!';
                                    document
                                        .querySelector("#acara-diikuti-section")
                                        .appendChild(emptyMessage);
                                }
                            }, 300);
                        }

                        showNotification(body.message, "success");
                    } else {
                        // Error dari server
                        throw new Error(
                            body.message ||
                                "Gagal membatalkan partisipasi acara."
                        );
                    }
                })
                .catch((error) => {
                    console.error("Unfollow Error:", error);
                    // Reset tombol ke keadaan semula
                    this.disabled = false;
                    this.textContent = "Batal Ikuti";
                    showNotification(error.message, "error");
                });
        });
    });

    // Handle tombol ikuti kegiatan dari section kegiatan mendatang
    const followButtons = document.querySelectorAll(
        ".follow-upcoming-event-btn"
    );

    followButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();

            const eventData = {
                id: this.dataset.eventId,
                judul: this.dataset.eventJudul,
                pembicara: this.dataset.eventPembicara,
                lokasi: this.dataset.eventLokasi,
                tanggal: this.dataset.eventTanggal,
                waktu: this.dataset.eventWaktu,
                deskripsiSingkat: this.dataset.eventDeskripsiSingkat,
                deskripsiPanjang: this.dataset.eventDeskripsiPanjang,
                gambar: this.dataset.eventGambar,
            };

            openEventModal(eventData);
        });
    });

    // Handle tombol follow di modal (menggunakan script yang sudah ada dari jadwal-kegiatan.js)
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
            const followedEvents = new Set();
            const dashboardEvents = document.querySelectorAll(
                "#acara-diikuti-section [data-event-id]"
            );
            dashboardEvents.forEach((event) => {
                const id = event.getAttribute("data-event-id");
                if (id) followedEvents.add(id);
            });

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
                    if (status === 200 && body.status === "success") {
                        const eventCard = this.closest("[data-event-id]");
                        if (eventCard) {
                            eventCard.style.opacity = "0";
                            eventCard.style.transform = "translateY(-10px)";
                            eventCard.style.transition = "all 0.3s ease";

                            setTimeout(() => {
                                eventCard.remove();

                                const remainingCards =
                                    document.querySelectorAll(
                                        "#acara-diikuti-section [data-event-id]"
                                    );
                                if (remainingCards.length === 0) {
                                    const emptyMessage =
                                        document.createElement("p");
                                    emptyMessage.className =
                                        "text-gray-600 pesan-kosong";
                                    emptyMessage.innerHTML =
                                        'Anda belum mengikuti acara apapun. Jelajahi halaman <a href="/kerjasama" class="text-blue-500 hover:underline">Kerjasama</a> untuk menemukan acara menarik!';
                                    document
                                        .querySelector("#acara-diikuti-section")
                                        .appendChild(emptyMessage);
                                }
                            }, 300);
                        }

                        showNotification(body.message, "success");
                    } else {
                        throw new Error(
                            body.message ||
                                "Gagal membatalkan partisipasi acara."
                        );
                    }
                })
                .catch((error) => {
                    console.error("Unfollow Error:", error);
                    this.disabled = false;
                    this.textContent = "Batal Ikuti";
                    showNotification(error.message, "error");
                });
        });
    }

    // Fungsi untuk membuka modal kegiatan
    function openEventModal(data) {
        const modal = document.getElementById("eventDetailModal");
        if (!modal) return;

        // Update modal content
        const modalJudul = modal.querySelector("#modal-judul");
        const modalGambar = modal.querySelector("#modal-gambar");
        const modalPembicara = modal.querySelector("#modal-pembicara");
        const modalLokasi = modal.querySelector("#modal-lokasi");
        const modalTanggal = modal.querySelector("#modal-tanggal");
        const modalWaktu = modal.querySelector("#modal-waktu");
        const modalDeskripsi = modal.querySelector("#modal-deskripsi-panjang");

        // Update text content
        if (modalJudul) modalJudul.textContent = data.judul || "";
        if (modalPembicara) modalPembicara.textContent = data.pembicara || "";
        if (modalLokasi) modalLokasi.textContent = data.lokasi || "";
        if (modalTanggal) modalTanggal.textContent = data.tanggal || "";
        if (modalWaktu) modalWaktu.textContent = data.waktu || "";
        if (modalDeskripsi)
            modalDeskripsi.textContent = data.deskripsiPanjang || "";

        // Handle gambar
        if (modalGambar) {
            const gambarUrl = data.gambar;
            modalGambar.src = "";

            if (
                gambarUrl &&
                gambarUrl !== "undefined" &&
                gambarUrl !== "null"
            ) {
                modalGambar.src = gambarUrl;
                modalGambar.alt = `Gambar untuk ${data.judul || "kegiatan"}`;

                modalGambar.onload = function () {
                    console.log("Image loaded successfully:", this.src);
                };

                modalGambar.onerror = function () {
                    console.error("Failed to load image:", this.src);
                    this.src = "/images/PantiStock/panti-asuhan.jpg";
                    this.alt = "Gambar default kegiatan";
                };
            } else {
                modalGambar.src = "/images/PantiStock/panti-asuhan.jpg";
                modalGambar.alt = "Gambar default kegiatan";
            }
        }

        // Set event ID untuk tombol follow
        const followButton = modal.querySelector("#followEventButton");
        if (followButton) {
            followButton.dataset.eventId = data.id;
            updateFollowButtonStatus(data.id, followButton);
        }

        // Buka modal
        modal.classList.remove("hidden");
        modal.classList.add("flex");
        document.body.classList.add("overflow-hidden");
    }

    // Fungsi untuk update status tombol follow
    function updateFollowButtonStatus(eventId, followButton) {
        // Cek apakah user sudah mengikuti event ini
        const followedEvents = new Set();
        const dashboardEvents = document.querySelectorAll(
            "#acara-diikuti-section [data-event-id]"
        );
        dashboardEvents.forEach((event) => {
            const id = event.getAttribute("data-event-id");
            if (id) followedEvents.add(id);
        });

        if (followedEvents.has(eventId)) {
            followButton.className =
                "bg-gray-400 text-white font-bold py-2 px-4 rounded transition duration-300 cursor-not-allowed";
            followButton.textContent = "Sudah Diikuti";
            followButton.disabled = true;
        } else {
            followButton.className =
                "bg-[#E9762B] hover:bg-[#D0661A] text-white font-bold py-2 px-4 rounded transition duration-300";
            followButton.textContent = "Ikuti Acara";
            followButton.disabled = false;
        }
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
            "flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50 transition";
        card.setAttribute("data-event-id", kegiatan.id_kegiatan);
        card.innerHTML = `
            <div class="flex">
                <img src="${
                    kegiatan.gambar
                        ? kegiatan.gambar
                        : "/images/PantiStock/panti-asuhan.jpg"
                }" 
                     alt="${kegiatan.judul}" 
                     class="w-24 h-24 object-cover rounded-md mr-4">
                <div class="flex-grow">
                    <h4 class="text-lg font-bold text-gray-900">${
                        kegiatan.judul
                    }</h4>
                    <p class="text-sm text-gray-600">
                        ${
                            kegiatan.deskripsi_singkat
                                ? kegiatan.deskripsi_singkat.substring(0, 100) +
                                  "..."
                                : "Tidak ada deskripsi"
                        }
                    </p>
                    <div class="flex items-center gap-1 mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <p class="text-sm text-gray-500">
                            ${new Date(kegiatan.tanggal).toLocaleDateString(
                                "id-ID",
                                {
                                    weekday: "long",
                                    day: "numeric",
                                    month: "long",
                                    year: "numeric",
                                }
                            )}
                        </p>
                    </div>
                    <div class="flex items-center gap-1 mt-1">
                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        <p class="text-sm text-gray-500">
                            ${kegiatan.lokasi || "Lokasi tidak tersedia"}
                        </p>
                    </div>
                </div>
            </div>
            <button type="button" 
                class="unfollow-event-btn px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors"
                data-event-id="${kegiatan.id_kegiatan}"
                data-event-title="${kegiatan.judul}">
                Batal Ikuti
            </button>
        `;

        dashboardSection.appendChild(card);

        // Attach event listener untuk tombol batal ikuti yang baru
        const newUnfollowBtn = card.querySelector(".unfollow-event-btn");
        if (newUnfollowBtn) {
            newUnfollowBtn.addEventListener("click", function (e) {
                e.preventDefault();

                const eventId = this.dataset.eventId;
                const eventTitle = this.dataset.eventTitle;

                if (
                    !confirm(
                        `Apakah Anda yakin ingin membatalkan partisipasi pada acara "${eventTitle}"?`
                    )
                ) {
                    return;
                }

                this.disabled = true;
                this.innerHTML =
                    '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Memproses...';

                fetch(`/kegiatan/${eventId}/unfollow`, {
                    method: "DELETE",
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
                            const eventCard = this.closest("[data-event-id]");
                            if (eventCard) {
                                eventCard.style.opacity = "0";
                                eventCard.style.transform = "translateY(-10px)";
                                eventCard.style.transition = "all 0.3s ease";

                                setTimeout(() => {
                                    eventCard.remove();

                                    const remainingCards =
                                        document.querySelectorAll(
                                            "#acara-diikuti-section [data-event-id]"
                                        );
                                    if (remainingCards.length === 0) {
                                        const emptyMessage =
                                            document.createElement("p");
                                        emptyMessage.className =
                                            "text-gray-600 pesan-kosong";
                                        emptyMessage.innerHTML =
                                            'Anda belum mengikuti acara apapun. Jelajahi halaman <a href="/kerjasama" class="text-blue-500 hover:underline">Kerjasama</a> untuk menemukan acara menarik!';
                                        document
                                            .querySelector(
                                                "#acara-diikuti-section"
                                            )
                                            .appendChild(emptyMessage);
                                    }
                                }, 300);
                            }

                            showNotification(body.message, "success");
                        } else {
                            throw new Error(
                                body.message ||
                                    "Gagal membatalkan partisipasi acara."
                            );
                        }
                    })
                    .catch((error) => {
                        console.error("Unfollow Error:", error);
                        this.disabled = false;
                        this.textContent = "Batal Ikuti";
                        showNotification(error.message, "error");
                    });
            });
        }
    }

    // Fungsi showNotification
    function showNotification(message, type = "success") {
        const popup = document.getElementById("notification-popup");
        const messageElement = document.getElementById("notification-message");

        if (!popup || !messageElement) return;

        if (window.notificationTimeout) {
            clearTimeout(window.notificationTimeout);
        }

        messageElement.textContent = message;
        popup.classList.remove("bg-red-500", "bg-green-500");

        if (type === "success") {
            popup.classList.add("bg-green-500");
        } else {
            popup.classList.add("bg-red-500");
        }

        popup.classList.remove("translate-x-full");

        window.notificationTimeout = setTimeout(() => {
            popup.classList.add("translate-x-full");
        }, 3000);
    }

    // Fungsi global untuk menutup modal (agar bisa dipanggil dari HTML)
    window.closeModal = function (modalId) {
        const modalToClose = document.getElementById(modalId);
        if (modalToClose) {
            modalToClose.classList.add("hidden");
            modalToClose.classList.remove("flex");
            document.body.classList.remove("overflow-hidden");
        }
    };
});
