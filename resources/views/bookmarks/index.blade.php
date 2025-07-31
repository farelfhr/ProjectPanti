@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Bookmark Saya') }}
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

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Header Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#D0D5CB] mb-6">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-4 text-[#41644A]">Bookmark Saya</h3>
                    <p class="text-gray-600">
                        Kelola panti asuhan dan artikel yang telah Anda bookmark untuk akses cepat.
                    </p>
                </div>
            </div>

            <!-- Bookmarks Grid -->
            @if($bookmarks->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($bookmarks as $bookmark)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#D0D5CB] hover:shadow-lg transition-shadow" data-bookmark-id="{{ $bookmark->id }}">
                        <div class="p-6">
                            <!-- Bookmark Type Badge -->
                            <div class="flex justify-between items-start mb-4">
                                @if($bookmark->bookmarkable_type === 'App\Models\Panti')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        🏠 Panti Asuhan
                                    </span>
                                @elseif($bookmark->bookmarkable_type === 'App\Models\Artikel')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        📰 Artikel
                                    </span>
                                @endif
                            </div>

                            <!-- Content -->
                            @if($bookmark->bookmarkable_type === 'App\Models\Panti')
                                <div class="mb-4">
                                    @if($bookmark->bookmarkable->gambar)
                                        <img src="{{ asset('storage/' . $bookmark->bookmarkable->gambar) }}" alt="{{ $bookmark->bookmarkable->nama }}" class="w-full h-32 object-cover rounded-lg mb-3">
                                    @else
                                        <div class="w-full h-32 bg-[#D0D5CB] rounded-lg flex items-center justify-center mb-3">
                                            <svg class="h-12 w-12 text-[#41644A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                <polyline points="21 15 16 10 5 21"></polyline>
                                            </svg>
                                        </div>
                                    @endif
                                    
                                    <h4 class="font-bold text-gray-900 mb-2">{{ $bookmark->bookmarkable->nama }}</h4>
                                    <p class="text-sm text-gray-600 mb-2">{{ Str::limit($bookmark->bookmarkable->alamat, 80) }}</p>
                                    
                                    <div class="flex items-center text-sm text-gray-500 mb-3">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                        <span>{{ $bookmark->bookmarkable->jumlah_anak }} anak</span>
                                        <span class="mx-2">•</span>
                                        <span>{{ $bookmark->bookmarkable->kecamatan }}</span>
                                    </div>
                                    
                                    <div class="flex gap-2">
                                        <a href="{{ route('panti.show', $bookmark->bookmarkable->id_panti) }}" class="flex-1 bg-[#41644A] hover:bg-[#0D4715] text-white font-bold py-2 px-4 rounded-lg text-center text-sm transition-colors">
                                            Lihat Detail
                                        </a>
                                        <button onclick="openDonationModal{{ $bookmark->bookmarkable->id_panti }}()" class="bg-[#E9762B] hover:bg-[#0D4715] text-white font-bold py-2 px-4 rounded-lg text-sm transition-colors">
                                            Donasi
                                        </button>
                                        <button onclick="removeBookmark({{ $bookmark->id }})" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-3 rounded-lg text-sm transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @elseif($bookmark->bookmarkable_type === 'App\Models\Artikel')
                                <div class="mb-4">
                                    @if($bookmark->bookmarkable->gambar)
                                        <img src="{{ asset('storage/' . $bookmark->bookmarkable->gambar) }}" alt="{{ $bookmark->bookmarkable->judul }}" class="w-full h-32 object-cover rounded-lg mb-3">
                                    @else
                                        <div class="w-full h-32 bg-[#D0D5CB] rounded-lg flex items-center justify-center mb-3">
                                            <svg class="h-12 w-12 text-[#41644A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    
                                    <h4 class="font-bold text-gray-900 mb-2">{{ $bookmark->bookmarkable->judul }}</h4>
                                    <p class="text-sm text-gray-600 mb-2">{{ Str::limit($bookmark->bookmarkable->konten, 100) }}</p>
                                    
                                    <div class="flex items-center text-sm text-gray-500 mb-3">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>{{ $bookmark->bookmarkable->publish_date ? \Carbon\Carbon::parse($bookmark->bookmarkable->publish_date)->format('d M Y') : 'Tidak ada tanggal' }}</span>
                                    </div>
                                    
                                    <a href="{{ route('berita.show', $bookmark->bookmarkable->id) }}" class="block w-full bg-[#41644A] hover:bg-[#0D4715] text-white font-bold py-2 px-4 rounded-lg text-center text-sm transition-colors">
                                        Baca Artikel
                                    </a>
                                    <button onclick="removeBookmark({{ $bookmark->id }})" class="mt-2 w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-3 rounded-lg text-sm transition-colors">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus Bookmark
                                    </button>
                                </div>
                            @endif

                            <!-- Bookmark Date -->
                            <div class="text-xs text-gray-500 border-t pt-3">
                                <span>Ditambahkan: {{ $bookmark->created_at->format('d M Y H:i') }}</span>
                            </div>
                        </div>
                    </div>

                    @if($bookmark->bookmarkable_type === 'App\Models\Panti')
                        @include('components.donation-modal', ['panti' => $bookmark->bookmarkable, 'modalId' => 'donationModal' . $bookmark->bookmarkable->id_panti])
                    @endif
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $bookmarks->links() }}
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#D0D5CB]">
                    <div class="p-12 text-center">
                        <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum ada bookmark</h3>
                        <p class="text-gray-600 mb-6">Anda belum menambahkan panti asuhan atau artikel ke bookmark.</p>
                        <div class="flex gap-4 justify-center">
                            <a href="{{ route('daftar-panti') }}" class="bg-[#41644A] hover:bg-[#0D4715] text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                Jelajahi Panti
                            </a>
                            <a href="{{ route('berita.index') }}" class="bg-[#E9762B] hover:bg-[#0D4715] text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                Baca Artikel
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
function removeBookmark(bookmarkId) {
    if (confirm('Yakin ingin menghapus bookmark ini?')) {
        fetch(`/bookmark/${bookmarkId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Hapus elemen bookmark dari DOM
                const bookmarkElement = document.querySelector(`[data-bookmark-id="${bookmarkId}"]`);
                if (bookmarkElement) {
                    bookmarkElement.remove();
                }
                
                // Tampilkan notifikasi
                showNotification(data.message, 'success');
                
                // Reload halaman jika tidak ada bookmark lagi
                setTimeout(() => {
                    if (document.querySelectorAll('[data-bookmark-id]').length === 0) {
                        location.reload();
                    }
                }, 1000);
            }
        })
        .catch(error => {
            console.error('Error removing bookmark:', error);
            showNotification('Terjadi kesalahan saat menghapus bookmark', 'error');
        });
    }
}

function showNotification(message, type) {
    // Buat elemen notifikasi
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full`;
    
    // Set warna berdasarkan tipe
    if (type === 'success') {
        notification.classList.add('bg-green-500', 'text-white');
    } else if (type === 'error') {
        notification.classList.add('bg-red-500', 'text-white');
    } else {
        notification.classList.add('bg-blue-500', 'text-white');
    }
    
    notification.textContent = message;
    
    // Tambahkan ke body
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
    // Animate out dan hapus setelah 3 detik
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}
</script>

@endsection 