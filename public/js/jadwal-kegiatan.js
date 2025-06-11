document.addEventListener("DOMContentLoaded", () => {
    const eventCards = document.querySelectorAll(".event-card");
    eventCards.forEach((card) => {
        card.addEventListener("click", () => {
            const modalId = card.getAttribute("data-modal");
            document.getElementById(modalId).classList.remove("hidden");
        });
    });

    const modals = document.querySelectorAll('[id^="modal"]');
    modals.forEach((modal) => {
        modal.classList.add("hidden");
    });

    const closeButtons = document.querySelectorAll('[onclick^="closeModal"]');
    closeButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const modalId = button
                .getAttribute("onclick")
                .match(/'([^']+)'/)[1]; // Extract modalId from onclick
            closeModal(modalId);
        });
    });

    const modalContents = document.querySelectorAll(".modal");
    modalContents.forEach((modal) => {
        modal.addEventListener("click", (event) => {
            if (event.target === modal) {
                const modalId = modal.id;
                closeModal(modalId);
            }
        });
    });

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
            modals.forEach((modal) => {
                if (!modal.classList.contains("hidden")) {
                    closeModal(modal.id);
                }
            });
        }
    });
});

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add("hidden");
    }
}
