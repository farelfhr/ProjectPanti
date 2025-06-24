document.addEventListener('DOMContentLoaded', () => {
    const eventCards = document.querySelectorAll('.event-card');
    const modals = document.querySelectorAll('.modal');
    
    // PERUBAHAN DI SINI: Mencari atribut data-action, bukan kelas .share-link
    const copyLinkButtons = document.querySelectorAll('[data-action="copy-link"]');

    // Fungsi untuk membuka modal
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }
    }

    // Fungsi untuk menutup modal (dijadikan global agar bisa diakses dari `onclick`)
    window.closeModal = function(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }
    }

    // Event listener untuk setiap kartu kegiatan
    eventCards.forEach(card => {
        card.addEventListener('click', () => {
            const modalId = card.dataset.modal;
            openModal(modalId);
        });
    });

    // Event listener untuk menutup modal saat mengklik area luar
    modals.forEach(modal => {
        modal.addEventListener('click', (e) => {
            // Hanya tutup jika yang diklik adalah latar belakang modal itu sendiri
            if (e.target === modal) {
                closeModal(modal.id);
            }
        });
    });

    // PERUBAHAN DI SINI: Event listener ini sekarang HANYA untuk tombol salin tautan
    copyLinkButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.stopPropagation(); // Mencegah event "naik" ke parent, penting untuk elemen di dalam modal

            const url = button.dataset.url;
            if (!url) return;

            navigator.clipboard.writeText(url).then(() => {
                const span = button.querySelector('span');
                const originalText = span.textContent;
                span.textContent = 'Tautan Disalin!';
                button.disabled = true;

                setTimeout(() => {
                    span.textContent = originalText;
                    button.disabled = false;
                }, 2000);
            }).catch(err => {
                console.error('Gagal menyalin tautan: ', err);
                const span = button.querySelector('span');
                span.textContent = 'Gagal Menyalin';
            });
        });
    });
});
