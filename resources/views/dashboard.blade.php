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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 border border-[#D0D5CB]">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 border-b pb-4 mb-4">
                        Acara yang Anda Ikuti
                    </h3>
                    
                    @if($kegiatan_diikuti && $kegiatan_diikuti->count() > 0)
                        <div id="acara-diikuti-section"  class="space-y-4">
                            @foreach($kegiatan_diikuti as $kegiatan)
                                <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50 transition group" data-event-id="{{ $kegiatan->id_kegiatan }}">
                                    <div class="flex">
                                        <img src="{{ $kegiatan->gambar ? asset($kegiatan->gambar) : asset('images/PantiStock/panti-asuhan.jpg') }}" 
                                            alt="{{ $kegiatan->judul }}" 
                                            class="w-24 h-24 object-cover rounded-md mr-4">
                                        <div class="flex-grow">
                                            <div class="flex gap-4 items-center">
                                                <h4 class="text-lg font-bold text-gray-900">{{ $kegiatan->judul }}</h4>

                                                <div class="flex items-center">
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 8 8">
                                                            <circle cx="4" cy="4" r="3"/>
                                                        </svg>
                                                        Terdaftar
                                                    </span>
                                                </div>
                                            </div>
                                            <p class="text-sm text-gray-600">
                                                {{ Str::limit($kegiatan->deskripsi_singkat, 100) }}
                                            </p>

                                            <div class="flex items-center gap-1 mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <p class="text-sm text-gray-500">
                                                    {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('l, d F Y') }}
                                                </p>
                                            </div>

                                            <div class="flex items-center gap-1 mt-1">
                                                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                                </svg>
                                                <p class="text-sm text-gray-500">
                                                    {{ $kegiatan->lokasi }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" 
                                        class="unfollow-event-btn px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-all hidden group-hover:block"
                                        data-event-id="{{ $kegiatan->id_kegiatan }}"
                                        data-event-title="{{ $kegiatan->judul }}">
                                        Batal Ikuti
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        {{-- Pesan jika user belum mengikuti acara apapun --}}
                        <div class="text-center py-12 animate-fade-in-scale">
                            <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak Ada Kegiatan</h3>
                            <p class="text-gray-600 mb-6">Anda belum mengikuti acara apapun.</p>
                            <a href="/kerjasama" class="inline-flex items-center px-4 py-2 bg-[#E9762B] hover:bg-[#D0661A] text-white font-medium rounded-lg transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                Jelajahi Kegiatan
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Enhanced Confirmation Modal -->
            <div id="unfollowModal" class="fixed inset-0 z-50 flex items-center justify-center hidden modal-backdrop bg-black bg-opacity-50">
                <div id="modalContent" class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 overflow-hidden animate-fade-in-scale">
                    <!-- Modal Header -->
                    <div class="bg-gradient-to-r from-red-500 to-red-600 p-6 text-white">
                        <div class="flex items-center justify-center w-16 h-16 mx-auto bg-white bg-opacity-20 rounded-full mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-center">Konfirmasi Batalkan Kegiatan</h3>
                    </div>

                    <!-- Modal Body -->
                    <div class="p-6">
                        <p class="text-gray-600 text-center mb-2">
                            Anda yakin ingin membatalkan partisipasi pada acara:
                        </p>
                        <p id="eventTitleModal" class="text-lg font-semibold text-gray-900 text-center mb-6">
                            <!-- Event title will be inserted here -->
                        </p>
                        
                        <div class="bg-amber-50 border-l-4 border-amber-400 p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-amber-700">
                                        Tindakan ini tidak dapat dibatalkan. Anda bisa mendaftar ulang kegiatan ini nanti.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-3">
                            <button id="cancelUnfollow" type="button" 
                                class="flex-1 px-4 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-gray-300">
                                <div class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Batal
                                </div>
                            </button>
                            <button id="confirmUnfollow" type="button" 
                                class="flex-1 px-4 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-red-300">
                                <div class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Ya, Batalkan
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Notification System -->
            <div id="notification-popup" class="fixed top-5 right-5 transform translate-x-full transition-all duration-500 ease-in-out z-50 max-w-md">
                <div class="bg-white rounded-lg shadow-2xl border-l-4 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div id="notification-icon" class="w-6 h-6">
                                    <!-- Icon will be inserted here -->
                                </div>
                            </div>
                            <div class="ml-3 flex-1">
                                <p id="notification-title" class="text-sm font-medium text-gray-900">
                                    <!-- Title will be inserted here -->
                                </p>
                                <p id="notification-message" class="text-sm text-gray-600 mt-1">
                                    <!-- Message will be inserted here -->
                                </p>
                            </div>
                            <button id="closeNotification" class="ml-4 inline-flex text-gray-400 hover:text-gray-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- Progress bar -->
                    <div id="notification-progress" class="h-1 bg-gray-200">
                        <div class="h-full bg-gradient-to-r transition-all duration-500 ease-linear" style="width: 100%"></div>
                    </div>
                </div>
            </div>
            
            <style>
                /* Tambahan style animasi untuk section acara yang diikuti */
                @keyframes slideInDown {
                    from { opacity: 0; transform: translateY(-30px); }
                    to { opacity: 1; transform: translateY(0); }
                }

                @keyframes slideOutUp {
                    from { opacity: 1; transform: translateY(0); }
                    to { opacity: 0; transform: translateY(-30px); }
                }

                @keyframes fadeInScale {
                    from { opacity: 0; transform: scale(0.9); }
                    to { opacity: 1; transform: scale(1); }
                }

                @keyframes shake {
                    0%, 100% { transform: translateX(0); }
                    25% { transform: translateX(-5px); }
                    75% { transform: translateX(5px); }
                }

                .animate-slide-in-down { animation: slideInDown 0.3s ease-out; }
                .animate-slide-out-up { animation: slideOutUp 0.3s ease-in; }
                .animate-fade-in-scale { animation: fadeInScale 0.3s ease-out; }
                .animate-shake { animation: shake 0.5s ease-in-out; }

                .modal-backdrop {
                    backdrop-filter: blur(4px);
                    -webkit-backdrop-filter: blur(4px);
                }

                .group:hover .unfollow-event-btn {
                    opacity: 1;
                    transform: translateX(0);
                }

                .unfollow-event-btn {
                    opacity: 0;
                    transform: translateX(8px);
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                }
            </style>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-6">
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
                                    <a href="{{ $event->id_kegiatan  }}" class="text-[#E9762B] hover:text-[#0D4715] text-sm font-medium">
                                        Ikuti Kegiatan
                                    </a>
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
