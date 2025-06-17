@extends('layouts.app')

@section('content')
<div class="m-h-screen  px-20 py-8 ">
    <div class="container mx-auto px-8 py-8">
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-[#0D4715] mb-4">
                Daftar Panti Asuhan
            </h1>
            <p class="text-lg text-[#41644A] max-w-2xl mx-auto">
                Temukan dan bantu panti asuhan di Kota Malang untuk memberikan masa depan yang lebih cerah bagi anak-anak.
            </p>
        </div>

        {{-- Peta Interaktif Section --}}
        <div class="max-w-7xl mx-auto mb-12 py-16 px-4 rounded-3xl backdrop-blur-lg">
            <div class="text-center mb-12">
                <p class="text-3xl lg:text-4xl text-left lg:text-center mx-auto font-bold leading-relaxed">
                    Jelajahi sebaran lokasi panti asuhan kami dan <span class="text-[#E9762B]">dampak nyata</span> yang telah kami berikan kepada <span class="text-[#E9762B]">anak-anak</span> di berbagai wilayah Malang Raya
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
                        <label class="text-sm font-semibold text-white uppercase tracking-wider">Lokasi Kecamatan</label>
                        <select class="px-4 py-3 border-2 border-[#41644A]/20 rounded-xl bg-white transition-all duration-300 focus:outline-none focus:border-[#41644A] focus:ring-4 focus:ring-[#41644A]/10" id="locationFilter">
                            <option value="all">Semua Lokasi</option>
                            <option value="klojen">klojen</option>
                            <option value="lowokwaru">lowokwaru</option>
                            <option value="sukun">sukun</option>
                            <option value="blimbing">blimbing</option>
                            <option value="kedungkandang">kedungkandang</option>
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
                                    <div class="font-medium uppercase tracking-wider text-xs">Total Anak</div>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Peta Interaktif Section --}}

        {{-- Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-[#41644A] text-[#F1F0E9] rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
                <div class="p-6 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <h3 class="text-2xl font-bold">{{ $panti->count() }}</h3>
                    <p class="text-[#F1F0E9]">Panti Asuhan</p>
                </div>
            </div>
            <div class="bg-[#0D4715] text-[#F1F0E9] rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
                <div class="p-6 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14.828 14.828a4 4 0 1 0-5.656-5.656 4 4 0 0 0 5.656 5.656z"></path>
                        <path d="M9.172 9.172a4 4 0 1 0 5.656 5.656 4 4 0 0 0-5.656-5.656z"></path>
                        <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold">500+</h3>
                    <p class="text-[#F1F0E9]">Anak Asuh</p>
                </div>
            </div>
            <div class="bg-[#E9762B] text-[#F1F0E9] rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
                <div class="p-6 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                    </svg>
                    <h3 class="text-2xl font-bold">1000+</h3>
                    <p class="text-[#F1F0E9]">Total Kapasitas</p>
                </div>
            </div>
        </div>

        {{-- Search and Filter --}}
        <div class="bg-[#F1F0E9] rounded-2xl shadow-lg p-6 mb-8">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-[#41644A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="text" id="search-input" placeholder="Cari nama panti atau alamat..." class="w-full pl-10 h-12 text-lg border-2 border-[#D0D5CB] focus:border-[#41644A] rounded-lg">
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">
                    <button class="px-4 py-2 h-12 font-bold rounded-lg transition-colors duration-300 flex items-center active-filter-button" data-district="semua">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 3H2l10 12.46L22 3z"></path>
                            <path d="M2 3l10 12.46L22 3"></path>
                        </svg>
                        Semua
                    </button>
                    <button class="px-4 py-2 h-12 border-2 border-[#D0D5CB] font-bold rounded-lg hover:bg-[#F1F0E9] transition-colors duration-300" data-district="klojen">Klojen</button>
                    <button class="px-4 py-2 h-12 border-2 border-[#D0D5CB] font-bold rounded-lg hover:bg-[#F1F0E9] transition-colors duration-300" data-district="lowokwaru">Lowokwaru</button>
                    <button class="px-4 py-2 h-12 border-2 border-[#D0D5CB] font-bold rounded-lg hover:bg-[#F1F0E9] transition-colors duration-300" data-district="sukun">Sukun</button>
                    <button class="px-4 py-2 h-12 border-2 border-[#D0D5CB] font-bold rounded-lg hover:bg-[#F1F0E9] transition-colors duration-300" data-district="blimbing">Blimbing</button>
                    <button class="px-4 py-2 h-12 border-2 border-[#D0D5CB] font-bold rounded-lg hover:bg-[#F1F0E9] transition-colors duration-300" data-district="kedungkandang">Kedungkandang</button>
                </div>
            </div>
        </div>

        {{-- Orphanages Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($panti as $p)
            <div class="bg-[#F1F0E9] rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-[#0D4715] mb-2">{{ $p->nama }}</h3>
                            <div class="flex items-center text-[#41644A] mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <span class="text-sm">{{ $p->alamat }}</span>
                            </div>
                        </div>
                        <div class="bg-[#E9762B] text-[#F1F0E9] p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                        </div>
                    </div>

                    <div class="mb-4" data-kecamatan="{{ $p->kecamatan }}">
                        @if($p->gambar)
                        <img src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->nama }}" class="w-full h-48 object-cover rounded-lg">
                        @else
                        <div class="w-full h-48 bg-[#D0D5CB] rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-[#41644A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                        @endif
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="text-center bg-[#F3F2EB] rounded-lg p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto mb-1 text-[#41644A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <p class="text-sm text-[#41644A]">Anak Asuh</p>
                            <p class="font-bold text-lg text-[#0D4715]">50/100</p>
                        </div>
                        <div class="text-center bg-[#F3F2EB] rounded-lg p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto mb-1 text-[#41644A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <p class="text-sm text-[#41644A]">Kecamatan</p>
                            <p class="font-bold text-lg text-[#0D4715]">{{ $p->kecamatan }}</p>
                        </div>
    </div>

                    <div class="space-y-2 mb-4 text-sm">
                        <div class="flex items-center text-[#41644A]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <span>{{ $p->phone }}</span>
                        </div>
                        <div class="flex items-center text-[#41644A]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <span>{{ $p->email }}</span>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <a href="#" class="flex-1 bg-[#41644A] hover:bg-[#0D4715] text-[#F1F0E9] font-bold py-2 px-4 rounded-lg text-center flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                            Donasi
                        </a>
                        <a href="{{ route('panti.show', $p->id_panti) }}" class="flex-1 border-2 border-[#41644A] text-[#41644A] font-bold py-2 px-4 rounded-lg text-center hover:bg-[#F1F0E9] transition-colors duration-300">
                            Kunjungi
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($panti->isEmpty())
        <div class="text-center py-12">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4 text-[#41644A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M14.828 14.828a4 4 0 1 0-5.656-5.656 4 4 0 0 0 5.656 5.656z"></path>
                <path d="M9.172 9.172a4 4 0 1 0 5.656 5.656 4 4 0 0 0-5.656-5.656z"></path>
                <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20z"></path>
            </svg>
            <h3 class="text-xl font-semibold text-[#41644A] mb-2">
                Tidak ada panti asuhan yang ditemukan
            </h3>
            <p class="text-[#0D4715]">
                Coba ubah kata kunci pencarian atau filter yang Anda gunakan
            </p>
        </div>
        @endif
            </div>

    {{-- CTA Section --}}
    <div class="mt-16 pt-16 pb-40 rounded-t-[100px] lg:rounded-t-[150px] bg-gradient-to-b from-[#2c4332] to-[#0e1811]">
        <div class="text-center py-8 mb-8 lg:mb-16">
            <h1 class="text-4xl xl:text-6xl text-white mb-8 text-left lg:text-center lg:mx-auto font-bold lg:w-4/5">
               <span class="text-[#E9762B]">Mari Berbagi Kebahagiaan</span> untuk Panti Asuhan
            </h1>
            <p class="text-base lg:text-lg text-white text-left lg:text-center">
                Setiap bantuan Anda, sekecil apapun, dapat memberikan harapan dan masa depan yang lebih cerah 
                untuk anak-anak di panti asuhan ini.
            </p>
            </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center relative z-10">
            <a href="#" class="bg-[#E9762B] text-white hover:bg-[#d06426] font-semibold px-8 py-3 rounded-lg transition-colors duration-300">
                Mulai Berdonasi
            </a>
            <a href="#" class="border-2 border-white text-white hover:bg-white hover:text-[#41644A] font-semibold px-8 py-3 rounded-lg transition-colors duration-300">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" />
<script type="module" src="/js/interactive-map.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="/js/swiper.js"></script>
<script type="module">
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const kecamatanButtons = document.querySelectorAll('.flex-wrap button');
    const orphanageCards = document.querySelectorAll('.grid > div[data-kecamatan]');

    // Fungsi untuk memperbarui tampilan tombol filter
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

    function filterOrphanages() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedKecamatanElement = document.querySelector('.flex-wrap button.active-filter-button');
        let selectedKecamatan = '';
        if (selectedKecamatanElement) {
            selectedKecamatan = selectedKecamatanElement.dataset.district.toLowerCase().trim();
            if (selectedKecamatan === 'semua') {
                selectedKecamatan = '';
            }
        }

        console.log('Search Term:', searchTerm);
        console.log('Selected Kecamatan (from button):', selectedKecamatan);

        orphanageCards.forEach(card => {
            const name = card.querySelector('h3').textContent.toLowerCase();
            const addressElement = card.querySelector('.text-\[\#41644A\] span');
            const address = addressElement ? addressElement.textContent.toLowerCase() : '';
            const cardKecamatan = card.dataset.kecamatan.toLowerCase() || '';

            console.log('Card Name:', name, 'Card Address:', address, 'Card Kecamatan:', cardKecamatan);

            const matchesSearch = name.includes(searchTerm) || address.includes(searchTerm);
            const matchesKecamatan = selectedKecamatan === '' || cardKecamatan.includes(selectedKecamatan);

            if (matchesSearch && matchesKecamatan) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }

    searchInput.addEventListener('input', filterOrphanages);

    kecamatanButtons.forEach(button => {
        button.addEventListener('click', function() {
            kecamatanButtons.forEach(btn => {
                btn.classList.remove('active-filter-button');
            });

            this.classList.add('active-filter-button');
            updateButtonAppearance(); // Perbarui tampilan setelah mengubah kelas aktif
            
            filterOrphanages();
        });
    });

    // Inisialisasi tampilan tombol saat DOM dimuat
    updateButtonAppearance();
    filterOrphanages();
});
</script>
@endpush

@endsection 