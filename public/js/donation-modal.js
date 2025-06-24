// Donation Modal Functions
function openDonationModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeDonationModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Initialize modal event listeners
document.addEventListener('DOMContentLoaded', function() {
    // Close modal when clicking outside
    const modals = document.querySelectorAll('[id^="donationModal"]');
    modals.forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeDonationModal(this.id);
            }
        });
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const visibleModal = document.querySelector('[id^="donationModal"]:not(.hidden)');
            if (visibleModal) {
                closeDonationModal(visibleModal.id);
            }
        }
    });
});

// Generate function names for each panti
function generateDonationFunctions() {
    const modals = document.querySelectorAll('[id^="donationModal"]');
    modals.forEach(modal => {
        const modalId = modal.id;
        const pantiId = modalId.replace('donationModal', '');
        
        // Create global function for this specific panti
        window[`openDonationModal${pantiId}`] = function() {
            openDonationModal(modalId);
        };
    });
}

// Call the function generator when DOM is loaded
document.addEventListener('DOMContentLoaded', generateDonationFunctions); 