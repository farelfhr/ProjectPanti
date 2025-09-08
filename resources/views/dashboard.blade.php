@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard User') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('status') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Welcome Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 border border-[#D0D5CB]">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4 text-[#41644A]">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600">
                        Terima kasih telah bergabung dengan platform Titik Kebaikan. Mari bersama-sama membantu panti asuhan di Indonesia.
                    </p>
                </div>
            </div>

            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 border-b pb-4 mb-4">
                        Acara yang Saya Ikuti
                    </h3>
                    
                    @if($kegiatan_diikuti && $kegiatan_diikuti->count() > 0)
                        <div id="acara-diikuti-section"  class="space-y-4">
                            @foreach($kegiatan_diikuti as $kegiatan)
                                <div class="flex items-center p-4 border rounded-lg hover:bg-gray-50 transition">
                                    <img src="{{ $kegiatan->gambar ? asset($kegiatan->gambar) : asset('images/PantiStock/panti-asuhan.jpg') }}" 
                                         alt="{{ $kegiatan->judul }}" 
                                         class="w-20 h-20 object-cover rounded-md mr-4">
                                    <div class="flex-grow">
                                        <h4 class="text-lg font-bold text-gray-900">{{ $kegiatan->judul }}</h4>
                                        <p class="text-sm text-gray-600">
                                            Diselenggarakan oleh: {{ $kegiatan->panti->nama_panti ?? 'Informasi tidak tersedia' }}
                                        </p>
                                        <p class="text-sm text-gray-500 mt-1">
                                            <span class="font-medium">Tanggal:</span> 
                                            {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('l, d F Y') }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        {{-- Pesan jika user belum mengikuti acara apapun --}}
                        <p class="text-gray-600">
                            Anda belum mengikuti acara apapun. Jelajahi halaman <a href="{{ route('kerjasama') }}" class="text-blue-500 hover:underline">Kerjasama</a> untuk menemukan acara menarik!
                        </p>
                    @endif
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#D0D5CB]">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-2 bg-green-100 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-600">Total Donasi</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ Auth::user()->donations()->where('status', 'completed')->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#D0D5CB]">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-600">Bookmark</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ Auth::user()->bookmarks()->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#D0D5CB]">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-2 bg-purple-100 rounded-lg">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-600">Event Diikuti</p>
                                <p class="text-2xl font-semibold text-gray-900">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Two Column Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Riwayat Donasi -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#D0D5CB]">
                    <div class="p-6">
                        <h4 class="text-xl font-semibold text-gray-900 mb-4 text-[#41644A]">Riwayat Donasi</h4>
                        @php
                            $donations = Auth::user()->donations()->with('panti')->latest()->take(5)->get();
                        @endphp
                        
                        @if($donations->count() > 0)
                            <div class="space-y-3">
                                @foreach($donations as $donation)
                                <div class="border-l-4 border-green-400 pl-4 py-2">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-medium text-gray-900">{{ $donation->panti->nama ?? 'Panti Tidak Diketahui' }}</p>
                                            @if($donation->isCash())
                                                <p class="text-sm text-gray-600">Donasi Tunai: Rp {{ number_format($donation->amount, 0, ',', '.') }}</p>
                                            @else
                                                <p class="text-sm text-gray-600">Donasi Non-Tunai: {{ $donation->donation_items }}</p>
                                            @endif
                                            <p class="text-xs text-gray-500">{{ $donation->created_at->format('d M Y') }}</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs rounded-full 
                                            @if($donation->status === 'completed') bg-green-100 text-green-800
                                            @elseif($donation->status === 'pending') bg-yellow-100 text-yellow-800
                                            @else bg-red-100 text-red-800 @endif">
                                            {{ ucfirst($donation->status) }}
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="mt-4">
                                <a href="#" class="text-[#E9762B] hover:text-[#0D4715] text-sm font-medium">Lihat semua riwayat donasi →</a>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                                <p class="text-gray-500 mt-2">Belum ada donasi</p>
                                <a href="{{ route('daftar-panti') }}" class="mt-2 inline-block bg-[#E9762B] hover:bg-[#0D4715] text-white font-bold py-2 px-4 rounded text-sm transition">
                                    Mulai Berdonasi
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Bookmark -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#D0D5CB]">
                    <div class="p-6">
                        <h4 class="text-xl font-semibold text-gray-900 mb-4 text-[#41644A]">Bookmark Saya</h4>
                        @php
                            $bookmarks = Auth::user()->bookmarks()->with('bookmarkable')->latest()->take(5)->get();
                        @endphp
                        
                        @if($bookmarks->count() > 0)
                            <div class="space-y-3">
                                @foreach($bookmarks as $bookmark)
                                <div class="border rounded-lg p-3 hover:bg-gray-50 transition-colors border-[#D0D5CB]">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">
                                            @if($bookmark->bookmarkable_type === 'App\Models\Panti')
                                                <h5 class="font-medium text-gray-900">🏠 {{ $bookmark->bookmarkable->nama }}</h5>
                                                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($bookmark->bookmarkable->alamat, 60) }}</p>
                                            @elseif($bookmark->bookmarkable_type === 'App\Models\Artikel')
                                                <h5 class="font-medium text-gray-900">📰 {{ $bookmark->bookmarkable->judul }}</h5>
                                                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($bookmark->bookmarkable->konten, 60) }}</p>
                                            @endif
                                            <p class="text-xs text-gray-500 mt-1">{{ $bookmark->created_at->format('d M Y') }}</p>
                                        </div>
                                        <form method="POST" action="{{ route('bookmark.destroy', $bookmark) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin ingin menghapus bookmark ini?')" class="text-red-600 hover:text-red-800 ml-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('bookmark.index') }}" class="text-[#E9762B] hover:text-[#0D4715] text-sm font-medium">Lihat semua bookmark →</a>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                </svg>
                                <p class="text-gray-500 mt-2">Belum ada bookmark</p>
                                <p class="text-sm text-gray-400 mt-1">Bookmark panti atau artikel yang menarik untuk Anda</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Kalender Kegiatan -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 border border-[#D0D5CB]">
                <div class="p-6">
                    <h4 class="text-xl font-semibold text-gray-900 mb-4 text-[#41644A]">Kegiatan Mendatang</h4>
                    @php
                        $upcomingEvents = \App\Models\Kegiatan::where('tanggal', '>=', now())
                                                              ->orderBy('tanggal')
                                                              ->take(6)
                                                              ->get();
                    @endphp
                    
                    @if($upcomingEvents->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($upcomingEvents as $event)
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow border-[#D0D5CB]">
                                <div class="flex items-start justify-between mb-2">
                                    <h5 class="font-medium text-gray-900">{{ $event->judul }}</h5>
                                    <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">
                                        {{ \Carbon\Carbon::parse($event->tanggal)->diffForHumans() }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 mb-2">{{ Str::limit($event->deskripsi_singkat, 80) }}</p>
                                <div class="text-xs text-gray-500">
                                    <p>📅 {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</p>
                                    <p>📍 {{ $event->lokasi }}</p>
                                </div>
                                <div class="mt-3">
                                    <button class="text-[#E9762B] hover:text-[#0D4715] text-sm font-medium">
                                        Ikuti Kegiatan
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-500 mt-2">Belum ada kegiatan mendatang</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 border border-[#D0D5CB]">
                <div class="p-6">
                    <h4 class="text-xl font-semibold text-gray-900 mb-4 text-[#41644A]">Aksi Cepat</h4>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <a href="{{ route('daftar-panti') }}" class="flex flex-col items-center p-4 border rounded-lg hover:bg-gray-50 transition-colors border-[#D0D5CB]">
                            <svg class="w-8 h-8 text-[#E9762B] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <span class="text-sm font-medium text-gray-900">Cari Panti</span>
                        </a>
                        
                        <a href="{{ route('berita.index') }}" class="flex flex-col items-center p-4 border rounded-lg hover:bg-gray-50 transition-colors border-[#D0D5CB]">
                            <svg class="w-8 h-8 text-[#E9762B] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                            <span class="text-sm font-medium text-gray-900">Baca Berita</span>
                        </a>
                        
                        <a href="{{ route('kerjasama') }}" class="flex flex-col items-center p-4 border rounded-lg hover:bg-gray-50 transition-colors border-[#D0D5CB]">
                            <svg class="w-8 h-8 text-[#E9762B] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span class="text-sm font-medium text-gray-900">Kerjasama</span>
                        </a>
                        
                        <a href="{{ route('profile.edit') }}" class="flex flex-col items-center p-4 border rounded-lg hover:bg-gray-50 transition-colors border-[#D0D5CB]">
                            <svg class="w-8 h-8 text-[#E9762B] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-sm font-medium text-gray-900">Profil</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Logout Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 border border-[#D0D5CB]">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 text-[#41644A]">Keluar dari Akun</h4>
                            <p class="text-sm text-gray-600 mt-1">Klik tombol di bawah untuk keluar dari akun Anda</p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
