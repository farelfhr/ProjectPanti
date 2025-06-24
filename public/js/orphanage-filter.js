document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const kecamatanButtons = document.querySelectorAll('.kecamatan-filter-button');
    const kecamatanInput = document.getElementById('kecamatan-input');
    const orphanageGrid = document.getElementById('orphanage-grid');
    let searchTimeout;

    function updateButtonAppearance() {
        kecamatanButtons.forEach(btn => {
            if (btn.classList.contains('active-filter-button')) {
                btn.classList.remove('border-2', 'border-[#D0D5CB]');
                btn.classList.add('bg-[#41644A]', 'text-[#F1F0E9]');
            } else {
                btn.classList.remove('bg-[#41644A]', 'text-[#F1F0E9]');
                btn.classList.add('border-2', 'border-[#D0D5CB]');
            }
        });
    }

    function updateUrlParams(search, kecamatan) {
        const url = new URL(window.location.href);
        if (search) {
            url.searchParams.set('search', search);
        } else {
            url.searchParams.delete('search');
        }
        if (kecamatan && kecamatan !== 'semua') {
            url.searchParams.set('kecamatan', kecamatan);
        } else {
            url.searchParams.delete('kecamatan');
        }
        window.history.pushState({}, '', url);
    }

    function fetchOrphanages() {
        const search = searchInput.value;
        const kecamatan = kecamatanInput.value;

        updateUrlParams(search, kecamatan);

        // Show loading state
        orphanageGrid.innerHTML = '<div class="col-span-2 flex justify-center items-center py-12"><svg class="animate-spin h-8 w-8 text-[#41644A] mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path></svg><span class="text-[#41644A] font-bold">Memuat data panti...</span></div>';

        fetch(`/daftar-panti?search=${encodeURIComponent(search)}&kecamatan=${encodeURIComponent(kecamatan)}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            orphanageGrid.innerHTML = data.html;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    updateButtonAppearance(); // Call initially to set correct button appearance on page load

    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(fetchOrphanages, 300); // Debounce search input
    });

    kecamatanButtons.forEach(button => {
        button.addEventListener('click', function() {
            kecamatanButtons.forEach(btn => btn.classList.remove('active-filter-button'));
            this.classList.add('active-filter-button');
            kecamatanInput.value = this.dataset.district;
            updateButtonAppearance();
            fetchOrphanages();
        });
    });
}); 