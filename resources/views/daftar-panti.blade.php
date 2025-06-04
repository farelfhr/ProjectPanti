@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-16 px-4">
    <div class="py-8 mx-auto flex flex-col gap-4 text-center">
        <h1 class="text-4xl lg:text-5xl font-bold">Daftar Panti Asuhan di Malang</h1>
        <p class="text-lg text-gray-700 max-w-2xl mx-auto">Temukan panti asuhan yang membutuhkan bantuan dan berikan kontribusi Anda.</p>
    </div>

    {{-- Search and Filter Section --}}
    <div class="mt-8 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Temukan Panti</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <input type="text" placeholder="Cari nama panti atau kata kunci" class="px-4 py-2 border rounded-md">
            <select class="px-4 py-2 border rounded-md">
                <option value="">Semua Lokasi</option>
                {{-- Options will be populated dynamically --}}
            </select>
            <select class="px-4 py-2 border rounded-md">
                <option value="">Semua Jenis Panti</option>
                {{-- Options will be populated dynamically --}}
            </select>
            <select class="px-4 py-2 border rounded-md">
                <option value="">Semua Kapasitas</option>
                {{-- Options will be populated dynamically --}}
            </select>
        </div>
        <div class="mt-4 flex items-center">
            <input type="checkbox" id="urgent-needs" class="mr-2">
            <label for="urgent-needs" class="text-gray-700">Tampilkan hanya dengan kebutuhan mendesak</label>
        </div>
         <div class="mt-6 text-center">
            <button class="px-6 py-3 bg-[#E9762B] text-white font-bold rounded-md hover:bg-[#d06426] transition-colors duration-300">Cari dan Filter</button>
        </div>
    </div>

    {{-- Orphanage List Section (Grid/List View) --}}
    <div class="mt-12">
        <div class="flex justify-center gap-4 mb-8">
            <button class="px-6 py-2 bg-[#E9762B] text-white font-bold rounded-md hover:bg-[#d06426] transition-colors duration-300" id="grid-view-btn">Tampilan Grid</button>
            <button class="px-6 py-2 bg-gray-300 text-gray-700 font-bold rounded-md hover:bg-gray-400 transition-colors duration-300" id="list-view-btn">Tampilan List</button>
        </div>

        <div id="orphanage-list-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
            {{-- Orphanage Cards will be populated here dynamically --}}
            {{-- Example Card (will be repeated/looped through data) --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="w-full h-48 bg-gray-300 flex items-center justify-center text-gray-500">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0L22.75 15.75m-19.5 3 15-15A2.25 2.25 0 0 0 21 6.75h.002.002M5.25 7.5Ab6.75 6.75 0 0 1 12 1.5a6.75 6.75 0 0 1 6.75 6.75v.75m-15 3l7.5-7.5m-7.5 7.5H9L5.25 12A2.25 2.25 0 0 0 3 9.75v-1.5m18 0l-7.5 7.5m7.5-7.5V9.75A2.25 2.25 0 0 0 18.75 7.5h-1.5m-7.5 6h.008v.008h-.008v-.008Z" />
                    </svg>
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Nama Panti Asuhan</h3>
                    <p class="text-gray-700 text-sm mb-2">Lokasi Singkat</p>
                    <p class="text-gray-700 text-sm mb-2">Jumlah Penghuni: XX</p>
                    {{-- Urgent Need Status (highlighted) --}}
                    <div class="bg-red-500 text-white text-center px-2 py-1 rounded-md mb-4">Kebutuhan Mendesak!</div>
                    <a href="#" class="block w-full text-center px-4 py-2 bg-[#41644A] text-white font-bold rounded-md hover:bg-[#35523c] transition-colors duration-300">Lihat Detail</a>
                </div>
            </div>
            {{-- End Example Card --}}
        </div>
         {{-- The list view structure will be handled by JavaScript toggling classes --}}
    </div>

    {{-- Detail Page Placeholder --}}
    {{-- The detail page will likely be a separate route/page --}}

    {{-- Donation Process Section - Placeholder --}}
    <div class="max-w-3xl mx-auto py-16 px-4">
        <div class="py-8 mx-auto flex flex-col gap-4 text-center">
            <h1 class="text-4xl lg:text-5xl font-bold">Alur Sumbangan</h1>
            <p class="text-lg text-gray-700">Panduan jelas mengenai penyaluran bantuan.</p>
        </div>
         {{-- Donation steps will go here --}}
        <div class="mt-8 text-left text-gray-700">
            <p class="mb-4">Website ini berfungsi sebagai media informasi untuk menghubungkan Anda dengan panti sosial yang membutuhkan. Penyaluran bantuan dilakukan secara <strong>langsung</strong> dari donatur kepada panti yang dituju. Berikut adalah panduan langkah-langkahnya:</p>
            <ol class="list-decimal list-inside flex flex-col gap-2">
                <li>Temukan panti asuhan yang ingin Anda bantu melalui daftar atau fitur pencarian di atas.</li>
                <li>Klik tombol "Lihat Detail" pada kartu panti untuk melihat informasi lengkap kontak panti dan jenis bantuan yang dibutuhkan.</li>
                <li>Hubungi pihak panti secara langsung melalui kontak yang tertera (telepon, email, atau media sosial).</li>
                <li>Diskusikan jenis bantuan yang ingin Anda berikan dan waktu penyaluran yang disepakati bersama pihak panti.</li>
                <li>Salurkan bantuan Anda langsung kepada panti asuhan tersebut.</li>
            </ol>
            <p class="mt-4">Kami menekankan bahwa website ini <strong>tidak menerima atau mengumpulkan donasi dalam bentuk uang atau barang</strong>. Semua proses penyaluran bantuan sepenuhnya menjadi kesepakatan antara donatur dan panti asuhan.</p>
            

    {{-- Impact and Success Stories - Placeholder --}}
     <div class="max-w-3xl mx-auto py-16 px-4">
        <div class="py-8 mx-auto flex flex-col gap-4 text-center">
            <h1 class="text-4xl lg:text-5xl font-bold">Dampak & Cerita Sukses</h1>
            <p class="text-lg text-gray-700">Bagaimana bantuan Anda membuat perbedaan.</p>
        </div>
         {{-- Stories will go here --}}
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8 text-gray-700">
            {{-- Example Story (will be repeated/looped through data) --}}
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">Cerita Sukses 1</h3>
                <p class="mb-4">Narasi singkat tentang bagaimana bantuan telah memberikan dampak positif pada panti ini.</p>
                <p class="text-sm font-bold text-[#E9762B]">Panti Asuhan [Nama Panti]</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">Cerita Sukses 2</h3>
                <p class="mb-4">Narasi singkat lain tentang dampak positif dari bantuan yang diberikan.</p>
                <p class="text-sm font-bold text-[#E9762B]">Panti Asuhan [Nama Panti]</p>
            </div>
            {{-- End Example Story --}}
        </div>
    </div>

</div>

@endsection 