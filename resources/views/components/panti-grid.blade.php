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