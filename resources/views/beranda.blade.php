@extends('layouts.app')

@section('content')
<section class="relative bg-gradient-to-br from-primary-cream via-light-cream to-soft-gray py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            {{-- Left Content --}}
            <div class="animate-fade-in-up">
                <div class="flex items-center space-x-2 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-accent-orange">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    <span class="text-primary-green font-medium">Kota Malang, Jawa Timur</span>
                </div>
                
                <h1 class="text-4xl lg:text-6xl font-bold text-dark-green mb-6 leading-tight">
                    Temukan
                    <span class="text-primary-green block">Panti Asuhan</span>
                    <span class="text-accent-orange">Terpercaya</span>
                </h1>
                
                <p class="text-lg text-primary-green mb-8 leading-relaxed">
                    Platform informasi lengkap panti asuhan di Malang. Bantu kami menghubungkan 
                    kebaikan Anda dengan mereka yang membutuhkan melalui lembaga terpercaya.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 mb-12">
                    <a href="/daftar-panti" class="btn-primary flex items-center justify-center space-x-2">
                        <span>Jelajahi Panti Asuhan</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </a>
                    <a href="/tentang" class="btn-secondary">
                        Pelajari Lebih Lanjut
                    </a>
                </div>

                {{-- Stats --}}
                <div class="grid grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="flex items-center justify-center w-12 h-12 bg-primary-green rounded-full mx-auto mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-primary-cream">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21 12 1.5l9.75 19.5h-19.5Z" />
                            </svg>
            </div>
                        <div class="text-2xl font-bold text-dark-green">25+</div>
                        <div class="text-sm text-primary-green">Panti Asuhan</div>
        </div>
                    <div class="text-center">
                        <div class="flex items-center justify-center w-12 h-12 bg-accent-orange rounded-full mx-auto mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-primary-cream">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
              </svg>
        </div>
                        <div class="text-2xl font-bold text-dark-green">500+</div>
                        <div class="text-sm text-primary-green">Anak Asuh</div>
    </div>
                    <div class="text-center">
                        <div class="flex items-center justify-center w-12 h-12 bg-primary-green rounded-full mx-auto mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-primary-cream">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
</div>
                        <div class="text-2xl font-bold text-dark-green">1000+</div>
                        <div class="text-sm text-primary-green">Donatur</div>
    </div>
        </div>
        </div>

            {{-- Right Content - Image --}}
            <div class="animate-fade-in">
                <div class="relative">
                    <div class="bg-gradient-to-br from-primary-green to-dark-green rounded-2xl p-8 transform rotate-3 shadow-2xl">
                        <div class="bg-primary-cream rounded-xl overflow-hidden transform -rotate-3">
                            <img 
                                src="https://bucket-api.baznas.go.id/bucket-api/file?bucket=bzn-fdr-smb-p5739641&file=attachments/new_artikel/ODE3MTE3MjA2MTY0Mzg.jpg" 
                                alt="Anak-anak di panti asuhan"
                                class="w-full h-96 object-cover"
                            />
                            <div class="p-6">
                                @if($orphanages->isNotEmpty())
                                    @php
                                        $heroOrphanage = $orphanages->first();
                                    @endphp
                                    <h3 class="text-lg font-semibold text-dark-green mb-2">
                                        {{ $heroOrphanage->nama_panti }}
                                    </h3>
                                    <p class="text-primary-green text-sm">
                                        Melayani {{ $heroOrphanage->jumlah_anak }} anak dengan penuh kasih sayang sejak {{ $heroOrphanage->tahun_berdiri }}
                                    </p>
                                @else
                                    <h3 class="text-lg font-semibold text-dark-green mb-2">
                                        Panti Asuhan Harapan Bunda
                                    </h3>
                                    <p class="text-primary-green text-sm">
                                        Melayani 35 anak dengan penuh kasih sayang sejak 1995
                                    </p>
                                @endif
        </div>
    </div>
</div>

                    {{-- Floating elements --}}
                    <div class="absolute -top-4 -right-4 w-20 h-20 bg-accent-orange rounded-full opacity-20 animate-pulse"></div>
                    <div class="absolute -bottom-6 -left-6 w-16 h-16 bg-primary-green rounded-full opacity-30 animate-pulse delay-1000"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-light-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-16 animate-fade-in">
            <h2 class="text-3xl lg:text-4xl font-bold text-dark-green mb-4">
                Panti Asuhan Unggulan
            </h2>
            <p class="text-lg text-primary-green max-w-2xl mx-auto">
                Temukan panti asuhan terpercaya di Malang yang membutuhkan dukungan Anda
            </p>
</div>

        {{-- Orphanages Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @forelse($orphanages as $index => $orphanage)
                <div 
                    key="{{ $orphanage->id }}" 
                    class="bg-primary-cream rounded-xl shadow-lg overflow-hidden card-hover animate-fade-in-up"
                    style="animation-delay: {{ $index * 200 }}ms"
                >
                    {{-- Image --}}
                    <div class="relative overflow-hidden">
                        <img 
                            src="{{ asset('storage/panti/panti' . rand(1,5) . '.webp') }}" 
                            alt="{{ $orphanage->nama_panti }}"
                            class="w-full h-48 object-cover hover:scale-110 transition-transform duration-500"
                        />
                        <div class="absolute top-4 right-4 bg-primary-green text-primary-cream px-3 py-1 rounded-full text-sm font-medium">
                            Est. {{ $orphanage->tahun_berdiri }}
                        </div>
    </div>

                    {{-- Content --}}
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-dark-green mb-2">
                            {{ $orphanage->nama_panti }}
                        </h3>
                        
                        <div class="flex items-center space-x-4 mb-4 text-sm text-primary-green">
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                <span>{{ $orphanage->kecamatan }}</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                                <span>{{ $orphanage->jumlah_anak }} anak</span>
                            </div>
                </div>

                        <p class="text-primary-green mb-4 text-sm leading-relaxed">
                            {{ $orphanage->deskripsi }}
                        </p>

                        {{-- Needs --}}
                        <div class="mb-6">
                            <h4 class="text-sm font-semibold text-dark-green mb-2">Kebutuhan Mendesak:</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach(json_decode($orphanage->kebutuhan, true) as $need)
                                    <span 
                                        class="bg-soft-gray text-primary-green px-2 py-1 rounded-md text-xs"
                                    >
                                        {{ $need }}
                                    </span>
                                @endforeach
                </div>
            </div>

                        {{-- Actions --}}
                        <div class="flex space-x-3">
                            <a href="{{ $orphanage->id ? route('panti.show', $orphanage->id) : '#' }}" class="flex-1 bg-primary-green text-primary-cream py-2 px-4 rounded-lg text-sm font-medium hover:bg-dark-green transition-colors duration-200">
                                Lihat Detail
                            </a>
                            <button class="bg-accent-orange text-primary-cream p-2 rounded-lg hover:bg-opacity-90 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.933 0-3.604 1.081-4.312 2.625-.708-1.544-2.38-2.625-4.313-2.625C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
                            </button>
                </div>
            </div>
        </div>
            @empty
                <div class="text-center py-12 col-span-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-16 w-16 text-soft-gray mx-auto mb-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-primary-green mb-2">
                        Belum ada panti asuhan ditemukan.
                    </h3>
                    <p class="text-primary-green">
                        Silakan tambahkan data panti asuhan melalui panel admin.
                    </p>
                </div>
            @endforelse
</div>

        {{-- View All Button --}}
        <div class="text-center animate-fade-in">
            <a href="/daftar-panti" class="btn-primary flex items-center space-x-2 mx-auto">
                <span>Lihat Semua Panti Asuhan</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
</section>

<section class="py-20 bg-primary-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="flex justify-between items-end mb-12 animate-fade-in">
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-dark-green mb-4">
                    Berita & Kegiatan
                </h2>
                <p class="text-lg text-primary-green">
                    Update terkini seputar dunia panti asuhan di Malang
                </p>
            </div>
            <a 
                href="/berita"
                class="hidden md:flex items-center space-x-2 text-primary-green hover:text-dark-green transition-colors duration-200"
            >
                <span class="font-medium">Lihat Semua Berita</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </a>
        </div>

        {{-- News Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            @forelse($news as $index => $article)
                <article 
                    key="{{ $article->id }}"
                    class="bg-light-cream rounded-xl shadow-lg overflow-hidden card-hover animate-fade-in-up"
                    style="animation-delay: {{ $index * 150 }}ms"
                >
                    {{-- Image --}}
                    <div class="relative overflow-hidden">
                        <img 
                            src="{{ asset('images/artikel/' . $article->gambar_artikel) }}" 
                            alt="{{ $article->judul }}"
                            class="w-full h-48 object-cover hover:scale-110 transition-transform duration-500"
                        />
                        <div class="absolute top-4 left-4">
                            <span class="bg-accent-orange text-primary-cream px-3 py-1 rounded-full text-sm font-medium">
                                {{ $article->kategori_artikel ?? 'Uncategorized' }}
                            </span>
    </div>
</div>

                    {{-- Content --}}
                    <div class="p-6">
                        <div class="flex items-center space-x-4 mb-3 text-sm text-primary-green">
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5m15 7.5v-7.5" />
                                </svg>
                                <span>{{ \Carbon\Carbon::parse($article->tanggal_publikasi)->translatedFormat('d F, Y') }}</span>
        </div>
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span>3 min</span>
    </div>
</div>

                        <h3 class="text-lg font-bold text-dark-green mb-3 line-clamp-2 hover:text-primary-green transition-colors duration-200 cursor-pointer">
                            {{ $article->judul }}
                        </h3>

                        <p class="text-primary-green text-sm leading-relaxed mb-4 line-clamp-3">
                            {{ $article->excerpt ?? Str::limit($article->isi, 100) }}
                        </p>

                        <a href="{{ $article->id ? route('berita.show', $article->id) : '#' }}" class="text-primary-green hover:text-dark-green font-medium text-sm flex items-center space-x-1 transition-colors duration-200">
                            <span>Baca Selengkapnya</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>
                        </a>
        </div>
                </article>
            @empty
                <div class="text-center py-12 col-span-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-16 w-16 text-soft-gray mx-auto mb-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>
                    <h3 class="text-xl font-semibold text-primary-green mb-2">
                        Belum ada berita ditemukan.
                    </h3>
                    <p class="text-primary-green">
                        Silakan tambahkan artikel berita melalui panel admin.
                    </p>
        </div>
            @endforelse
</div>

        {{-- Mobile View All Button --}}
        <div class="text-center md:hidden animate-fade-in">
            <a 
                href="/berita"
                class="btn-primary flex items-center space-x-2 mx-auto"
            >
                <span>Lihat Semua Berita</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection 