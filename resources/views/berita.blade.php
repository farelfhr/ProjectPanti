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
        <a class="lg:col-span-8 flex flex-col gap-5" href="">
            <div class="flex flex-col p-6 h-full bg-[#f1f0e9] rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                <img class="rounded-lg shadow-md w-full h-full object-cover" src="images/PantiStock/berita-terkini.jpg" alt="Berita Terkini">
                <h3 class="text-2xl font-bold my-5">Judul Berita/Artikel</h3>
                <p class="mb-2 text-sm">11 Juni, 2025 | <span class="text-[#41644A] font-bold">Nama Penulis</span></p>
                <p class="mb-4 text-sm hidden lg:inline">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam minus aperiam vero optio. Quasi hic voluptates dolor ratione eveniet, iure nisi earum. Adipisci, aliquid omnis. Minima esse id fuga aut?</p>
                <p class="text-[#E9762B] font-bold">Baca Selengkapnya</p>
            </div>
        </a>

        <div class="lg:col-span-4 w-full flex flex-col md:flex-row lg:flex-col gap-5">
            <a class="flex flex-col p-6 md:p-4 h-full bg-[#f1f0e9] rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden" href="">
                <img class="rounded-lg shadow-md w-full h-full lg:h-64 object-cover" src="images/PantiStock/berita-populer-1.jpg" alt="Berita Populer">
                <h3 class="text-xl font-bold mt-4 mb-4">Judul Berita/Artikel</h3>
                <p class="text-xs mb-2">11 Juni, 2025 | <span class="text-[#41644A] font-bold">Nama Penulis</span></p>
                <p class="flex gap-1 text-[#E9762B] font-bold text-xs">Baca Selengkapnya</p>
            </a>

            <a class="flex flex-col p-6 md:p-4 h-full bg-[#f1f0e9] rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden" href="">
                <img class="rounded-lg shadow-md w-full h-full lg:h-64 object-cover" src="images/PantiStock/berita-populer-2.jpg" alt="Berita Populer">
                <h3 class="text-xl font-bold mt-4 mb-4">Judul Berita/Artikel</h3>
                <p class="text-xs mb-2">11 Juni, 2025 | <span class="text-[#41644A] font-bold">Nama Penulis</span></p>
                <p class="flex gap-1 text-[#E9762B] font-bold text-xs">Baca Selengkapnya</p>
            </a>
        </div>
    </div> 

    <div class="hidden md:inline">
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

        <div class="flex flex-wrap gap-2 mb-6">
            <button class="px-4 py-2 bg-transparent font-bold rounded-full border border-[#41644A] hover:bg-[#E9762B] hover:text-white transition">Semua Berita</button>
            <button class="px-4 py-2 bg-transparent font-bold rounded-full border border-[#41644A] hover:bg-[#E9762B] hover:text-white transition">Cerita Inspiratif</button>
            <button class="px-4 py-2 bg-transparent font-bold rounded-full border border-[#41644A] hover:bg-[#E9762B] hover:text-white transition">Kebutuhan Panti</button>
            <button class="px-4 py-2 bg-transparent font-bold rounded-full border border-[#41644A] hover:bg-[#E9762B] hover:text-white transition">Kegiatan Sosial</button>
            <button class="px-4 py-2 bg-transparent font-bold rounded-full border border-[#41644A] hover:bg-[#E9762B] hover:text-white transition">Tips Berdonasi</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($berita as $beritas)
                <a class="flex flex-col gap-5 p-4 bg-[#f1f0e9] rounded-lg shadow-md hover:shadow-xl transition-all duration-300" href="/berita/{{ $beritas['id'] }}">
                    <img class="w-full h-64 rounded-lg shadow-md object-cover" src="{{ $beritas['gambar'] }}" alt="Artikel">
                    <div>
                        <p class="text-sm mb-4">{{ $beritas['tanggal'] }} <span class="text-[#41644A] font-bold">{{ $beritas['penulis'] }}</span></p>
                        <h3 class="text-xl font-bold mb-4">{{ $beritas['judul'] }}</h3>
                        <p class="text-sm mb-4">{{ Str::limit($beritas['isi'], 100) }}</p>
                        <p class="text-[#E9762B] font-bold">Baca Selengkapnya</p>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="flex justify-center mt-8 space-x-2">
            <button class="px-4 py-2 rounded-full font-bold border border-[#41644A] hover:bg-[#E9762B] hover:text-white">1</button>
            <button class="px-4 py-2 rounded-full font-bold border border-[#41644A] hover:bg-[#E9762B] hover:text-white">2</button>
            <button class="px-4 py-2 rounded-full font-bold border border-[#41644A] hover:bg-[#E9762B] hover:text-white">3</button>
            <span class="px-4 py-2">...</span>
            <button class="px-4 py-2 rounded-full font-bold border border-[#41644A] hover:bg-[#E9762B] hover:text-white">6</button>
        </div>
    </div>
</div>

@endsection 