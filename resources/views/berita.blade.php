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

<div>
  <div class="max-w-7xl mx-auto mb-12 py-16 px-4 rounded-3xl backdrop-blur-lg">
    <div class="text-center mb-12">
        <p class="text-3xl lg:text-4xl text-left lg:text-center mx-auto font-bold leading-relaxed">
            Jelajahi sebaran lokasi panti asuhan kami dan <span class="text-[#E9762B]">dampak nyata</span> yang telah kami berikan kepada <span class="text-[#E9762B]">anak-anak</span> di berbagai wilayah Indonesia
        </p>
    </div>
      
    <div class="bg-[#41644A] rounded-2xl p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 mb-4 gap-6 py-6">
            <div class="md:col-span-2 flex justify-center items-center md:justify-start gap-2 md:pl-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white size-9">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                </svg>
                <p class="text-4xl text-white font-medium">Peta Interaktif</p>
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-white uppercase tracking-wider">Program</label>
                <select class="px-4 py-3 border-2 border-[#41644A]/20 rounded-xl bg-white transition-all duration-300 focus:outline-none focus:border-[#41644A] focus:ring-4 focus:ring-[#41644A]/10" id="programFilter">
                    <option value="all">Semua Program</option>
                    <option value="pendidikan">Pendidikan</option>
                    <option value="kesehatan">Kesehatan</option>
                    <option value="keterampilan">Keterampilan</option>
                    <option value="pemberdayaan">Pemberdayaan</option>
                </select>
            </div>
            
            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-white uppercase tracking-wider">Lokasi</label>
                <select class="px-4 py-3 border-2 border-[#41644A]/20 rounded-xl bg-white transition-all duration-300 focus:outline-none focus:border-[#41644A] focus:ring-4 focus:ring-[#41644A]/10" id="locationFilter">
                    <option value="all">Semua Lokasi</option>
                    <option value="klojen">Kecamatan Klojen</option>
                    <option value="lowokwaru">Kecamatan Lowokwaru</option>
                    <option value="sukun">Kecamatan Sukun</option>
                    <option value="blimbing">Kecamatan Blimbing</option>
                    <option value="kedungkandang">Kecamatan Kedungkandang</option>
                </select>
            </div>
        </div>
            
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 mb-12">
            <div class="lg:col-span-3 relative overflow-hidden rounded-2xl">
                <div id="map" class="h-96 lg:h-full w-full object-cover"></div>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-1 gap-6 justify-between">
                <div class="stat-card-gradient p-6 bg-white rounded-2xl border border-[#41644A]/10 w-full">
                    <div class="flex gap-4 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>

                        <div class="flex flex-col gap-2">
                            <div class="text-4xl font-bold leading-none" id="totalChildren">1,247</div>
                            <div class="font-medium uppercase tracking-wider text-xs">Total Anak Terlayani</div>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card-gradient p-6 bg-white rounded-2xl border border-[#41644A]/10 w-full">
                    <div class="flex gap-4 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                        </svg>

                        <div class="flex flex-col gap-2">
                            <div class="text-4xl font-bold leading-none" id="totalLocations">12</div>
                            <div class="font-medium uppercase tracking-wider text-xs">Lokasi Aktif</div>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card-gradient p-6 bg-white rounded-2xl border border-[#41644A]/10 w-full">
                    <div class="flex gap-4 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                        <div class="flex flex-col gap-2">
                            <div class="text-4xl font-bold leading-none mb-2" id="totalPrograms">28</div>
                            <div class="font-medium uppercase tracking-wider text-xs">Program Berjalan</div>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card-gradient p-6 bg-white rounded-2xl border border-[#41644A]/10 w-full">
                    <div class="flex gap-4 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        <div class="flex flex-col gap-2">
                            <div class="text-4xl font-bold leading-none mb-2" id="successRate">94%</div>
                            <div class="font-medium uppercase tracking-wider text-xs">Tingkat Keberhasilan</div>
                        </div>
                    </div>
                </div>
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