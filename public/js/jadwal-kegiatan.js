function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
        document.body.style.overflow = ""; // Restore scrolling
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const eventCards = document.querySelectorAll(".event-card");
    const modals = document.querySelectorAll(".modal");
    const closeButtons = document.querySelectorAll(".close-modal-btn");

    // Open modal and disable body scroll
    eventCards.forEach((card) => {
        card.addEventListener("click", () => {
            const modalId = card.getAttribute("data-modal");
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove("hidden");
                modal.classList.add("flex");
                document.body.style.overflow = "hidden"; // Disable scrolling
            }
        });
    });

    // Close modal when clicking the close button
    closeButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            event.stopPropagation(); // Prevent click from bubbling to modal
            const modalId = button.getAttribute("data-modal-id");
            closeModal(modalId);
        });
    });

    // Close modal when clicking outside
    modals.forEach((modal) => {
        modal.addEventListener("click", (event) => {
            if (event.target === modal) {
                closeModal(modal.id);
            }
        });
    });

    // Close modal when pressing Escape key
    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
            modals.forEach((modal) => {
                if (!modal.classList.contains("hidden")) {
                    closeModal(modal.id);
                }
            });
        }
    });

    // Share link functionality
    document.querySelectorAll(".share-link").forEach((button) => {
        button.addEventListener("click", () => {
            const url = button.getAttribute("data-url");
            navigator.clipboard.writeText(url).then(() => {
                alert("Tautan telah disalin ke clipboard!");
            }).catch((err) => {
                console.error("Gagal menyalin tautan:", err);
            });
        });
    });
});