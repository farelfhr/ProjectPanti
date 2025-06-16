@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#F3F2EB]">
    <div class="container mx-auto px-4 py-8">
        {{-- Back Button --}}
        <a href="{{ route('daftar-panti') }}" class="inline-flex items-center text-[#41644A] hover:text-[#0D4715] mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            Kembali ke Daftar Panti
        </a>

        {{-- Orphanage Header --}}
        <div class="bg-[#F1F0E9] rounded-2xl shadow-lg p-8 mb-8">
            <div class="flex flex-col md:flex-row gap-8">
                {{-- Image Section --}}
                <div class="md:w-1/3">
                    @if($panti->gambar)
                    <img src="{{ asset('storage/' . $panti->gambar) }}" alt="{{ $panti->nama }}" class="w-full h-64 object-cover rounded-xl shadow-lg">
                    @else
                    <div class="w-full h-64 bg-[#D0D5CB] rounded-xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-[#41644A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                    </div>
                    @endif
                </div>

                {{-- Info Section --}}
                <div class="md:w-2/3">
                    <h1 class="text-3xl font-bold text-[#0D4715] mb-4">{{ $panti->nama }}</h1>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="bg-[#F3F2EB] rounded-xl p-4">
                            <div class="flex items-center text-[#41644A] mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <span class="font-semibold">Alamat</span>
                            </div>
                            <p class="text-[#0D4715]">{{ $panti->alamat }}</p>
                        </div>

                        <div class="bg-[#F3F2EB] rounded-xl p-4">
                            <div class="flex items-center text-[#41644A] mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                                <span class="font-semibold">Telepon</span>
                            </div>
                            <p class="text-[#0D4715]">{{ $panti->phone }}</p>
                        </div>

                        <div class="bg-[#F3F2EB] rounded-xl p-4">
                            <div class="flex items-center text-[#41644A] mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <span class="font-semibold">Email</span>
                            </div>
                            <p class="text-[#0D4715]">{{ $panti->email }}</p>
                        </div>

                        <div class="bg-[#F3F2EB] rounded-xl p-4">
                            <div class="flex items-center text-[#41644A] mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <span class="font-semibold">Tahun Berdiri</span>
                            </div>
                            <p class="text-[#0D4715]">{{ $panti->tahun_berdiri ?? 'Tidak tersedia' }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <a href="#" class="flex-1 bg-[#41644A] hover:bg-[#0D4715] text-[#F1F0E9] font-bold py-3 px-6 rounded-lg text-center flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                            Donasi Sekarang
                        </a>
                        @if($panti->social_media_url)
                        <a href="{{ $panti->social_media_url }}" target="_blank" class="flex-1 border-2 border-[#41644A] text-[#41644A] font-bold py-3 px-6 rounded-lg text-center hover:bg-[#F1F0E9] transition-colors duration-300">
                            Kunjungi Website
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Description Section --}}
        <div class="bg-[#F1F0E9] rounded-2xl shadow-lg p-8 mb-8">
            <h2 class="text-2xl font-bold text-[#0D4715] mb-4">Tentang Panti Asuhan</h2>
            <div class="prose prose-lg max-w-none text-[#41644A]">
                {!! nl2br(e($panti->deskripsi ?? 'Belum ada deskripsi yang tersedia.')) !!}
            </div>
        </div>

        {{-- Stats Section --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-[#41644A] text-[#F1F0E9] rounded-xl shadow-lg p-6">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <h3 class="text-2xl font-bold">{{ $panti->jumlah_anak }}</h3>
                    <p>Anak Asuh</p>
                </div>
            </div>

            <div class="bg-[#0D4715] text-[#F1F0E9] rounded-xl shadow-lg p-6">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14.828 14.828a4 4 0 1 0-5.656-5.656 4 4 0 0 0 5.656 5.656z"></path>
                        <path d="M9.172 9.172a4 4 0 1 0 5.656 5.656 4 4 0 0 0-5.656-5.656z"></path>
                        <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold">{{ $panti->kapasitas }}</h3>
                    <p>Total Kapasitas</p>
                </div>
            </div>

            <div class="bg-[#E9762B] text-[#F1F0E9] rounded-xl shadow-lg p-6">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                    </svg>
                    <h3 class="text-2xl font-bold">{{ $panti->kecamatan }}</h3>
                    <p>Kecamatan</p>
                </div>
            </div>
        </div>

        {{-- Needs Section --}}
        @if($panti->kebutuhan->isNotEmpty())
        <div class="bg-[#F1F0E9] rounded-2xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-[#0D4715] mb-6">Kebutuhan Panti</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($panti->kebutuhan as $kebutuhan)
                <div class="bg-[#F3F2EB] rounded-xl p-6">
                    <div class="flex items-center text-[#41644A] mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                        <h3 class="text-lg font-semibold">{{ $kebutuhan->nama_kebutuhan }}</h3>
                    </div>
                    <p class="text-[#0D4715] mb-4">{{ $kebutuhan->deskripsi }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-[#41644A]">Target: {{ $kebutuhan->target }}</span>
                        <span class="text-sm text-[#41644A]">Terkumpul: {{ $kebutuhan->terkumpul }}</span>
                    </div>
                    <div class="w-full bg-[#D0D5CB] rounded-full h-2 mt-2">
                        <div class="bg-[#41644A] h-2 rounded-full" style="width: {{ ($kebutuhan->terkumpul / $kebutuhan->target) * 100 }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection 