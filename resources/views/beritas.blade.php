@extends('layouts.app')
@section('content')
<div class="py-20 md:py-28 bg-white relative -mt-32">
  <div class="absolute inset-0 opacity-3">
      <div class="absolute top-20 right-10 w-32 h-32 bg-[#D0D5CB] rounded-full animate-float"></div>
      <div class="absolute bottom-20 left-10 w-24 h-24 bg-[#F1F0E9] rounded-full animate-float" style="animation-delay: 1s;"></div>
  </div>

  <div class="max-w-3xl mx-auto px-6 relative z-10">
    <div class="" href="/berita/{{ $beritas['id_artikel'] }}">
      <div class="flex flex-col gap-6">
        <div class="flex justify-between items-start pt-8">
          <h3 class="text-5xl font-bold">{{ $beritas->judul }}</h3>
          
          @auth
          <button id="bookmarkBtn{{ $beritas->id }}" onclick="toggleBookmark({{ $beritas->id }})" class="bg-[#E9762B] hover:bg-[#0D4715] text-white font-bold py-3 px-4 rounded-lg text-center flex items-center justify-center transition-colors duration-300">
            <svg id="bookmarkIcon{{ $beritas->id }}" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
            </svg>
          </button>
          @endauth
        </div>
        
        <p class="text-lg uppercase text-[#41644A] font-bold">{{ $beritas->kategori->nama }}</p>
        <img class="w-96 h-auto mx-auto rounded-lg shadow-md object-cover" src="{{ asset('storage/' . $beritas->gambar) }}" alt="Artikel" loading="lazy" width="800" height="600">
        <p class="text-lg">{{ $beritas->konten }}</p>
      
        <div class="flex gap-2">
          <p class="font-bold">{{ $beritas->author->name }}</p>
          <span>|</span>
          <p class="font-bold">{{ $beritas->publish_date->diffForHumans() }}</p>
        </div>

        <a class="text-[#E9762B] font-bold hover:underline" href="/berita">kembali</a>
      </div>
    <div>
  <div>
</div>

@auth
<script>
// Cek status bookmark saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    checkBookmarkStatus({{ $beritas->id }});
});

function checkBookmarkStatus(artikelId) {
    fetch(`/bookmark/artikel/${artikelId}/check`)
        .then(response => response.json())
        .then(data => {
            updateBookmarkButton(artikelId, data.isBookmarked);
        })
        .catch(error => {
            console.error('Error checking bookmark status:', error);
        });
}

function toggleBookmark(artikelId) {
    fetch(`/bookmark/artikel/${artikelId}/toggle`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateBookmarkButton(artikelId, data.isBookmarked);
            
            // Tampilkan notifikasi
            showNotification(data.message, data.isBookmarked ? 'success' : 'info');
        }
    })
    .catch(error => {
        console.error('Error toggling bookmark:', error);
        showNotification('Terjadi kesalahan saat mengubah bookmark', 'error');
    });
}

function updateBookmarkButton(artikelId, isBookmarked) {
    const button = document.getElementById(`bookmarkBtn${artikelId}`);
    const icon = document.getElementById(`bookmarkIcon${artikelId}`);
    
    if (isBookmarked) {
        // Bookmark aktif
        button.classList.remove('bg-[#E9762B]', 'hover:bg-[#0D4715]');
        button.classList.add('bg-[#41644A]', 'hover:bg-[#0D4715]');
        icon.innerHTML = '<path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" fill="currentColor"></path>';
    } else {
        // Bookmark tidak aktif
        button.classList.remove('bg-[#41644A]', 'hover:bg-[#0D4715]');
        button.classList.add('bg-[#E9762B]', 'hover:bg-[#0D4715]');
        icon.innerHTML = '<path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>';
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
@endauth

@endsection 