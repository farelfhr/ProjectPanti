@extends('layouts.app')
@section('content')
<style>
    /* Custom animations */
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fade-in-up 0.6s ease-out forwards;
        opacity: 0;
    }

    @keyframes bounce-soft {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5px);
        }
    }
    .animate-bounce-soft {
        animation: bounce-soft 1.5s ease-in-out infinite;
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
        100% {
            transform: translateY(0px);
        }
    }
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    /* Custom gradient */
    .tk-gradient-warm {
        background-image: linear-gradient(to bottom right, #F3F2EB, #F1F0E9);
    }

    /* Custom scrollbar */
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    /* Hover effects */
    .news-card {
        transition: all 0.3s ease;
    }
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    /* Category filter animations */
    .category-filter {
        transition: all 0.3s ease;
    }
    .category-filter:hover {
        transform: scale(1.05);
    }
</style>

<!-- Hero Section -->
<section class="tk-gradient-warm py-20 md:py-28 relative overflow-hidden -mt-32">
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-10 left-10 w-20 h-20 bg-[#41644A] rounded-full animate-float"></div>
        <div class="absolute top-40 right-20 w-16 h-16 bg-[#E9762B] rounded-full animate-float" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-[#0D4715] rounded-full animate-float" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="container mx-auto px-6 mt-12 relative z-10">
        <div class="text-center animate-fade-in-up">
            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-3 h-3 bg-[#E9762B] rounded-full animate-pulse"></div>
                <span class="text-[#E9762B] text-sm font-semibold tracking-wider uppercase">Berita & Artikel</span>
                <div class="w-3 h-3 bg-[#E9762B] rounded-full animate-pulse"></div>
            </div>
            
            <h1 class="text-4xl lg:text-6xl font-bold leading-tight mb-6">
                Temukan <span class="text-[#41644A]">Berita Terkini</span> dan <span class="text-[#41644A]">Inspirasi</span> 
                <br>untuk <span class="text-[#E9762B]">Perubahan</span> dari Komunitas Panti Asuhan
            </h1>
            
            <p class="text-xl text-[#41644A] max-w-4xl mx-auto leading-relaxed font-medium mb-8">
                Jelajahi kisah dampak sosial, data visual, dan panduan peduli dari dunia panti asuhan.
            </p>

            <div class="flex flex-wrap gap-4 justify-center">
                <div class="flex items-center gap-3 bg-[#41644A] px-6 py-3 rounded-full text-white shadow-lg hover:shadow-xl transition-all duration-300 animate-bounce-soft">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2zm20 0h-6a4 4 0 0 0-4 4v14a3 3 0 0 0 3-3h6z"/></svg>
                    <span class="font-semibold">Artikel Terbaru</span>
                </div>
                <div class="flex items-center gap-3 bg-[#E9762B] px-6 py-3 rounded-full text-white shadow-lg hover:shadow-xl transition-all duration-300 animate-bounce-soft" style="animation-delay: 0.5s;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 7.5L14.5 14M21 16.5L14.5 9M18 20l-1.5-3.5L13 15.5l3.5-1.5L18 10.5l1.5 3.5L23 15.5l-3.5 1.5zM2.5 13.5l1.5 3.5L7.5 18l-3.5 1.5L2.5 23l-1.5-3.5L-2.5 18l3.5-1.5z"/></svg>
                    <span class="font-semibold">Inspirasi Harian</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 md:py-28 bg-white relative">
    <div class="absolute inset-0 opacity-3">
        <div class="absolute top-20 right-10 w-32 h-32 bg-[#D0D5CB] rounded-full animate-float"></div>
        <div class="absolute bottom-20 left-10 w-24 h-24 bg-[#F1F0E9] rounded-full animate-float" style="animation-delay: 1s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-16 animate-fade-in-up">
            <div class="flex items-center justify-center mb-6">
                <div class="w-16 h-16 bg-[#41644A] rounded-2xl flex items-center justify-center shadow-lg animate-bounce-soft">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2zm20 0h-6a4 4 0 0 0-4 4v14a3 3 0 0 0 3-3h6z"/></svg>
                </div>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-[#0D4715] mb-6 tracking-tight">
                Berita dan Artikel <span class="text-[#E9762B]">Terkini</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            @if ($berita_terkini->count())
                <!-- Featured Article -->
                <div class="lg:col-span-8 animate-fade-in-up">
                    <a href="/berita/{{ $berita_terkini[0]->id_artikel }}" class="h-full block news-card">
                        <div class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-500 p-8 border border-[#D0D5CB] h-full relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-32 h-32 opacity-5">
                                <div class="w-full h-full bg-[#41644A] rounded-full transform translate-x-16 -translate-y-16"></div>
                            </div>
                            
                            <div class="relative z-10">
                                <img class="w-full h-80 rounded-2xl shadow-md object-cover mb-6" src="{{ $berita_terkini[0]->gambar }}" alt="Berita Terkini" loading="lazy" width="800" height="600">
                                
                                <h3 class="text-2xl lg:text-3xl font-bold mb-4 text-[#0D4715] hover:text-[#E9762B] transition-colors duration-300">{{ $berita_terkini[0]->judul }}</h3>

                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-[#E9762B] rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                    </div>

                                    <div>
                                        <p class="text-sm text-[#41644A] font-medium">{{ $berita_terkini[0]->publish_date->format('d M, Y') }}</p>
                                        <p class="text-sm text-[#E9762B] font-bold">{{ $berita_terkini[0]->author->name }}</p>
                                    </div>
                                </div>

                                <p class="mb-6 text-[#41644A] leading-relaxed hidden lg:block">{{ Str::limit($berita_terkini[0]->konten, 200) }}</p>

                                <div class="flex items-center gap-3 text-[#E9762B] font-bold group-hover:gap-4 transition-all duration-300">
                                    <span>Baca Selengkapnya</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5l7 7-7 7"/></svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Side Articles -->
                <div class="lg:col-span-4 flex flex-col md:flex-row lg:flex-col gap-6 animate-fade-in-up" style="animation-delay: 0.2s;">
                    @foreach ($berita_terkini->slice(1) as $index => $terkini)
                        <a href="/berita/{{ $terkini->id_artikel }}" class="flex-1 block news-card">
                            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 p-6 border border-[#D0D5CB] h-full relative overflow-hidden group">
                                <div class="absolute top-0 right-0 w-20 h-20 opacity-5">
                                    <div class="w-full h-full bg-[#E9762B] rounded-full transform translate-x-10 -translate-y-10"></div>
                                </div>
                                
                                <div class="relative z-10">
                                    <img class="rounded-xl shadow-md w-full h-48 object-cover mb-4" src="{{ $terkini->gambar }}" alt="Berita Populer" loading="lazy" width="800" height="600">
                                    <h3 class="text-2xl md:text-lg font-bold mb-3 text-[#0D4715] hover:text-[#E9762B] transition-colors duration-300">{{ $terkini->judul }}</h3>
                                    <div class="flex items-center gap-2 mb-3">
                                        <div class="w-6 h-6 bg-[#E9762B] rounded-full flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                        </div>
                                        <p class="text-xs text-[#41644A]">{{ $terkini->publish_date->format('d M, Y') }} | <span class="text-[#E9762B] font-bold">{{ $terkini->author->name }}</span></p>
                                    </div>
                                    <div class="flex items-center gap-2 text-[#E9762B] font-bold text-sm group-hover:gap-3 transition-all duration-300">
                                        <span>Baca Selengkapnya</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5l7 7-7 7"/></svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>

<section id="artikel" class="hidden md:inline py-20 md:py-28 tk-gradient-warm relative overflow-hidden">
    <div class="absolute inset-0 opacity-3">
        <div class="absolute top-10 right-20 w-40 h-40 bg-[#D0D5CB] rounded-full animate-float"></div>
        <div class="absolute bottom-20 left-10 w-32 h-32 bg-[#F1F0E9] rounded-full animate-float" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 w-24 h-24 bg-[#F6F5F0] rounded-full animate-float" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center my-16 animate-fade-in-up">
            <div class="flex items-center justify-center mb-6">
                <div class="w-16 h-16 bg-[#E9762B] rounded-2xl flex items-center justify-center shadow-lg animate-bounce-soft">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 7.5L14.5 14M21 16.5L14.5 9M18 20l-1.5-3.5L13 15.5l3.5-1.5L18 10.5l1.5 3.5L23 15.5l-3.5 1.5zM2.5 13.5l1.5 3.5L7.5 18l-3.5 1.5L2.5 23l-1.5-3.5L-2.5 18l3.5-1.5z"/></svg>
                </div>
            </div>
            <h2 class="text-4xl md:text-6xl font-bold text-[#0D4715] mb-6 tracking-tight">
                Semua Berita dan <span class="text-[#E9762B]">Artikel</span>
            </h2>
            <p class="text-xl text-[#41644A] max-w-4xl mx-auto leading-relaxed font-medium">
                Temukan beragam cerita inspiratif dan informasi terkini dari dunia panti asuhan
            </p>
        </div>

        <!-- Search and Filter Section -->
        <div class="bg-white rounded-3xl shadow-lg p-8 mb-12 border border-[#D0D5CB] animate-fade-in-up" style="animation-delay: 0.2s;">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-[#41644A] rounded-2xl flex items-center justify-center shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 3h-6l-2 3h-4l-2-3H2v18h20V3z"/><path d="M2 3h20v18H2z"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#0D4715]">Browse by Categories</h3>
                </div>
                
                <div class="relative">
                    <form action="#artikel">
                        <input type="search" id="search" name="search" placeholder="Cari Berita/Artikel" class="pl-12 pr-6 py-3 w-80 border-2 border-[#D0D5CB] rounded-2xl focus:outline-none focus:border-[#E9762B] focus:ring-2 focus:ring-[#E9762B] focus:ring-opacity-20 transition-all duration-300 font-medium">
                        <svg class="w-6 h-6 text-[#41644A] absolute left-4 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </form>
                </div>
            </div>
        </div>

        <div id="kategori" class="flex flex-wrap gap-4 mb-12 justify-center animate-fade-in-up" style="animation-delay: 0.4s;">
            <button data-kategori="semua" class="kategori-btn category-filter px-6 py-3 font-bold rounded-2xl border-2 border-[#41644A] hover:bg-[#E9762B] hover:text-white hover:border-[#E9762B] bg-[#E9762B] text-white shadow-lg">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3h18v18H3zM9 9h6v6H9z"/></svg>
                    <span>Semua Artikel</span>
                </div>
            </button>
            @foreach ($kategori as $item)
                <button data-kategori="{{ $item->deskripsi }}" class="kategori-btn category-filter px-6 py-3 font-bold rounded-2xl border-2 border-[#41644A] hover:bg-[#E9762B] hover:text-white hover:border-[#E9762B] transition-all duration-300 shadow-lg">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 3h-6l-2 3h-4l-2-3H2v18h20V3z"/></svg>
                        <span>{{ $item->nama }}</span>
                    </div>
                </button>
            @endforeach
        </div>

        <div id="artikel-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-in-up" style="animation-delay: 0.6s;">
            @foreach ($berita_lain as $index => $beritas)
                <a href="/berita/{{ $beritas->id_artikel }}" class="block news-card" style="animation-delay: {{ $index * 0.1 }};">
                    <div class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-500 p-6 border border-[#D0D5CB] h-full relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-24 h-24 opacity-5 group-hover:opacity-10 transition-opacity duration-300">
                            <div class="w-full h-full bg-[#41644A] rounded-full transform translate-x-12 -translate-y-12"></div>
                        </div>
                        
                        <div class="relative z-10">
                            <img class="w-full h-48 rounded-2xl shadow-md object-cover mb-6 group-hover:scale-105 transition-transform duration-300" src="{{ $beritas->gambar }}" alt="Artikel" loading="lazy" width="800" height="600">
                            
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-[#E9762B] rounded-full flex items-center justify-center animate-bounce-soft">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm text-[#E9762B] font-bold">{{ $beritas->author->name }}</p>
                                        <p class="text-sm text-[#41644A] font-bold">{{ $beritas->kategori->nama }}</p>
                                    </div>
                                    <p class="text-xs text-[#41644A]">{{ $beritas->publish_date->diffForHumans() }}</p>
                                </div>
                            </div>
                            
                            <h3 class="text-xl font-bold mb-4 text-[#0D4715] group-hover:text-[#E9762B] transition-colors duration-300">{{ $beritas->judul }}</h3>
                            <p class="text-[#41644A] mb-6 leading-relaxed">{{ Str::limit($beritas->konten, 100) }}</p>
                            
                            <div class="flex items-center gap-3 text-[#E9762B] font-bold group-hover:gap-4 transition-all duration-300">
                                <span>Baca Selengkapnya</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5l7 7-7 7"/></svg>
                            </div>
                        </div>
                        
                        <div class="absolute bottom-0 left-0 w-0 h-1 bg-[#E9762B] group-hover:w-full transition-all duration-500"></div>
                    </div>
                </a>
            @endforeach
        </div>

        <div id="pagination-container" class="my-12 animate-fade-in-up" style="animation-delay: 0.8s;">
            {{ $berita_lain->links('vendor.pagination.custom') }}
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const kategoriButtons = document.querySelectorAll('.kategori-btn');
    const artikelContainer = document.getElementById('artikel-container');
    const paginationContainer = document.getElementById('pagination-container');

    kategoriButtons.forEach(button => {
        button.addEventListener('click', function() {
            const kategori = this.dataset.kategori;

            // Update button styles
            kategoriButtons.forEach(btn => {
                btn.classList.remove('bg-[#E9762B]', 'text-white');
                btn.classList.add('hover:bg-[#E9762B]', 'hover:text-white');
            });
            this.classList.add('bg-[#E9762B]', 'text-white');
            this.classList.remove('hover:bg-[#E9762B]', 'hover:text-white');

            // Show loading state
/*             artikelContainer.innerHTML = '<div class="col-span-3 flex justify-center items-center py-8"><div class="text-[#41644A] font-bold">Memuat artikel...</div></div>';
 */
            // Fetch articles
            const url = `/api/kategori/${encodeURIComponent(kategori)}`;

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Response data:', data);

                    // Handle paginated response
                    let articles = [];
                    if (data.data && Array.isArray(data.data)) {
                        articles = data.data;
                    } else if (Array.isArray(data)) {
                        articles = data;
                    } else {
                        throw new Error('Format response tidak valid');
                    }

                    updateArtikelList(articles);
                    updatePagination(data); // Tambahkan untuk memperbarui pagination
                })
                .catch(error => {
                    console.error('Error:', error);
                    artikelContainer.innerHTML = `
                        <div class="col-span-3 text-center py-8">
                            <p class="text-red-500 font-bold">Terjadi kesalahan saat memuat artikel</p>
                            <p class="text-sm text-gray-600">${error.message}</p>
                        </div>
                    `;
                    paginationContainer.innerHTML = ''; // Kosongkan pagination jika error
                });
        });
    });

    function updateArtikelList(articles) {
        artikelContainer.innerHTML = '';

        if (!articles || articles.length === 0) {
            artikelContainer.innerHTML = '<div class="col-span-3 text-center py-8"><p class="text-gray-600">Tidak ada artikel dalam kategori ini.</p></div>';
            return;
        }

        articles.forEach(artikel => {
            const authorName = artikel.author?.name || 'Unknown Author';
            const kategoriArtikel = artikel.kategori?.nama || 'Tidak Ada Kategori';
            const publishDate = formatDate(artikel.publish_date);
            const konten = artikel.konten ? artikel.konten.substring(0, 100) + '...' : '';
            const gambar = artikel.gambar || '';

            const articleHTML = `
                <a href="/berita/${artikel.id_artikel}" class="block news-card" style="animation-delay: {{ $index * 0.1 }}s;">
                    <div class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-500 p-6 border border-[#D0D5CB] h-full relative overflow-hidden group">

                        <div class="absolute top-0 right-0 w-24 h-24 opacity-5 group-hover:opacity-10 transition-opacity duration-300">
                            <div class="w-full h-full bg-[#41644A] rounded-full transform translate-x-12 -translate-y-12"></div>
                        </div>

                        <div class="relative z-10">
                            <img class="w-full h-48 rounded-2xl shadow-md object-cover mb-6 group-hover:scale-105 transition-transform duration-300" src="${gambar}" alt="Artikel" onerror="this.src='/images/default-artikel.jpg'" loading="lazy" width="800" height="600">

                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-[#E9762B] rounded-full flex items-center justify-center animate-bounce-soft">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                </div>
                                
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm text-[#E9762B] font-bold">${authorName}</p>
                                        <p class="text-sm text-[#41644A] font-bold">${kategoriArtikel}</p>
                                    </div>
                                    <p class="text-xs text-[#41644A]">${publishDate}</p>
                                </div>
                            </div>
                                    
                            <h3 class="text-xl font-bold mb-4 text-[#0D4715] group-hover:text-[#E9762B] transition-colors duration-300">${artikel.judul}</h3>
                            <p class="text-[#41644A] mb-6 leading-relaxed">${konten}</p>

                            <div class="flex items-center gap-3 text-[#E9762B] font-bold group-hover:gap-4 transition-all duration-300">
                                <span>Baca Selengkapnya</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5l7 7-7 7"/></svg>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 w-0 h-1 bg-[#E9762B] group-hover:w-full transition-all duration-500"></div>
                    </div>
                </a>
            `;
            artikelContainer.insertAdjacentHTML('beforeend', articleHTML);
        });
    }

    function updatePagination(data) {
    paginationContainer.innerHTML = ''; // Kosongkan pagination sebelumnya
    paginationContainer.style.display = 'block'; // Pastikan pagination terlihat

    if (!data.links || !data.last_page || data.last_page <= 1) {
        return; // Tidak ada pagination jika hanya 1 halaman
    }

    const currentPage = data.current_page;
    const lastPage = data.last_page;

    // Hitung rentang halaman (mirip dengan custom.blade.php)
    let start = Math.max(1, currentPage - 2);
    let end = Math.min(lastPage, currentPage + 2);

    // Edge case: jika mendekati akhir
    if (lastPage - currentPage < 2) {
        start = Math.max(1, lastPage - 2);
        end = lastPage;
    }

    // Buat HTML pagination
    let paginationHTML = `
        <div class="flex flex-wrap justify-center mt-8 gap-2 sm:space-x-2">
            ${currentPage === 1 ? `
                <span class="px-4 py-2 rounded-full font-bold border border-[#ccc] text-gray-400 cursor-default">&laquo;</span>
            ` : `
                <a href="#" class="px-4 py-2 rounded-full font-bold border border-[#41644A] hover:bg-[#E9762B] hover:text-white transition duration-300 ease-in-out transform hover:scale-105" data-page="${data.prev_page_url}">&laquo;</a>
            `}

            ${Array.from({ length: end - start + 1 }, (_, i) => start + i).map(i => `
                ${i === currentPage ? `
                    <span class="px-4 py-2 rounded-full font-bold border border-[#41644A] bg-[#E9762B] text-white">${i}</span>
                ` : `
                    <a href="#" class="px-4 py-2 rounded-full font-bold border border-[#41644A] hover:bg-[#E9762B] hover:text-white transition duration-300 ease-in-out transform hover:scale-105" data-page="${data.path + '?page=' + i}">${i}</a>
                `}
            `).join('')}

            ${end < lastPage - 1 ? `
                <span class="px-4 py-2">...</span>
            ` : ''}

            ${end < lastPage ? `
                <a href="#" class="px-4 py-2 rounded-full font-bold border border-[#41644A] hover:bg-[#E9762B] hover:text-white transition duration-300 ease-in-out transform hover:scale-105" data-page="${data.path + '?page=' + lastPage}">${lastPage}</a>
            ` : ''}

            ${currentPage === lastPage ? `
                <span class="px-4 py-2 rounded-full font-bold border border-[#ccc] text-gray-400 cursor-default">&raquo;</span>
            ` : `
                <a href="#" class="px-4 py-2 rounded-full font-bold border border-[#41644A] hover:bg-[#E9762B] hover:text-white transition duration-300 ease-in-out transform hover:scale-105" data-page="${data.next_page_url}">&raquo;</a>
            `}
        </div>
    `;

    paginationContainer.innerHTML = paginationHTML;

    // Tambahkan event listener untuk tautan pagination
    document.querySelectorAll('[data-page]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.getAttribute('data-page');
            if (url) {
                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        updateArtikelList(data.data);
                        updatePagination(data);
                        // Scroll ke bagian artikel
                        document.getElementById('artikel').scrollIntoView({ behavior: 'smooth' });
                    })
                    .catch(error => {
                        console.error('Error fetching page:', error);
                        artikelContainer.innerHTML = `
                            <div class="col-span-3 text-center py-8">
                                <p class="text-red-500 font-bold">Terjadi kesalahan saat memuat artikel</p>
                                <p class="text-sm text-gray-600">${error.message}</p>
                            </div>
                        `;
                    });
                }
            });
        });
    }

    function formatDate(dateString) {
        try {
            const date = new Date(dateString);
            if (isNaN(date.getTime())) {
                return 'Tanggal tidak valid';
            }
            return date.toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
        } catch (error) {
            console.error('Error formatting date:', error);
            return 'Tanggal tidak valid';
        }
    }
});

// Search functionality
    const searchForm = document.getElementById('search-form');
    const searchInput = document.getElementById('search');

    searchInput.addEventListener('input', function(e) {
        e.preventDefault();
        const query = searchInput.value.trim();

        // Show loading state
        artikelContainer.innerHTML = '<div class="col-span-3 flex justify-center items-center py-8"><div class="text-[#41644A] font-bold">Memuat artikel...</div></div>';

        // Fetch articles based on search query
        const url = `/api/artikel/search?search=${encodeURIComponent(query)}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Search response data:', data);
                updateArtikelList(data.data);
                updatePagination(data);
            })
            .catch(error => {
                console.error('Search error:', error);
                artikelContainer.innerHTML = `
                    <div class="col-span-3 text-center py-8">
                        <p class="text-red-500 font-bold">Terjadi kesalahan saat memuat artikel</p>
                        <p class="text-sm text-gray-600">${error.message}</p>
                    </div>
                `;
                paginationContainer.innerHTML = '';
            });
    });
</script>

@endsection