// Hapus import statement karena tidak dibutuhkan jika diload langsung
// import { showNotification } from "./notifications.js";

// Fungsi showNotification (copy dari notification.js untuk standalone use)
function showNotification(message, type = "success") {
    const popup = document.getElementById("notification-popup");
    const messageElement = document.getElementById("notification-message");

    if (!popup || !messageElement) return;

    let notificationTimeout;
    clearTimeout(notificationTimeout);

    messageElement.textContent = message;
    if (type === "success") {
        popup.classList.remove("bg-red-500");
        popup.classList.add("bg-green-500");
    } else {
        popup.classList.remove("bg-green-500");
        popup.classList.add("bg-red-500");
    }

    popup.classList.remove("translate-x-full");

    notificationTimeout = setTimeout(() => {
        popup.classList.add("translate-x-full");
    }, 3000);
}

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

    eventCards.forEach((card) => {
        card.addEventListener("click", () => {
            const data = card.dataset;

            // Update modal content
            modal.querySelector("#modal-judul").textContent = data.judul;
            modal.querySelector("#modal-gambar").src = data.gambar;
            modal.querySelector(
                "#modal-gambar"
            ).alt = `Gambar untuk ${data.judul}`;
            modal.querySelector("#modal-pembicara").textContent =
                data.pembicara;
            modal.querySelector("#modal-lokasi").textContent = data.lokasi;
            modal.querySelector("#modal-tanggal").textContent = data.tanggal;
            modal.querySelector("#modal-waktu").textContent = data.waktu;
            modal.querySelector("#modal-deskripsi-panjang").textContent =
                data.deskripsiPanjang;

            // Set event ID untuk tombol follow
            const followButton = modal.querySelector("#followEventButton");
            if (followButton) {
                followButton.dataset.eventId = data.id;
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
                        // Sukses
                        this.className =
                            "bg-green-500 text-white font-bold py-2 px-4 rounded transition duration-300 cursor-not-allowed";
                        this.textContent = "Berhasil Diikuti";
                        showNotification(body.message, "success");

                        // Update dashboard jika ada
                        if (document.querySelector("#acara-diikuti-section")) {
                            addEventToDashboard(body.kegiatan);
                        }
                    } else if (status === 409) {
                        // Sudah mengikuti
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
                    this.disabled = false;
                    this.textContent = "Ikuti Acara";
                    this.className =
                        "bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300";
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
});
