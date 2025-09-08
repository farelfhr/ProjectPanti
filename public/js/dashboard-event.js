// File: public/js/enhanced-dashboard-event.js
document.addEventListener("DOMContentLoaded", function () {
    let currentEventData = null;

    // Enhanced Modal Management
    class ModalManager {
        constructor() {
            this.modal = document.getElementById("unfollowModal");
            this.modalContent = document.getElementById("modalContent");
            this.eventTitleModal = document.getElementById("eventTitleModal");
            this.cancelBtn = document.getElementById("cancelUnfollow");
            this.confirmBtn = document.getElementById("confirmUnfollow");

            this.init();
        }

        init() {
            // Close on backdrop click
            this.modal.addEventListener("click", (e) => {
                if (e.target === this.modal) {
                    this.close();
                }
            });

            // Close on cancel button
            this.cancelBtn.addEventListener("click", () => this.close());

            // ESC key to close
            document.addEventListener("keydown", (e) => {
                if (
                    e.key === "Escape" &&
                    !this.modal.classList.contains("hidden")
                ) {
                    this.close();
                }
            });
        }

        show(eventData) {
            currentEventData = eventData;
            this.eventTitleModal.textContent = eventData.title;

            this.modal.classList.remove("hidden");
            document.body.style.overflow = "hidden";

            // Reset animation
            this.modalContent.classList.remove("animate-fade-in-scale");
            void this.modalContent.offsetWidth; // Trigger reflow
            this.modalContent.classList.add("animate-fade-in-scale");
        }

        close() {
            this.modalContent.classList.add("animate-slide-out-up");

            setTimeout(() => {
                this.modal.classList.add("hidden");
                document.body.style.overflow = "";
                this.modalContent.classList.remove(
                    "animate-slide-out-up",
                    "animate-fade-in-scale"
                );
                currentEventData = null;
            }, 300);
        }

        setLoading(isLoading) {
            if (isLoading) {
                this.confirmBtn.disabled = true;
                this.confirmBtn.innerHTML = `
                    <div class="flex items-center justify-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memproses...
                    </div>
                `;
            } else {
                this.confirmBtn.disabled = false;
                this.confirmBtn.innerHTML = `
                    <div class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Ya, Batalkan
                    </div>
                `;
            }
        }
    }

    // Enhanced Notification System
    class NotificationManager {
        constructor() {
            this.popup = document.getElementById("notification-popup");
            this.icon = document.getElementById("notification-icon");
            this.title = document.getElementById("notification-title");
            this.message = document.getElementById("notification-message");
            this.progress = document.getElementById(
                "notification-progress"
            )?.firstElementChild;
            this.closeBtn = document.getElementById("closeNotification");

            this.timeout = null;
            this.init();
        }

        init() {
            this.closeBtn?.addEventListener("click", () => this.hide());
        }

        show(title, message, type = "success", duration = 5000) {
            // Fallback to old notification system if new elements don't exist
            if (!this.popup || !this.icon) {
                this.showLegacyNotification(message, type);
                return;
            }

            // Clear existing timeout
            if (this.timeout) {
                clearTimeout(this.timeout);
            }

            // Set content
            this.title.textContent = title;
            this.message.textContent = message;

            // Set icon and colors based on type
            const configs = {
                success: {
                    icon: '<svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
                    borderColor: "border-green-400",
                    progressColor: "from-green-400 to-green-500",
                },
                error: {
                    icon: '<svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
                    borderColor: "border-red-400",
                    progressColor: "from-red-400 to-red-500",
                },
                warning: {
                    icon: '<svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>',
                    borderColor: "border-yellow-400",
                    progressColor: "from-yellow-400 to-yellow-500",
                },
            };

            const config = configs[type] || configs.success;

            this.icon.innerHTML = config.icon;
            this.popup.firstElementChild.className = `bg-white rounded-lg shadow-2xl border-l-4 ${config.borderColor} overflow-hidden`;

            if (this.progress) {
                this.progress.className = `h-full bg-gradient-to-r ${config.progressColor} transition-all duration-500 ease-linear`;
                this.progress.style.width = "100%";
                setTimeout(() => {
                    this.progress.style.width = "0%";
                }, 100);
            }

            // Show notification
            this.popup.classList.remove("translate-x-full");

            // Auto hide after duration
            this.timeout = setTimeout(() => {
                this.hide();
            }, duration);
        }

        // Fallback to existing notification system
        showLegacyNotification(message, type) {
            const legacyPopup = document.getElementById("notification-popup");
            const legacyMessage = document.getElementById(
                "notification-message"
            );

            if (!legacyPopup || !legacyMessage) return;

            if (window.notificationTimeout) {
                clearTimeout(window.notificationTimeout);
            }

            legacyMessage.textContent = message;
            legacyPopup.classList.remove("bg-red-500", "bg-green-500");

            if (type === "success") {
                legacyPopup.classList.add("bg-green-500");
            } else {
                legacyPopup.classList.add("bg-red-500");
            }

            legacyPopup.classList.remove("translate-x-full");

            window.notificationTimeout = setTimeout(() => {
                legacyPopup.classList.add("translate-x-full");
            }, 3000);
        }

        hide() {
            this.popup?.classList.add("translate-x-full");
            if (this.timeout) {
                clearTimeout(this.timeout);
                this.timeout = null;
            }
        }
    }

    // Event Card Manager
    class EventCardManager {
        static removeCard(eventId) {
            const eventCard = document.querySelector(
                `[data-event-id="${eventId}"]`
            );
            if (!eventCard) return;

            // Add removal animation
            eventCard.style.transform = "translateX(-100%)";
            eventCard.style.opacity = "0";
            eventCard.style.transition =
                "all 0.5s cubic-bezier(0.4, 0, 0.2, 1)";

            setTimeout(() => {
                eventCard.remove();

                // Check if no more events
                const remainingCards = document.querySelectorAll(
                    "#acara-diikuti-section [data-event-id]"
                );
                if (remainingCards.length === 0) {
                    EventCardManager.showEmptyState();
                }
            }, 500);
        }

        static showEmptyState() {
            const section = document.querySelector("#acara-diikuti-section");
            if (!section) return;

            // Remove existing empty message
            const existingEmpty = section.querySelector(".pesan-kosong");
            if (existingEmpty) existingEmpty.remove();

            const emptyState = document.createElement("div");
            emptyState.className =
                "text-center py-12 pesan-kosong animate-fade-in-scale";
            emptyState.innerHTML = `
                <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak Ada Kegiatan</h3>
                <p class="text-gray-600 mb-6">Anda belum mengikuti acara apapun.</p>
                <a href="/kerjasama" class="inline-flex items-center px-4 py-2 bg-[#E9762B] hover:bg-[#D0661A] text-white font-medium rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Jelajahi Kegiatan
                </a>
            `;
            section.appendChild(emptyState);
        }
    }

    // Initialize managers
    const modalManager = new ModalManager();
    const notificationManager = new NotificationManager();

    // Get CSRF token
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content");

    // Handle unfollow button clicks
    function attachUnfollowHandlers() {
        const unfollowButtons = document.querySelectorAll(
            ".unfollow-event-btn:not(.handler-attached)"
        );

        unfollowButtons.forEach((button) => {
            button.classList.add("handler-attached");
            button.addEventListener("click", function (e) {
                e.preventDefault();

                const eventId = this.dataset.eventId;
                const eventTitle = this.dataset.eventTitle;

                modalManager.show({
                    id: eventId,
                    title: eventTitle,
                    button: this,
                });
            });
        });
    }

    // Initial attachment
    attachUnfollowHandlers();

    // Handle modal confirmation
    modalManager.confirmBtn.addEventListener("click", function () {
        if (!currentEventData) return;

        const { id: eventId, title: eventTitle } = currentEventData;

        modalManager.setLoading(true);

        // Make actual API call
        fetch(`/kegiatan/${eventId}/unfollow`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
                Accept: "application/json",
            },
        })
            .then((response) =>
                response
                    .json()
                    .then((data) => ({ status: response.status, body: data }))
            )
            .then(({ status, body }) => {
                modalManager.setLoading(false);

                if (status === 200 && body.status === "success") {
                    modalManager.close();
                    EventCardManager.removeCard(eventId);
                    notificationManager.show(
                        "Berhasil!",
                        body.message ||
                            `Anda telah berhenti mengikuti "${eventTitle}"`,
                        "success"
                    );
                } else {
                    modalManager.modalContent.classList.add("animate-shake");
                    setTimeout(() => {
                        modalManager.modalContent.classList.remove(
                            "animate-shake"
                        );
                    }, 500);

                    notificationManager.show(
                        "Gagal!",
                        body.message ||
                            "Terjadi kesalahan saat membatalkan kegiatan.",
                        "error"
                    );
                }
            })
            .catch((error) => {
                modalManager.setLoading(false);
                console.error("Unfollow Error:", error);

                modalManager.modalContent.classList.add("animate-shake");
                setTimeout(() => {
                    modalManager.modalContent.classList.remove("animate-shake");
                }, 500);

                notificationManager.show(
                    "Error!",
                    "Terjadi kesalahan jaringan. Silakan coba lagi.",
                    "error"
                );
            });
    });

    // Export functions for global use
    window.EventCardManager = EventCardManager;
    window.attachUnfollowHandlers = attachUnfollowHandlers;
});
