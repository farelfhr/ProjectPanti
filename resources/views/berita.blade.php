@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<div class="max-w-7xl mx-auto py-6 lg:py-16 px-4">
    <h1 class="text-4xl lg:text-5xl text-left lg:text-center font-bold">Temukan <span class="text-[#41644A]">Berita Terkini</span> dan <span class="text-[#41644A]">Inspirasi</span> untuk <span class="text-[#E9762B]">Perubahan</span> dari Komunitas Panti Asuhan</h1>
    <h1 class="text-xl lg:text-2xl text-left lg:text-center font-bold mt-5">Jelajahi kisah dampak sosial, data visual, dan panduan peduli dari dunia panti asuhan.</h1>
</div>

<div class="max-w-7xl mx-auto py-6 lg:py-16 px-4 flex flex-col gap-4">
    <h1 class="font-bold text-2xl">Berita dan Artikel Terkini</h1>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
        @if ($berita_terkini->count())
            <a class="lg:col-span-8 flex flex-col gap-5" href="/berita/{{ $berita_terkini[0]->id_artikel }}">
                <div class="flex flex-col p-6 h-full bg-[#f1f0e9] rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                    <img class="rounded-lg shadow-md w-full h-full object-cover" src="{{ $berita_terkini[0]->gambar }}" alt="Berita Terkini">
                    <h3 class="text-2xl font-bold my-5">{{ $berita_terkini[0]->judul }}</h3>
                    <p class="mb-2 text-sm">{{ $berita_terkini[0]->publish_date->format('d M, Y') }} | <span class="text-[#41644A] font-bold">{{ $berita_terkini[0]->author->name }}</span></p>
                    <p class="mb-4 text-sm hidden lg:inline">{{ Str::limit($berita_terkini[0]->konten, 150) }}</p>
                    <p class="text-[#E9762B] font-bold">Baca Selengkapnya</p>
                </div>
            </a>

            <div class="lg:col-span-4 w-full flex flex-col md:flex-row lg:flex-col gap-5">
                @foreach ($berita_terkini->slice(1) as $terkini)
                    <a class="flex flex-col p-6 md:p-4 h-full bg-[#f1f0e9] rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden" href="/berita/{{ $terkini->id_artikel }}">
                        <img class="rounded-lg shadow-md w-full h-full lg:h-64 object-cover" src="{{ $terkini->gambar }}" alt="Berita Populer">
                        <h3 class="text-xl font-bold mt-4 mb-4">{{ $terkini->judul }}</h3>
                        <p class="text-xs mb-2">{{ $terkini->publish_date->format('d M, Y') }} | <span class="text-[#41644A] font-bold">{{ $terkini->author->name }}</span></p>
                        <p class="flex gap-1 text-[#E9762B] font-bold text-xs">Baca Selengkapnya</p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>

    <div id="artikel" class="hidden md:inline">
        <h1 class="text-4xl lg:text-6xl font-bold py-12 flex justify-start lg:justify-center">Semua Berita dan Artikel</h1>
        <div class="hidden sm:flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Browse by Categories</h1>
            <div class="relative">
                <input type="text" placeholder="Cari Berita/Artikel" class="pl-10 pr-4 py-2 border-[#41644A] rounded-full focus:outline-none focus:border-none focus:ring-2 focus:ring-[#E9762B]">
                <svg class="w-5 h-5 text-gray-500 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <div id="kategori" class="flex flex-wrap gap-2 mb-6">
            <button data-kategori="all" class="kategori-btn px-4 py-2 font-bold rounded-full border border-[#41644A] hover:bg-[#E9762B] hover:text-white bg-[#E9762B] text-white">
                Semua Artikel
            </button>
            @foreach ($kategori as $item)
                <button data-kategori="{{ $item->deskripsi }}" class="kategori-btn px-4 py-2 font-bold rounded-full border border-[#41644A] hover:bg-[#E9762B] hover:text-white">
                    {{ $item->nama }}
                </button>
            @endforeach
        </div>

        <div id="artikel-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-10">
            @foreach ($berita_lain as $beritas)
                <a class="flex flex-col gap-5 p-4 bg-[#f1f0e9] rounded-lg shadow-md hover:shadow-xl transition-all duration-300" href="/berita/{{ $beritas->id_artikel }}">
                    <img class="w-full h-64 rounded-lg shadow-md object-cover" src="{{ $beritas->gambar }}" alt="Artikel">
                    <div>
                        <p class="text-sm mb-4"><span class="text-[#41644A] font-bold">{{ $beritas->author->name }}</span> | {{ $beritas->publish_date->diffForHumans() }}</p>
                        <h3 class="text-xl font-bold mb-4">{{ $beritas->judul }}</h3>
                        <p class="text-sm mb-4">{{ Str::limit($beritas->konten, 100) }}</p>
                        <p class="text-[#E9762B] font-bold">Baca Selengkapnya</p>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $berita_lain->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.kategori-btn').forEach(button => {
    button.addEventListener('click', function () {
        const kategori = this.dataset.kategori;
        const container = document.getElementById('artikel-container');
        const pagination = document.querySelector('.mt-8');

        // Reset active button styles
        document.querySelectorAll('.kategori-btn').forEach(btn => {
            btn.classList.remove('bg-[#E9762B]', 'text-white');
        });
        this.classList.add('bg-[#E9762B]', 'text-white');

        // Hide pagination
        if (pagination) {
            pagination.style.display = 'none';
        }

        // Fetch articles
        const url = kategori === 'all' ? '/api/kategori/semua' : `/api/kategori/${encodeURIComponent(kategori)}`;
        console.log('Fetching URL:', url);
        fetch(url)
            .then(response => {
                console.log('Response status:', response.status);
                if (!response.ok) {
                    return response.text().then(text => {
                        throw new Error(`HTTP ${response.status}: ${text}`);
                    });
                }
                return response.json();
            })
            .then(data => {
                console.log('Received data:', data); // Log the response to inspect its structure
                updateArtikelList(data.data); // Use data.data for paginated response
            })
            .catch(error => {
                console.error('Error fetching articles:', error.message);
                container.innerHTML = '<p class="text-center col-span-3">Terjadi kesalahan saat memuat artikel: ' + error.message + '</p>';
            });
    });
});

function updateArtikelList(articles) {
    const container = document.getElementById('artikel-container');
    container.innerHTML = ''; // Clear existing articles

    if (!Array.isArray(articles) || articles.length === 0) {
        container.innerHTML = '<p class="text-center col-span-3">Tidak ada artikel dalam kategori ini.</p>';
        return;
    }

    articles.forEach(artikel => {
        const html = `
            <a href="/berita/${artikel.id_artikel}" class="flex flex-col gap-5 p-4 bg-[#f1f0e9] rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                <img class="w-full h-64 rounded-lg shadow-md object-cover" src="${artikel.gambar}" alt="Artikel">
                <div>
                    <p class="text-sm mb-4"><span class="text-[#41644A] font-bold">${artikel.author?.name || 'Unknown Author'}</span> | ${formatDate(artikel.publish_date)}</p>
                    <h3 class="text-xl font-bold mb-4">${artikel.judul}</h3>
                    <p class="text-sm mb-4">${artikel.konten.substring(0, 100)}...</p>
                    <p class="text-[#E9762B] font-bold">Baca Selengkapnya</p>
                </div>
            </a>`;
        container.insertAdjacentHTML('beforeend', html);
    });
}

function formatDate(date) {
    try {
        const d = new Date(date);
        if (isNaN(d.getTime())) {
            return 'Tanggal tidak valid';
        }
        return d.toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });
    } catch (error) {
        console.error('Error formatting date:', error);
        return 'Tanggal tidak valid';
    }
}
</script>

@endsection 