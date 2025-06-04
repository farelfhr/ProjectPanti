@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-16 px-4">
    <div class="flex flex-col lg:flex-row gap-8">
        {{-- Image/Video Gallery --}}
        <div class="lg:w-1/2">
            <div class="bg-gray-300 aspect-video w-full flex items-center justify-center rounded-lg">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-24 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0L22.75 15.75m-19.5 3 15-15A2.25 2.25 0 0 0 21 6.75h.002.002M5.25 7.5Ab6.75 6.75 0 0 1 12 1.5a6.75 6.75 0 0 1 6.75 6.75v.75m-15 3l7.5-7.5m-7.5 7.5H9L5.25 12A2.25 2.25 0 0 0 3 9.75v-1.5m18 0l-7.5 7.5m7.5-7.5V9.75A2.25 2.25 0 0 0 18.75 7.5h-1.5m-7.5 6h.008v.008h-.008v-.008Z" />
                </svg>
            </div>
            {{-- Additional images/thumbnails would go here --}}
        </div>

        {{-- Orphanage Details --}}
        <div class="lg:w-1/2 flex flex-col gap-4">
            <h1 class="text-4xl lg:text-5xl font-bold">Nama Panti Asuhan Lengkap</h1>
            
            {{-- Description --}}
            <div>
                <h2 class="text-2xl font-bold mb-2">Tentang Kami</h2>
                <p class="text-gray-700">Deskripsi lengkap panti, termasuk sejarah, fokus, dan kegiatan sehari-hari.</p>
            </div>

            {{-- Detailed Information --}}
            <div>
                <h2 class="text-2xl font-bold mb-2">Informasi Detail</h2>
                <p class="text-gray-700"><strong>Alamat Lengkap:</strong> [Alamat Lengkap Panti]</p>
                <p class="text-gray-700"><strong>Nomor Telepon/Kontak:</strong> [Nomor Telepon/Kontak Panti]</p>
                <p class="text-gray-700"><strong>Email:</strong> [Email Panti]</p>
                <p class="text-gray-700"><strong>Media Sosial:</strong> <a href="#" class="text-[#E9762B] hover:underline">[Link Media Sosial Panti]</a></p>
                <p class="text-gray-700"><strong>Kapasitas/Jumlah Penghuni:</strong> [Jumlah Penghuni/Kapasitas]</p>
                <p class="text-gray-700"><strong>Jenis Bantuan yang Dibutuhkan:</strong> [Daftar jenis bantuan]</p>
            </div>

            {{-- Urgent Need Status (optional, maybe repeated from list) --}}
            <div class="bg-red-500 text-white text-center px-4 py-2 rounded-md font-bold mt-4">Kebutuhan Mendesak!</div>

            {{-- Call to Action (e.g., Button to Contact) --}}
             <a href="#" class="block w-full text-center px-6 py-3 bg-[#E9762B] text-white font-bold rounded-md hover:bg-[#d06426] transition-colors duration-300 mt-4">Hubungi Panti</a>
        </div>
    </div>

    {{-- Interactive Map --}}
    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-4 text-center">Lokasi Panti</h2>
        <div class="bg-gray-300 aspect-video w-full rounded-lg flex items-center justify-center text-gray-500">
             {{-- Google Maps Embed Placeholder --}}
             Peta Lokasi (Google Maps Embed)
        </div>
    </div>

    {{-- Donation Process Section --}}
    <div class="max-w-3xl mx-auto py-16 px-4">
        <div class="py-8 mx-auto flex flex-col gap-4 text-center">
            <h1 class="text-4xl lg:text-5xl font-bold">Alur Sumbangan untuk Panti Ini</h1>
            <p class="text-lg text-gray-700">Panduan jelas mengenai penyaluran bantuan langsung ke [Nama Panti Asuhan].</p>
        </div>
         <div class="mt-8 text-left text-gray-700">
            <p class="mb-4">Sebagai pengingat, website ini adalah media informasi. Untuk memberikan bantuan ke [Nama Panti Asuhan], silakan ikuti langkah-langkah berikut:</p>
            <ol class="list-decimal list-inside flex flex-col gap-2">
                <li>Lihat kembali informasi kontak panti di bagian atas halaman ini.</li>
                <li>Hubungi pihak panti secara langsung melalui telepon, email, atau media sosial yang tertera.</li>
                <li>Diskusikan jenis bantuan (uang, barang, tenaga) yang ingin Anda berikan dan sepakati waktu serta cara penyalurannya dengan pihak panti.</li>
                <li>Salurkan bantuan Anda langsung kepada Panti Asuhan [Nama Panti Asuhan].</li>
            </ol>
            <p class="mt-4">Untuk memudahkan komunikasi awal, Anda bisa menggunakan template pesan yang kami sediakan di halaman <a href="#" class="text-[#E9762B] hover:underline">Daftar Panti</a>.</p>
        </div>
    </div>

    {{-- Impact and Success Stories --}}
     <div class="max-w-3xl mx-auto py-16 px-4">
        <div class="py-8 mx-auto flex flex-col gap-4 text-center">
            <h1 class="text-4xl lg:text-5xl font-bold">Dampak & Cerita Sukses di [Nama Panti Asuhan]</h1>
            <p class="text-lg text-gray-700">Baca cerita inspiratif tentang bagaimana bantuan telah membawa perubahan positif.</p>
        </div>
         <div class="mt-8 grid grid-cols-1 gap-8 text-gray-700">
            {{-- Example Story (will be repeated/looped through data) --}}
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">Cerita Sukses [Nomor Cerita]</h3>
                <p class="mb-4">Narasi lengkap tentang dampak spesifik dari bantuan yang diterima oleh panti ini.</p>
                {{-- Maybe add images or quotes here --}}
            </div>
            {{-- End Example Story --}}
        </div>
    </div>

</div>

@endsection 