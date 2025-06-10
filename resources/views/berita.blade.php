@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<div class="max-w-7xl mx-auto py-6 lg:py-16 px-4">
    <h1 class="text-4xl lg:text-5xl text-left lg:text-center font-bold">Temukan <span class="text-[#41644A]">Berita Terkini</span> dan <span class="text-[#41644A]">Inspirasi</span> untuk <span class="text-[#E9762B]">Perubahan</span> dari Komunitas Panti Asuhan</h1>
    <h1 class="text-xl lg:text-2xl text-left lg:text-center font-bold mt-5">Jelajahi kisah dampak sosial, data visual, dan panduan peduli dari dunia panti asuhan.</h1>
</div>

<div class="max-w-7xl mx-auto py-6 lg:py-16 px-4 flex flex-col gap-10">
    <div class="flex flex-col sm:flex-col lg:flex-row gap-5">
        <a class="sm:w-full lg:w-2/3 flex flex-col gap-5" href="">
            <h1 class="font-bold text-2xl">Berita Terkini</h1>
            <div class="flex flex-col p-6 h-full bg-[#f1f0e9] rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                <img class="rounded-lg shadow-md w-full h-full object-cover" src="images/PantiStock/berita-terkini.jpg" alt="Berita Terkini">
                <h3 class="text-2xl font-bold my-5">Judul Berita/Artikel</h3>
                <p class="mb-2 text-sm">11 Juni, 2025 | <span class="text-[#41644A] font-bold">Nama Penulis</span></p>
                <p class="mb-4 text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam minus aperiam vero optio. Quasi hic voluptates dolor ratione eveniet, iure nisi earum. Adipisci, aliquid omnis. Minima esse id fuga aut?</p>
                <p class="text-[#E9762B] font-bold">Baca Selengkapnya</p>
            </div>
        </a>

        <div class="w-full lg:w-1/3 flex flex-col gap-5">
            <h1 class="font-bold text-2xl">Berita Populer</h1>
            <div class=" flex flex-col md:flex-row lg:flex-col gap-5">
                <a class="p-4 h-full bg-[#f1f0e9] rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden" href="">
                    <img class="rounded-lg shadow-md w-full h-64 object-cover" src="images/PantiStock/berita-populer-1.jpg" alt="Berita Populer">
                    <h3 class="text-xl font-bold mt-4 mb-4">Judul Berita/Artikel</h3>
                    <p class="text-xs mb-2">11 Juni, 2025 | <span class="text-[#41644A] font-bold">Nama Penulis</span></p>
                    <p class="flex gap-1 text-[#E9762B] font-bold text-xs">Baca Selengkapnya</p>
                </a>

                <a class="p-4 h-full bg-[#f1f0e9] rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden" href="">
                    <img class="rounded-lg shadow-md w-full h-64 object-cover" src="images/PantiStock/berita-populer-2.jpg" alt="Berita Populer">
                    <h3 class="text-xl font-bold mt-4 mb-4">Judul Berita/Artikel</h3>
                    <p class="text-xs mb-2">11 Juni, 2025 | <span class="text-[#41644A] font-bold">Nama Penulis</span></p>
                    <p class="flex gap-1 text-[#E9762B] font-bold text-xs">Baca Selengkapnya</p>
                </a>
            </div>
        </div>
    </div> 

    <div>
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

<div>
  <div class="max-w-7xl mx-auto mb-32 my-8 p-8 bg-[#f1f0e9] rounded-3xl shadow-2xl backdrop-blur-lg">
    <div class="text-center mb-12">
        <h2 class="text-4xl md:text-5xl font-bold gradient-text mb-4">
            Peta Interaktif Dampak <span class="italic">(Masih bingung)</span>
        </h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
            Jelajahi sebaran lokasi panti asuhan kami dan dampak nyata yang telah kami berikan kepada anak-anak di berbagai wilayah Indonesia
        </p>
    </div>
        
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 p-6 gradient-bg rounded-2xl border border-[#41644A]/10">
        <div class="flex flex-col gap-2">
            <label class="text-sm font-semibold text-[#41644A] uppercase tracking-wider">Program</label>
            <select class="px-4 py-3 border-2 border-[#41644A]/20 rounded-xl bg-white text-[#0D4715] transition-all duration-300 focus:outline-none focus:border-[#41644A] focus:ring-4 focus:ring-[#41644A]/10" id="programFilter">
                <option value="all">Semua Program</option>
                <option value="pendidikan">Pendidikan</option>
                <option value="kesehatan">Kesehatan</option>
                <option value="keterampilan">Keterampilan</option>
                <option value="pemberdayaan">Pemberdayaan</option>
            </select>
        </div>
        
        <div class="flex flex-col gap-2">
            <label class="text-sm font-semibold text-[#41644A] uppercase tracking-wider">Lokasi</label>
            <select class="px-4 py-3 border-2 border-[#41644A]/20 rounded-xl bg-white text-[#0D4715] transition-all duration-300 focus:outline-none focus:border-[#41644A] focus:ring-4 focus:ring-[#41644A]/10" id="locationFilter">
                <option value="all">Semua Lokasi</option>
                <option value="malang">YUEM</option>
                <option value="surabaya">Surabaya</option>
                <option value="bandung">Bandung</option>
                <option value="yogyakarta">Yogyakarta</option>
                <option value="medan">Medan</option>
            </select>
        </div>
        
        <div class="flex flex-col gap-2">
            <label class="text-sm font-semibold text-[#41644A] uppercase tracking-wider">
                Tahun: <span id="yearValue" class="font-bold">2024</span>
            </label>
            <input type="range" class="control-slider h-2 rounded-lg appearance-none cursor-pointer border-0 focus:outline-none focus:ring-4 focus:ring-[#41644A]/10" id="yearSlider" min="2020" max="2024" value="2024">
        </div>
    </div>
        
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">

        <div class="lg:col-span-2 relative rounded-2xl overflow-hidden shadow-xl">
            <div id="map" class="h-96 lg:h-[500px] w-full"></div>
        </div>
        
        <div class="flex flex-col gap-6">
            <div class="stat-card-gradient p-6 rounded-2xl border border-[#41644A]/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="text-4xl font-bold text-[#41644A] leading-none mb-2" id="totalChildren">1,247</div>
                <div class="text-gray-600 font-medium uppercase tracking-wider text-xs">Total Anak Terlayani</div>
            </div>
            
            <div class="stat-card-gradient p-6 rounded-2xl border border-[#41644A]/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="text-4xl font-bold text-[#41644A] leading-none mb-2" id="totalLocations">12</div>
                <div class="text-gray-600 font-medium uppercase tracking-wider text-xs">Lokasi Aktif</div>
            </div>
            
            <div class="stat-card-gradient p-6 rounded-2xl border border-[#41644A]/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="text-4xl font-bold text-[#41644A] leading-none mb-2" id="totalPrograms">28</div>
                <div class="text-gray-600 font-medium uppercase tracking-wider text-xs">Program Berjalan</div>
            </div>
            
            <div class="stat-card-gradient p-6 rounded-2xl border border-[#41644A]/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="text-4xl font-bold text-[#41644A] leading-none mb-2" id="successRate">94%</div>
                <div class="text-gray-600 font-medium uppercase tracking-wider text-xs">Tingkat Keberhasilan</div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="pt-16 pb-40 px-6 mx-auto rounded-t-[100px] lg:rounded-t-[150px] bg-gradient-to-b from-[#2c4332] to-[#0e1811]">
    <div class="text-center py-8 mb-8 lg:mb-16">
        <h1 class="text-4xl xl:text-6xl text-white mb-8 text-left lg:text-center lg:mx-auto font-bold lg:w-4/5">
           <span class="text-[#E9762B]">Membangun Kasih</span> melalui Pengetahuan dan Perawatan
        </h1>
        <p class="text-base lg:text-lg text-white text-left lg:text-center">
            Temukan kiat praktis dan wawasan untuk merawat anak, lansia, dan penyandang disabilitas dengan <span class="text-[#E9762B]">penuh kasih</span>
        </p>
    </div>
    
   <div class="relative swiper-container max-w-full overflow-x-hidden px-4">
        <div class="swiper-wrapper">
            <div class="swiper-slide px-10">
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <div class="relative pb-[56.25%]">
                        <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/VkBnNxneA_A?si=rmcYUBbT2CCbh9BV" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="swiper-slide px-10">
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <div class="relative pb-[56.25%]">
                        <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/rVqR9num8Js?si=rRgSRidPcNzGmy3A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="swiper-slide px-10">
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <div class="relative pb-[56.25%]">
                        <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/-nzRB7TrCUc?si=oVP6U0gnF90RoK6O" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="swiper-slide px-10">
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <div class="relative pb-[56.25%]">
                        <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/yxR-R4aLmt4?si=WjHMBp9tanqyyqSk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="swiper-slide px-10">
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <div class="relative pb-[56.25%]">
                        <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/CWeURo9iA3g?si=XvBdmWTtA4BXQJg8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="swiper-slide px-10">
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <div class="relative pb-[56.25%]">
                        <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/RDeTdXMOXmI?si=8PPV1KgBpee_XfRf" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-button-prev" style="color: #E9762B;"></div>
        <div class="swiper-button-next" style="color: #E9762B;"></div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"></script>
<script type="module" src="/js/interactive-map.js"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="/js/swiper.js"></script>
@endsection 