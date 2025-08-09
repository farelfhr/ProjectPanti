@extends('layouts.app')

@section('content')
    <style>
        /* Custom animations from berita.blade.php */
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

            0%,
            100% {
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

        @keyframes scale-in {
            from {
                opacity: 0;
                transform: scale(0.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-scale-in {
            animation: scale-in 0.3s ease-out forwards;
        }

        /* Custom gradient */
        .tk-gradient-warm {
            background-image: linear-gradient(to bottom right, #F3F2EB, #F1F0E9);
        }

        /* Card hover effects */
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* Custom scrollbar */
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>

    <!-- Hero Section -->
    <section class="tk-gradient-warm py-20 md:py-28 relative overflow-hidden -mt-32">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-20 h-20 bg-[#41644A] rounded-full animate-float"></div>
            <div class="absolute top-40 right-20 w-16 h-16 bg-[#E9762B] rounded-full animate-float"
                style="animation-delay: 1s;"></div>
            <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-[#0D4715] rounded-full animate-float"
                style="animation-delay: 2s;"></div>
        </div>

        <div class="container mx-auto px-6 mt-12 relative z-10">
            <div class="text-center animate-fade-in-up">
                <div class="flex items-center justify-center gap-3 mb-6">
                    <div class="w-3 h-3 bg-[#E9762B] rounded-full animate-pulse"></div>
                    <span class="text-[#E9762B] text-sm font-semibold tracking-wider uppercase">Kerja Sama</span>
                    <div class="w-3 h-3 bg-[#E9762B] rounded-full animate-pulse"></div>
                </div>

                <h1 class="text-4xl lg:text-6xl font-bold leading-tight mb-6 text-[#0D4715]">
                    Wujudkan <span class="text-[#E9762B]">Harapan</span> Bersama <br>Anak-Anak Panti Asuhan Malang
                </h1>

                <p class="text-xl text-[#41644A] max-w-4xl mx-auto leading-relaxed font-medium mb-8">
                    Kolaborasi dengan kami untuk menciptakan perubahan nyata melalui program amal, donasi, atau kemitraan
                    strategis.
                </p>

                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="#jenis-kerja-sama"
                        class="flex items-center gap-3 bg-[#41644A] px-6 py-3 rounded-full text-white shadow-lg hover:shadow-xl transition-all duration-300 animate-bounce-soft">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21 7.5L14.5 14M21 16.5L14.5 9M18 20l-1.5-3.5L13 15.5l3.5-1.5L18 10.5l1.5 3.5L23 15.5l-3.5 1.5z" />
                        </svg>
                        <span class="font-semibold">Jelajahi Peluang</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Jenis Kerja Sama Section -->
    <section id="jenis-kerja-sama" class="py-20 bg-white relative">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 right-10 w-32 h-32 bg-[#D0D5CB] rounded-full animate-float"></div>
            <div class="absolute bottom-20 left-10 w-24 h-24 bg-[#F1F0E9] rounded-full animate-float"
                style="animation-delay: 1s;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 animate-fade-in-up">
                <h2 class="text-4xl md:text-5xl font-bold text-[#0D4715] mb-6 tracking-tight">
                    Jenis <span class="text-[#E9762B]">Kolaborasi</span>
                </h2>
                <p class="text-xl text-[#41644A] max-w-4xl mx-auto leading-relaxed font-medium">
                    Pelajari berbagai cara untuk berkontribusi dan mendukung anak-anak panti asuhan di Malang.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ([['title' => 'Komunitas', 'desc' => 'Adakan kegiatan seru seperti pelatihan atau acara amal bersama anak-anak panti.'], ['title' => 'Perusahaan', 'desc' => 'Dukung melalui program CSR, donasi, atau sponsor untuk pendidikan anak.'], ['title' => 'Pemerintah', 'desc' => 'Berkolaborasi dalam program pemberdayaan atau dukungan kebijakan.'], ['title' => 'Individu', 'desc' => 'Jadi relawan, mentor, atau donatur untuk membantu kebutuhan harian anak-anak.']] as $item)
                    <div class="bg-primary-cream rounded-xl shadow-lg card-hover animate-fade-in-up p-6"
                        style="animation-delay: {{ $loop->index * 200 }}ms;">
                        <div class="flex items-center justify-center w-12 h-12 bg-[#41644A] rounded-full mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path
                                    d="M12 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2m20 0v-2a4 4 0 0 0-4-4h-2a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[#0D4715] mb-2 text-center">{{ $item['title'] }}</h3>
                        <p class="text-[#41644A] text-sm leading-relaxed text-center">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Jadwal Kegiatan Section -->
    <section class="py-20 tk-gradient-warm relative">
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-4xl md:text-5xl font-bold text-[#0D4715] mb-6 tracking-tight">
                Jadwal <span class="text-[#E9762B]">Kegiatan</span>
            </h2>
            <p class="text-xl text-[#41644A] max-w-4xl mx-auto leading-relaxed font-medium">
                Ikuti acara kami untuk mendukung dan berpartisipasi dalam kegiatan amal.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($kegiatan as $event)
                <div class="bg-white rounded-xl shadow-lg card-hover animate-fade-in-up p-6 cursor-pointer event-card"
                    style="animation-delay: {{ $loop->index * 200 }}ms;"
                    data-id="{{ $event->id_kegiatan }}"
                    data-judul="{{ $event->judul }}"
                    data-pembicara="{{ $event->pembicara }}"
                    data-lokasi="{{ $event->lokasi }}"
                    data-tanggal="{{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('l, j F Y') }}"
                    data-waktu="{{ $event->waktu }}"
                    data-deskripsi-singkat="{{ $event->deskripsi_singkat }}"
                    data-deskripsi-panjang="{{ $event->deskripsi_panjang }}"
                    {{-- Debug: print gambar path untuk melihat nilai sebenarnya --}}
                    data-gambar="{{ $event->gambar ? asset($event->gambar) : asset('images/PantiStock/panti-asuhan.jpg') }}"
                    {{-- Tambahkan data debug --}}
                    data-gambar-original="{{ $event->gambar }}"
                    data-has-gambar="{{ $event->gambar ? 'yes' : 'no' }}">
                    
                    <!-- Debug info yang bisa dihapus nanti -->
                    {{-- @if(config('app.debug'))
                        <div class="text-xs text-gray-500 mb-2">
                            Debug - Gambar: {{ $event->gambar ?: 'null' }} | 
                            Path: {{ $event->gambar ? asset('storage/' . $event->gambar) : 'default' }}
                        </div>
                    @endif --}}
                    
                    <div class="flex flex-col gap-4">
                        <p class="text-xl font-bold text-[#E9762B]">{{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('l, j F Y') }}</p>
                        <h2 class="text-xl font-semibold text-[#0D4715]">{{ $event->judul }}</h2>
                        <div class="flex items-center gap-4 text-[#41644A]">
                            <span>Pembicara: <span class="text-[#E9762B]">{{ $event->pembicara }}</span></span>
                            <span class="text-[#41644A]">•</span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                {{ $event->lokasi }}
                            </span>
                        </div>
                        <div class="flex gap-2 items-center text-sm text-[#41644A] py-1 px-2 bg-[#D0D5CB] rounded-full w-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>{{ $event->waktu }}</span>
                        </div>
                        <p class="text-[#41644A] leading-relaxed">{{ $event->deskripsi_singkat }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-lg text-gray-500">Belum ada jadwal kegiatan yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        <div id="eventDetailModal" class="modal fixed hidden inset-0 z-50 items-center justify-center bg-black bg-opacity-60 backdrop-blur-sm animate-fade-in">
            <div class="bg-white rounded-2xl max-w-2xl w-full mx-4 max-h-[calc(95vh-8rem)] overflow-y-auto shadow-2xl animate-scale-in mt-24 scrollbar-hide">
                <div class="relative">
                    <button class="absolute top-4 right-4 z-10 p-2 bg-white bg-opacity-90 rounded-full hover:bg-opacity-100 transition-all duration-200 hover:scale-110" onclick="closeModal('eventDetailModal')">
                        <svg class="w-5 h-5 text-[#41644A]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <div class="h-64 bg-gradient-to-br from-[#41644A] to-[#0D4715] relative overflow-hidden">
                        {{-- Beri ID agar mudah diubah via JS --}}
                        <img id="modal-gambar" src="" alt="Gambar Kegiatan" class="w-full h-full object-cover opacity-80" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-16">
                            {{-- Beri ID agar mudah diubah via JS --}}
                            <h2 id="modal-judul" class="text-2xl font-bold text-white mb-2"></h2>
                        </div>
                    </div>
                </div>
                <div class="p-6 overflow-y-auto scrollbar-hide">
                    <div class="mb-6">
                        <div class="flex items-start gap-4 text-[#41644A]">
                            {{-- Beri ID agar mudah diubah via JS --}}
                            <span>Pembicara: <span id="modal-pembicara" class="text-[#E9762B]"></span></span>
                            <span class="text-[#41644A]">•</span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                {{-- Beri ID agar mudah diubah via JS --}}
                                <span id="modal-lokasi"></span>
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 mb-6">
                        <div class="flex gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span class="font-bold">Kapan</span>
                        </div>
                        <div class="flex gap-4 items-center">
                            {{-- Beri ID agar mudah diubah via JS --}}
                            <span id="modal-tanggal" class="text-[#41644A]"></span>
                            <span id="modal-waktu" class="text-[#41644A] font-bold"></span>
                        </div>
                    </div>
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-[#0D4715] mb-3">Detail Agenda</h3>
                        {{-- Beri ID agar mudah diubah via JS --}}
                        <p id="modal-deskripsi-panjang" class="text-[#41644A] leading-relaxed"></p>
                    </div>
                    <div class="bg-gray-100 px-6 py-4 rounded-b-lg flex justify-center w-full">
                        @auth
                            <button id="followEventButton" data-event-id="" class="bg-gradient-to-r from-[#E9762B] to-[#D0661A] hover:from-[#D0661A] hover:to-[#B85515] text-white w-full flex-1 flex-grow text-center font-bold py-3 px-6 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-[1.02]">
                                🎯 Ikuti Acara
                            </button>   
                        @endauth
                        @guest
                            <a href="{{ route('login') }}" class="bg-gradient-to-r from-[#41644A] to-[#0D4715] hover:from-[#38543f] hover:to-[#0B3A12] text-white w-full text-center font-bold py-3 px-6 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-[1.02]">
                                🔐 Login untuk Mengikuti Acara
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Hubungi Kami Section -->
    <section class="py-20 bg-white relative">
        <div class="max-w-7xl mx-auto px-6 relative ">
            <div class="text-center mb-16 animate-fade-in-up">
                <h2 class="text-4xl md:text-5xl font-bold text-[#0D4715] mb-6 tracking-tight">
                    Hubungi <span class="text-[#E9762B]">Kami</span>
                </h2>
                <p class="text-xl text-[#41644A] max-w-4xl mx-auto leading-relaxed font-medium">
                    Mari berkolaborasi untuk mewujudkan perubahan positif bagi anak-anak panti asuhan.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <div class="animate-fade-in-up" style="animation-delay: 200ms;">
                    <div class="flex flex-col gap-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-[#41644A] rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <p class="text-xl text-[#41644A] font-bold flex-1">titikkebaikan@gmail.com</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-[#41644A] rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                            </div>
                            <p class="text-xl text-[#41644A] font-bold flex-1">+62 852-2615-8143</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-12 h-12 bg-[#41644A] rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                            </div>
                            <p class="text-xl text-[#41644A] font-bold flex-1">Jl. Cakrawala No.5, Sumbersari, Kec.
                                Lowokwaru, Kota Malang, Jawa Timur 65145</p>
                        </div>
                    </div>
                </div>
                <div class="bg-primary-cream rounded-xl shadow-lg p-8 animate-fade-in-up" style="animation-delay: 400ms;">
                    <form id="contact-form" action="{{ route('kontak.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label class="block text-lg font-bold text-[#0D4715] mb-2">Nama Lengkap</label>
                            <input type="text" name="nama" placeholder="Nama Lengkap Anda"
                                value="{{ old('nama', auth()->user()->name ?? '') }}"
                                class="p-3 w-full bg-white border border-[#D0D5CB] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#E9762B] transition-all duration-300"
                                required @if(!auth()->check()) autocomplete="off" @endif>
                            @error('nama')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-lg font-bold text-[#0D4715] mb-2">Nomor Telepon</label>
                            <input type="tel" name="telepon" placeholder="Nomor Telepon Anda"
                                value="{{ old('telepon') }}"
                                class="p-3 w-full bg-white border border-[#D0D5CB] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#E9762B] transition-all duration-300">
                            @error('telepon')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-lg font-bold text-[#0D4715] mb-2">Email</label>
                            <input type="email" name="email" placeholder="Email Anda"
                                value="{{ old('email', auth()->user()->email ?? '') }}"
                                class="p-3 w-full bg-white border border-[#D0D5CB] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#E9762B] transition-all duration-300"
                                required @if(!auth()->check()) autocomplete="off" @endif>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-lg font-bold text-[#0D4715] mb-2">Subjek Pesan</label>
                            <select name="subjek"
                                class="p-3 w-full text-[#41644A] bg-white border border-[#D0D5CB] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#E9762B] transition-all duration-300"
                                required>
                                <option value="" selected disabled>Pilih Salah Satu</option>
                                <option value="usulan-kerja-sama" @if (old('subjek') == 'usulan-kerja-sama') selected @endif>Usulan Kerja Sama</option>
                                <option value="pesan" @if (old('subjek') == 'pesan') selected @endif>Pesan</option>
                                <option value="pertanyaan" @if (old('subjek') == 'pertanyaan') selected @endif>Pertanyaan</option>
                            </select>
                            @error('subjek')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-lg font-bold text-[#0D4715] mb-2">Pesan</label>
                            <textarea name="pesan" placeholder="Tulis Pesan Kepada Kami"
                                class="p-3 w-full bg-white border border-[#D0D5CB] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#E9762B] transition-all duration-300 h-32 resize-none"
                                required>{{ old('pesan') }}</textarea>
                            @error('pesan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full bg-[#E9762B] hover:bg-[#D0661A] text-white font-bold py-3 rounded-lg transition-colors duration-300">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 tk-gradient-warm relative">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 animate-fade-in-up">
                <div class="flex items-center justify-center mb-6">
                    <div
                        class="w-16 h-16 bg-[#E9762B] rounded-2xl flex items-center justify-center shadow-lg animate-bounce-soft">
                        <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z" />
                        </svg>
                    </div>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-[#0D4715] mb-6 tracking-tight">
                    Punya <span class="text-[#E9762B]">Pertanyaan?</span>
                </h2>
                <p class="text-xl text-[#41644A] max-w-4xl mx-auto leading-relaxed font-medium">
                    Temukan jawaban atas pertanyaan yang sering diajukan untuk membantu Anda berkolaborasi dengan kami.
                </p>
            </div>

            <div class="max-w-5xl mx-auto space-y-4">
                @forelse($faqs as $faq)
                    <details class="bg-white rounded-xl shadow-lg card-hover animate-fade-in-up"
                        style="animation-delay: {{ $loop->index * 200 }}ms;">
                        <summary
                            class="flex justify-between items-center p-6 cursor-pointer font-bold text-lg text-[#0D4715]">
                            {{ $faq->question }}
                            <svg class="w-5 h-5 transform transition-transform duration-200" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </summary>
                        <div class="p-6 text-[#41644A] leading-relaxed">{{ $faq->answer }}</div>
                    </details>
                @empty
                    <div class="text-center text-gray-500">
                        <p>Belum ada pertanyaan yang sering diajukan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{ asset('js/jadwal-kegiatan.js') }}"></script>
    @endpush
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const contactForm = document.getElementById('contact-form');
        const submitButton = contactForm.querySelector('button[type="submit"]');
        const originalButtonText = submitButton.textContent;
        
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Disable button dan ubah text
            submitButton.disabled = true;
            submitButton.textContent = 'Mengirim...';
            submitButton.classList.add('opacity-75');
            
            // Hapus pesan error sebelumnya
            const existingMessages = document.querySelectorAll('.error-message, .ajax-message');
            existingMessages.forEach(msg => msg.remove());
            
            // Ambil form data
            const formData = new FormData(contactForm);
            
            // Kirim AJAX request
            fetch(contactForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Reset button
                submitButton.disabled = false;
                submitButton.textContent = originalButtonText;
                submitButton.classList.remove('opacity-75');
                
                if (data.success) {
                    // Tampilkan pesan sukses
                    showMessage(data.success, 'success');
                    // Reset form
                    contactForm.reset();
                } else if (data.must_login) {
                    // Tampilkan pesan login required
                    showMessage(data.must_login, 'warning');
                } else if (data.errors) {
                    // Tampilkan error validasi
                    Object.keys(data.errors).forEach(field => {
                        const input = contactForm.querySelector(`[name="${field}"]`);
                        if (input) {
                            // Tambahkan border merah
                            input.classList.add('border-red-500');
                            
                            const errorDiv = document.createElement('div');
                            errorDiv.className = 'error-message text-red-500 text-xs mt-1';
                            errorDiv.textContent = data.errors[field][0];
                            input.parentNode.appendChild(errorDiv);
                            
                            // Hapus border merah saat user mulai mengetik
                            input.addEventListener('input', function() {
                                this.classList.remove('border-red-500');
                                const errorMsg = this.parentNode.querySelector('.error-message');
                                if (errorMsg) {
                                    errorMsg.remove();
                                }
                            }, { once: true });
                        }
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                submitButton.disabled = false;
                submitButton.textContent = originalButtonText;
                submitButton.classList.remove('opacity-75');
                showMessage('Silahkan login terlebih dahulu!', 'error');
            });
        });
        
        function showMessage(message, type) {
            // Hapus pesan sebelumnya
            const existingMessage = document.querySelector('.ajax-message');
            if (existingMessage) {
                existingMessage.remove();
            }
            
            // Buat elemen pesan baru
            const messageDiv = document.createElement('div');
            messageDiv.className = 'ajax-message mt-4 text-center p-3 rounded-lg animate-fade-in-up';
            
            // Set warna berdasarkan tipe
            if (type === 'success') {
                messageDiv.className += ' bg-green-100 text-green-800 border border-green-200';
            } else if (type === 'warning') {
                messageDiv.className += ' bg-yellow-100 text-yellow-800 border border-yellow-200';
            } else if (type === 'error') {
                messageDiv.className += ' bg-red-100 text-red-800 border border-red-200';
            }
            
            messageDiv.textContent = message;
            
            // Tambahkan tombol login jika perlu login
            if (type === 'warning') {
                const loginButton = document.createElement('a');
                loginButton.href = '{{ route("login") }}';
                loginButton.className = 'inline-block mt-2 bg-[#41644A] text-white px-6 py-2 rounded-lg font-bold hover:bg-[#0D4715] transition-colors duration-200';
                loginButton.textContent = 'Login Sekarang';
                messageDiv.appendChild(document.createElement('br'));
                messageDiv.appendChild(loginButton);
            }
            
            // Tambahkan ke form
            contactForm.appendChild(messageDiv);
            
            // Auto hide setelah 5 detik untuk pesan sukses
            if (type === 'success') {
                setTimeout(() => {
                    if (messageDiv.parentNode) {
                        messageDiv.style.opacity = '0';
                        messageDiv.style.transform = 'translateY(-10px)';
                        messageDiv.style.transition = 'all 0.3s ease';
                        setTimeout(() => {
                            if (messageDiv.parentNode) {
                                messageDiv.remove();
                            }
                        }, 300);
                    }
                        }, 5000);
                    }
                }
            });
    </script>
@endsection
