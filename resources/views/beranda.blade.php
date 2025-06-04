@extends('layouts.app')

@section('content')
<div class="relative max-h-screen max-w-full mx-auto -my-32">
    <img class="w-full max-h-screen object-cover" src="/images/PantiStock/panti-asuhan.jpg" alt="Bersama Membangun Kebaikan">
    <div class="absolute inset-0 bg-gradient-to-tr from-[#151e17] to-transparent">
        <div class="flex flex-col gap-8 max-w-7xl mx-auto pt-[240px] py-48 px-4">
            <h1 class="text-4xl lg:text-6xl text-left text-white font-bold">Bersama Membangun <br>Kebaikan untuk Panti Sosial</h1>
            <p class="text-lg text-left text-white max-w-md">Kami hadir untuk menghubungkan Anda dengan panti sosial di Malang yang membutuhkan dukungan. Mari berkontribusi dan jadikan dunia lebih baik bersama-sama.</p>
            <div class="flex gap-4">
                <a href="#" class="px-6 py-3 bg-[#E9762B] text-white font-bold rounded-md hover:bg-[#d06426] transition-colors duration-300">Temukan</a>
                <a href="#" class="px-6 py-3 border border-white text-white font-bold rounded-md hover:bg-white hover:text-[#151e17] transition-colors duration-300">Dukung</a>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl min-h-screen mx-auto py-56 px-4">
    <div class="py-8 mx-auto flex flex-col gap-4">
        <p class="text-lg text-center">Bersama</p>
        <h1 class="text-4xl lg:text-5xl text-center font-bold">Panti yang Membutuhkan <br>Bantuan Mendesak</h1>
        <p class="text-lg text-center max-w-2xl mx-auto">Kami mengajak Anda untuk membantu panti-panti yang membutuhkan. Setiap kontribusi Anda dapat membuat perbedaan yang signifikan.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-16">
        <div class="flex flex-col gap-8">
            <div class="flex flex-col gap-4">
                <h2 class="text-2xl font-bold">Spotlight Panti</h2>
                <p class="text-gray-700">Dukung panti panti ini agar dapat terus memberikan pelayanan terbaik.</p>
                <div class="flex gap-4">
                    <a href="#" class="px-6 py-3 border border-[#151e17] text-[#151e17] font-bold rounded-md hover:bg-[#151e17] hover:text-white transition-colors duration-300">Dukung</a>
                    <a href="#" class="flex items-center gap-1 text-[#E9762B] hover:underline">Selengkapnya <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></a>
                </div>
            </div>

            <div class="flex flex-col gap-4">
                <h2 class="text-2xl font-bold">Bantuan Mendesak</h2>
                <p class="text-gray-700">Setiap donasi Anda sangat berarti bagi mereka yang membutuhkan.</p>
                <div class="flex gap-4">
                     <a href="#" class="px-6 py-3 bg-[#E9762B] text-white font-bold rounded-md hover:bg-[#d06426] transition-colors duration-300">Dukung</a>
                     <a href="#" class="flex items-center gap-1 text-[#E9762B] hover:underline">Selengkapnya <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></a>
                </div>
            </div>
        </div>

        <div class="bg-gray-300 aspect-video w-full flex items-center justify-center rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-24 text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0L22.75 15.75m-19.5 3 15-15A2.25 2.25 0 0 0 21 6.75h.002.002M5.25 7.5Ab6.75 6.75 0 0 1 12 1.5a6.75 6.75 0 0 1 6.75 6.75v.75m-15 3l7.5-7.5m-7.5 7.5H9L5.25 12A2.25 2.25 0 0 0 3 9.75v-1.5m18 0l-7.5 7.5m7.5-7.5V9.75A2.25 2.25 0 0 0 18.75 7.5h-1.5m-7.5 6h.008v.008h-.008v-.008Z" />
              </svg>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto pb-32 px-4">
    <div class="py-8 mx-auto flex flex-col gap-4">
        <h1 class="text-4xl lg:text-5xl text-center font-bold">Bergabunglah dalam Misi Kebaikan <br>untuk Panti Sosial di Malang</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="flex flex-col items-center text-center gap-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16 text-[#E9762B]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0-3.75 3.75M21 3v3.75" />
            </svg>
            <h2 class="text-xl font-bold">Cara Anda Dapat Membantu Panti Sosial di Sekitar Anda</h2>
            <p class="text-gray-700">Setiap tindakan kecil Anda dapat memberikan dampak besar bagi panti sosial.</p>
            <a href="#" class="flex items-center gap-1 text-[#E9762B] hover:underline">Cari <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></a>
        </div>

        <div class="flex flex-col items-center text-center gap-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16 text-[#E9762B]">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 14.25-2.25 2.25L19.5 19.5m-15-6.75L5.25 16.5m4.5-4.5 2.25 2.25L12 17.25m-8.25-6.75h16.5a.75.75 0 0 1 .75.75v8.25a.75.75 0 0 1-.75.75H3.75a.75.75 0 0 1-.75-.75v-8.25a.75.75 0 0 1 .75-.75Z" />
            </svg>
            <h2 class="text-xl font-bold">Pahami Kebutuhan Panti Sosial untuk Memberikan Bantuan yang Tepat</h2>
            <p class="text-gray-700">Ketahui apa yang dibutuhkan panti sosial dan bantu mereka dengan cara yang efektif.</p>
            <a href="#" class="flex items-center gap-1 text-[#E9762B] hover:underline">Pahami <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></a>
        </div>

        <div class="flex flex-col items-center text-center gap-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16 text-[#E9762B]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15-.75 60.07 60.07 0 0 0 3-7.5 60.07 60.07 0 0 0-3-7.5 60.07 60.07 0 0 1-15-.75m.75 12 .75-2.25m0-9.75 1.5 3m-1.5 3.75.75 1.5m-.75 1.5 1.5 1.5m-.75 3-.75 2.25m0-16.5.75 2.25m0 9.75-1.5-3m1.5 3.75-.75-1.5m.75-1.5-1.5-1.5m.75-3.L6 3m.75 15 7.5-7.5" />
            </svg>
            <h2 class="text-xl font-bold">Salurkan Bantuan Anda Melalui Berbagai Program yang Tersedia</h2>
            <p class="text-gray-700">Bantu panti sosial dengan menyumbangkan barang atau dana sesuai kebutuhan.</p>
            <a href="#" class="flex items-center gap-1 text-[#E9762B] hover:underline">Bantu <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></a>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto py-16 px-4">
    <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-16">
        <div class="bg-gray-300 aspect-video w-full flex items-center justify-center rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-24 text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0L22.75 15.75m-19.5 3 15-15A2.25 2.25 0 0 0 21 6.75h.002.002M5.25 7.5Ab6.75 6.75 0 0 1 12 1.5a6.75 6.75 0 0 1 6.75 6.75v.75m-15 3l7.5-7.5m-7.5 7.5H9L5.25 12A2.25 2.25 0 0 0 3 9.75v-1.5m18 0l-7.5 7.5m7.5-7.5V9.75A2.25 2.25 0 0 0 18.75 7.5h-1.5m-7.5 6h.008v.008h-.008v-.008Z" />
            </svg>
        </div>

        <div class="flex flex-col gap-4">
            <h1 class="text-4xl lg:text-5xl font-bold">Dampak Positif dari Bantuan <br>Anda untuk Panti Sosial di Malang</h1>
            <p class="text-lg text-gray-700">Setiap kontribusi Anda berperan penting dalam meningkatkan kehidupan anak-anak di panti. Mari kita lihat statistik yang menunjukkan dampak nyata dari bantuan yang telah diberikan.</p>
            <div class="flex gap-8 mt-4">
                <div class="flex flex-col">
                    <span class="text-4xl font-bold text-[#E9762B]">75%</span>
                    <span class="text-gray-700">Panti terdaftar yang menerima bantuan dari kami.</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-4xl font-bold text-[#E9762B]">120</span>
                    <span class="text-gray-700">Donatur yang telah berkontribusi untuk panti sosial.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto py-16 px-4">
    <div class="py-8 mx-auto flex flex-col gap-4">
        <h1 class="text-4xl lg:text-5xl text-center font-bold">Apa Kata Mereka Tentang Kami?</h1>
        <p class="text-lg text-center max-w-2xl mx-auto">Dengarkan pengalaman mereka yang telah merasakan dampak positif dari program kami.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="bg-gray-100 p-6 rounded-lg shadow-md flex flex-col gap-4">
            <p class="text-gray-700">"Sangat mudah untuk menemukan panti yang membutuhkan bantuan dan proses donasinya sangat transparan. Saya merasa kontribusi saya benar-benar sampai kepada yang berhak."</p>
            <div class="flex items-center gap-4">
                <div class="bg-gray-300 size-12 rounded-full flex items-center justify-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-bold">Nama Donatur 1</span>
                    <span class="text-sm text-gray-600">Lokasi</span>
                </div>
            </div>
        </div>
        <div class="bg-gray-100 p-6 rounded-lg shadow-md flex flex-col gap-4">
            <p class="text-gray-700">"Platform ini membantu saya untuk terhubung langsung dengan panti yang saya ingin dukung. Informasi yang diberikan sangat detail dan terpercaya."</p>
            <div class="flex items-center gap-4">
                 <div class="bg-gray-300 size-12 rounded-full flex items-center justify-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.75 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-bold">Nama Donatur 2</span>
                    <span class="text-sm text-gray-600">Lokasi</span>
                </div>
            </div>
        </div>
        <div class="bg-gray-100 p-6 rounded-lg shadow-md flex flex-col gap-4">
            <p class="text-gray-700">"Saya sangat terinspirasi melihat bagaimana bantuan kecil saya bisa memberikan senyuman di wajah anak-anak panti. Terima kasih telah memfasilitasi ini."</p>
            <div class="flex items-center gap-4">
                 <div class="bg-gray-300 size-12 rounded-full flex items-center justify-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.75 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-bold">Nama Donatur 3</span>
                    <span class="text-sm text-gray-600">Lokasi</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-[#41644A] text-white py-16 px-4">
    <div class="max-w-7xl mx-auto flex flex-col items-center text-center gap-8">
        <h1 class="text-4xl lg:text-5xl font-bold">Bergabunglah untuk Membantu Panti</h1>
        <p class="text-lg max-w-2xl">Bersama-sama, kita bisa menciptakan perubahan positif dalam kehidupan anak-anak di panti sosial. Bergabunglah dengan komunitas kami dan berikan kontribusi terbaik Anda.</p>
        <div class="flex gap-4">
            <a href="#" class="px-6 py-3 bg-[#E9762B] text-white font-bold rounded-md hover:bg-[#d06426] transition-colors duration-300">Gabung Sekarang</a>
            <a href="#" class="px-6 py-3 border border-white text-white font-bold rounded-md hover:bg-white hover:text-[#151e17] transition-colors duration-300">Pelajari Lebih Lanjut</a>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto py-16 px-4">
    <div class="py-8 mx-auto flex flex-col gap-4">
        <h1 class="text-4xl lg:text-5xl text-center font-bold">Artikel Terbaru Kami</h1>
        <p class="text-lg text-center max-w-2xl mx-auto">Temukan berita terbaru, cerita inspiratif, dan informasi penting seputar dunia panti sosial.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="flex flex-col gap-4">
            <div class="bg-gray-300 aspect-video w-full flex items-center justify-center rounded-lg">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0L22.75 15.75m-19.5 3 15-15A2.25 2.25 0 0 0 21 6.75h.002.002M5.25 7.5Ab6.75 6.75 0 0 1 12 1.5a6.75 6.75 0 0 1 6.75 6.75v.75m-15 3l7.5-7.5m-7.5 7.5H9L5.25 12A2.25 2.25 0 0 0 3 9.75v-1.5m18 0l-7.5 7.5m7.5-7.5V9.75A2.25 2.25 0 0 0 18.75 7.5h-1.5m-7.5 6h.008v.008h-.008v-.008Z" />
                </svg>
            </div>
            <h2 class="text-xl font-bold">Judul Artikel 1</h2>
            <p class="text-gray-700 text-sm">Tanggal Publikasi</p>
            <p class="text-gray-700">Deskripsi singkat artikel pertama.</p>
            <a href="#" class="flex items-center gap-1 text-[#E9762B] hover:underline">Baca Selengkapnya <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></a>
        </div>
         <div class="flex flex-col gap-4">
            <div class="bg-gray-300 aspect-video w-full flex items-center justify-center rounded-lg">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0L22.75 15.75m-19.5 3 15-15A2.25 2.25 0 0 0 21 6.75h.002.002M5.25 7.5Ab6.75 6.75 0 0 1 12 1.5a6.75 6.75 0 0 1 6.75 6.75v.75m-15 3l7.5-7.5m-7.5 7.5H9L5.25 12A2.25 2.25 0 0 0 3 9.75v-1.5m18 0l-7.5 7.5m7.5-7.5V9.75A2.25 2.25 0 0 0 18.75 7.5h-1.5m-7.5 6h.008v.008h-.008v-.008Z" />
                </svg>
            </div>
            <h2 class="text-xl font-bold">Judul Artikel 2</h2>
            <p class="text-gray-700 text-sm">Tanggal Publikasi</p>
            <p class="text-gray-700">Deskripsi singkat artikel kedua.</p>
            <a href="#" class="flex items-center gap-1 text-[#E9762B] hover:underline">Baca Selengkapnya <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></a>
        </div>
         <div class="flex flex-col gap-4">
            <div class="bg-gray-300 aspect-video w-full flex items-center justify-center rounded-lg">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0L22.75 15.75m-19.5 3 15-15A2.25 2.25 0 0 0 21 6.75h.002.002M5.25 7.5Ab6.75 6.75 0 0 1 12 1.5a6.75 6.75 0 0 1 6.75 6.75v.75m-15 3l7.5-7.5m-7.5 7.5H9L5.25 12A2.25 2.25 0 0 0 3 9.75v-1.5m18 0l-7.5 7.5m7.5-7.5V9.75A2.25 2.25 0 0 0 18.75 7.5h-1.5m-7.5 6h.008v.008h-.008v-.008Z" />
                </svg>
            </div>
            <h2 class="text-xl font-bold">Judul Artikel 3</h2>
            <p class="text-gray-700 text-sm">Tanggal Publikasi</p>
            <p class="text-gray-700">Deskripsi singkat artikel ketiga.</p>
            <a href="#" class="flex items-center gap-1 text-[#E9762B] hover:underline">Baca Selengkapnya <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg></a>
        </div>
    </div>
</div>

<div class="bg-[#41644A] py-16 px-4">
    <div class="max-w-xl mx-auto text-center flex flex-col gap-8">
        <h1 class="text-4xl lg:text-5xl font-bold text-lg text-[white]">Dapatkan Berita Terbaru Kami</h1>
        <p class="text-lg text-[white]">Jangan lewatkan informasi terbaru seputar program, acara, dan cerita inspiratif dari panti sosial. Daftarkan email Anda sekarang!</p>
        <div class="flex flex-col md:flex-row gap-4">
            <input type="email" placeholder="Masukkan email Anda" class="px-4 py-3 rounded-md w-full">
            <button class="px-6 py-3 bg-[#E9762B] text-white font-bold rounded-md hover:bg-[#d06426] transition-colors duration-300">Daftar</button>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto py-16 px-4">
    <div class="py-8 mx-auto flex flex-col gap-4 text-center">
        <h1 class="text-4xl lg:text-5xl font-bold">Layanan Terbaik untuk Mendukung Panti Sosial di Kota Malang</h1>
        <p class="text-lg text-gray-700 max-w-2xl mx-auto">Kami menyediakan berbagai layanan untuk memudahkan Anda dalam memberikan bantuan kepada panti sosial.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
        <div class="flex flex-col items-center text-center gap-4 p-6 bg-white rounded-lg shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16 text-[#E9762B]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.5v7.5m0 0 3-3m-3 3-3-3M21 12a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 12v3a1.5 1.5 0 0 0 1.5 1.5h16.5a1.5 1.5 0 0 0 1.5-1.5v-3Z" />
            </svg>
            <h2 class="text-xl font-bold">Donasi Mudah dan Aman</h2>
            <p class="text-gray-700">Salurkan donasi Anda dengan cepat dan aman melalui platform kami.</p>
        </div>
         <div class="flex flex-col items-center text-center gap-4 p-6 bg-white rounded-lg shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16 text-[#E9762B]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25H21M7.5 12H3m3 8.25H3M3 12l-.621 2.49a4.5 4.5 0 0 0 3.445 5.54l.621 1.5ZM21 12l.621 2.49a4.5 4.5 0 0 1-3.445 5.54L18 20.25" />
            </svg>
            <h2 class="text-xl font-bold">Program Kemitraan</h2>
            <p class="text-gray-700">Jalin kerja sama jangka panjang untuk dampak yang berkelanjutan.</p>
        </div>
         <div class="flex flex-col items-center text-center gap-4 p-6 bg-white rounded-lg shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16 text-[#E9762B]">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25H21M7.5 12H3m3 8.25H3M3 12l-.621 2.49a4.5 4.5 0 0 0 3.445 5.54l.621 1.5ZM21 12l.621 2.49a4.5 4.5 0 0 1-3.445 5.54L18 20.25" />
            </svg>
            <h2 class="text-xl font-bold">Transparansi Laporan</h2>
            <p class="text-gray-700">Akses laporan penggunaan donasi secara transparan.</p>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto py-16 px-4">
    <div class="py-8 mx-auto flex flex-col gap-4 text-center">
        <h1 class="text-4xl lg:text-5xl font-bold">Hubungi Kami</h1>
        <p class="text-lg text-gray-700 max-w-2xl mx-auto">Kami siap menjawab pertanyaan Anda dan membantu Anda terhubung dengan panti sosial. Jangan ragu untuk menghubungi kami.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
        <div class="flex flex-col gap-4">
            <div class="flex items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-[#E9762B]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l3 3m0 0-3 3m0-3H9m12-3a2.25 2.25 0 0 0-2.25-2.25H15M21 12a2.25 2.25 0 0 1-2.25 2.25H15m0 3a2.25 2.25 0 0 0 2.25 2.25H21" />
                </svg>
                <span class="text-lg text-gray-700">Email: info@pantipeduli.com</span>
            </div>
            <div class="flex items-center gap-4">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-[#E9762B]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.18.448l-.513.687a1.875 1.875 0 0 1-2.424 0l-.645-.964a1.125 1.125 0 0 0-1.079-.45 18.797 18.797 0 0 1-7.02-7.02 1.125 1.125 0 0 0-.45-1.079l-.964-.645a1.875 1.875 0 0 1 0-2.424l.687-.513c.393-.278.558-.74.448-1.18L3.652 3.59A1.125 1.125 0 0 0 2.56 3H2.25a2.25 2.25 0 0 0-2.25 2.25v2.25Z" />
                </svg>
                <span class="text-lg text-gray-700">Telepon: (0341) 123-456</span>
            </div>
             <div class="flex items-center gap-4">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-[#E9762B]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                <span class="text-lg text-gray-700">Alamat: Jl. Raya Malang No. 123, Malang</span>
            </div>
        </div>
        <div class="flex flex-col gap-4">
            <input type="text" placeholder="Nama Anda" class="px-4 py-3 rounded-md">
            <input type="email" placeholder="Email Anda" class="px-4 py-3 rounded-md">
            <textarea placeholder="Pesan Anda" rows="4" class="px-4 py-3 rounded-md"></textarea>
            <button class="px-6 py-3 bg-[#E9762B] text-white font-bold rounded-md hover:bg-[#d06426] transition-colors duration-300">Kirim Pesan</button>
        </div>
    </div>
</div>

@endsection 