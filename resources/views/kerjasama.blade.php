@extends('layouts.app')
@section('content')
<div class="relative w-full min-h-[60vh] sm:min-h-[70vh] lg:h-[95vh] max-w-full mx-auto -my-32">
  <img
    class="w-full h-full min-h-[60vh] sm:min-h-[70vh] lg:h-[95vh] object-cover"
    src="/images/PantiStock/panti-asuhan.jpg"
    alt="Kerja Sama Kami"
    loading="lazy"
  />
  <div class="absolute inset-0 bg-gradient-to-tr from-[#151e17]/80 to-transparent flex items-center justify-center">
    <div class="flex flex-col gap-6 sm:gap-8 lg:gap-12 max-w-6xl mx-auto px-4 sm:px-6 py-16 sm:py-20 lg:py-24 text-left lg:text-center">
      <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">
        Wujudkan <span class="text-[#E9762B]">Harapan</span> Bersama Anak-Anak Panti Asuhan Malang
      </h1>
      <div class="lg:mx-auto w-fit">
        <a
          href="/kerjasama#jenis-kerja-sama"
          class="inline-block text-base sm:text-lg lg:text-xl font-semibold text-white bg-[#6da67b]/70 hover:bg-[#6da67b]/90 border-2 border-[#41644A] rounded-full px-6 py-2 sm:px-8 sm:py-3 transition-colors duration-300"
        >
          Pelajari Lebih Lanjut
        </a>
      </div>
    </div>
  </div>
</div>

<div id="jenis-kerja-sama" class="max-w-7xl min-h-screen mx-auto px-6 py-24 mt-32">
    <div class="pb-16 mx-auto flex flex-col gap-6">
        <h1 class="text-4xl lg:text-5xl text-left lg:text-center font-bold">Wujudkan Harapan Bersama Anak-Anak Panti Malang</h1>
        <p class="text-xl lg:text-2xl text-left lg:text-center">Pelajari Cara dan Jenis Kolaborasi Bersama Kami</p>
    </div>

    <div class="max-w-4xl mx-auto grid lg:grid-cols-2 items-center gap-6">
        <div class="bg-white p-6 rounded-lg border shadow-lg">
            <div class="flex flex-col gap-4 text-center">
                <h1 class="text-2xl font-bold">Komunitas</h1>
                <p class="text-lg text-gray-700">Adakan kegiatan seru seperti pelatihan atau acara amal bersama anak-anak panti.</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg border shadow-lg">
            <div class="flex flex-col gap-4 text-center">
                <h1 class="text-2xl font-bold">Perusahaan</h1>
                <p class="text-lg text-gray-700">Dukung melalui program CSR, donasi, atau sponsor untuk pendidikan anak.</p>
            </div>
        </div>
            
        <div class="bg-white p-6 rounded-lg border shadow-lg">
            <div class="flex flex-col gap-4 text-center">
                <h1 class="text-2xl font-bold">Pemerintah</h1>
                <p class="text-lg text-gray-700">Berkolaborasi dalam program pemberdayaan atau dukungan kebijakan.</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg border shadow-lg">
            <div class="flex flex-col gap-4 text-center">
                <h1 class="text-2xl font-bold">Individu</h1>
                <p class="text-lg text-gray-700">Berkolaborasi dalam program pemberdayaan atau dukungan kebijakan.</p>
            </div>
        </div>
    </div>
</div>

<div class="max-w-6xl mx-auto min-h-screen py-8 px-6">
    <h1 class="text-4xl lg:text-6xl text-left lg:text-center font-bold mb-4 lg:mb-16">Jadwal Kegiatan</h1>

    <p class="text-xl font-bold mb-2 mt-8">Rabu, 11 Juni 2025</p>
    <div class="bg-[#f1f0e9] border rounded-lg shadow-md p-4 mb-4 cursor-pointer hover:bg-white hover:shadow-xl transition-all duration-300 event-card" data-modal="modal1">
        <div class="flex flex-col gap-2">
            <h2 class="text-xl font-semibold">Pengabdian Masyarakat</h2>
            <div class="flex items-center gap-4 text-gray-900">
                <span>Pembicara: <span class="text-[#E9762B]">Ferdi Dwana</span></span>
                <span class="text-gray-900">•</span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    Gedung B11
                </span>
            </div>

            <div class="flex gap-2 items-center text-sm my-2 text-gray-700 py-1 px-2 bg-gray-300 rounded-full w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>09:00 - 10:30</span>
            </div>

            <p class="text-gray-600 leading-relaxed">
               Penyelenggaran Bantuan Sembako oleh Pihak Universitas Negeri Malang
            </p>
        </div>
    </div>

    <div id="modal1" class="modal fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 backdrop-blur-sm animate-fade-in">
        <div class="bg-white rounded-2xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-hidden shadow-2xl animate-scale-in">
            <div class="relative">
                <button class="absolute top-4 right-4 z-10 p-2 bg-white bg-opacity-90 rounded-full hover:bg-opacity-100 transition-all duration-200 hover:scale-110" onclick="closeModal('modal1')">
                    <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                
                <div class="h-64 bg-gradient-to-br from-blue-600 to-blue-800 relative overflow-hidden">
                    <img src="/images/PantiStock/1.jpg" alt="Speaker" class="w-full h-full object-cover opacity-80">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>

                    <div class="absolute bottom-6 left-6 right-16">
                        <h2 class="text-2xl font-bold text-white mb-2">Pengadaan Sembako</h2>
                    </div>
                </div>
            </div>

            <div class="p-6 max-h-[calc(90vh-16rem)] overflow-y-auto">
                <div class="mb-6">
                    <div class="flex items-center gap-4 text-gray-900">
                        <span>Pembicara: <span class="text-[#E9762B]">Ferdi Dwana</span></span>
                        <span class="text-gray-900">•</span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            Gedung B11
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
                    <span class="text-gray-900">Rabu, 11 Juni 2025 09:00-10:30</span>
                </div>

                <p class="text-gray-900 leading-relaxed mb-6">
                    Oleh SMA Negeri 8 Kota Malang, diadakan sebagai insiatif untuk membawa siswa lebih peduli
                </p>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3"> Detail Agenda</h3>
                    <p>SMA Negeri 8 Kota Malang mengadakan Kegiatan Bantuan Sosial sebagai Bentuk Kepedulian</p>
                </div>

                <div class="border-t pt-6">
                    <h3 class="font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                        </svg>
                        Bagikan
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <button class="flex items-center justify-center gap-2 px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                        </svg>
                            <span class="font-medium">Salin Tautan</span>
                        </button>

                        <button class="flex items-center justify-center gap-2 px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <span class="font-medium">Undang Melalui Email</span>
                        </button>
                    </div>

                    <button class="w-full mt-3 flex items-center justify-center gap-2 px-4 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-200 font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                        Tambahkan Ke Kalender
                    </button>
                </div>
            </div>
        </div>
    </div>

    <p class="text-xl font-bold mb-2 mt-8">Kamis, 12 Juni 2025</p>
    <div class="bg-[#f1f0e9] border rounded-lg shadow-md p-4 mb-4 cursor-pointer hover:bg-white hover:shadow-xl transition-all duration-300 event-card" data-modal="modal2">
        <div class="flex flex-col gap-2">
            <h2 class="text-xl font-semibold">Pengadaan Bantuan Sosial</h2>
            <div class="flex items-center gap-4 text-gray-900">
                <span class="font-semibold">Pembicara: <span class="text-[#E9762B]">Reyhan Akbar</span></span>
                <span class="text-gray-900">•</span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    Gedung B11
                </span>
            </div>

            <div class="flex gap-2 items-center text-sm my-2 text-gray-900 py-1 px-2 bg-gray-300 rounded-full w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>09:00 - 10:30</span>
            </div>

            <p class="text-gray-900 leading-relaxed">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quod deleniti cumque. Consequuntur ullam quia enim placeat autem dignissimos voluptatem doloribus blanditiis necessitatibus! Repellendus veritatis reiciendis sunt molestias voluptatum neque!
            </p>
        </div>
    </div>

    <div id="modal2" class="modal fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 backdrop-blur-sm animate-fade-in">
        <div class="bg-white rounded-2xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-hidden shadow-2xl animate-scale-in">
            <div class="relative">
                <button class="absolute top-4 right-4 z-10 p-2 bg-white bg-opacity-90 rounded-full hover:bg-opacity-100 transition-all duration-200 hover:scale-110" onclick="closeModal('modal2')">
                    <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                
                <div class="h-64 bg-gradient-to-br from-blue-600 to-blue-800 relative overflow-hidden">
                    <img src="/images/PantiStock/2.jpg" alt="Speaker" class="w-full h-full object-cover opacity-80">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>

                    <div class="absolute bottom-6 left-6 right-16">
                        <h2 class="text-2xl font-bold text-white mb-2">Bantuan Pemerintah</h2>
                    </div>
                </div>
            </div>

            <div class="p-6 max-h-[calc(90vh-16rem)] overflow-y-auto">
                <div class="mb-6">
                    <div class="flex items-center gap-4 text-gray-900">
                        <span class="font-semibold">Pembicara: <span class="text-[#E9762B]">Reyhan Akbar</span></span>
                        <span class="text-gray-900">•</span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            Gedung B11
                        </span>
                    </div>
                </div>

                <div class="flex flex-col gap-2 text-gray-900 mb-6">
                    <div class="flex gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="font-bold">Senin, 03 Juni 2025</span>
                    </div>
                    <span>Kamis, 12 Juni 09:00 - 10:30</span>
                </div>

                <p class="text-gray-900 leading-relaxed mb-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, blanditiis voluptas perferendis est sint totam, quae alias cupiditate quisquam provident nobis expedita pariatur, facilis voluptates eaque necessitatibus unde harum ea?
                </p>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3"> Detail Agenda</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque facilis eveniet architecto earum officiis molestiae doloremque deleniti debitis mollitia animi ullam minima, ducimus unde natus aut, impedit asperiores sit a?</p>
                </div>

                <div class="border-t pt-6">
                    <h3 class="font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                        </svg>
                        Bagikan
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <button class="flex items-center justify-center gap-2 px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                        </svg>
                            <span class="font-medium">Salin Tautan</span>
                        </button>

                        <button class="flex items-center justify-center gap-2 px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <span class="font-medium">Undang Melalui Email</span>
                        </button>
                    </div>

                    <button class="w-full mt-3 flex items-center justify-center gap-2 px-4 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-200 font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                        Tambahkan Ke Kalender
                    </button>
                </div>
            </div>
        </div>
    </div>

    <p class="text-xl font-bold mb-2 mt-8">Jumat, 13 Juni 2025</p>
    <div class="bg-[#f1f0e9] border rounded-lg shadow-md p-4 mb-4 cursor-pointer hover:bg-white hover:shadow-xl transition-all duration-300 event-card" data-modal="modal3">
        <div class="flex flex-col gap-2">
            <h2 class="text-xl font-semibold">Judul Kegiatan</h2>
            <div class="flex items-center gap-4 text-gray-900">
                <span class="font-semibold">Pembicara: <span class="text-[#E9762B]">Farel Fathir</span></span>
                <span class="text-gray-900">•</span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    Gedung B11
                </span>
            </div>

            <div class="flex gap-2 items-center text-sm my-2 text-gray-900 py-1 px-2 bg-gray-300 rounded-full w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>09:00 - 10:30</span>
            </div>

            <p class="text-gray-900 leading-relaxed">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quod deleniti cumque. Consequuntur ullam quia enim placeat autem dignissimos voluptatem doloribus blanditiis necessitatibus! Repellendus veritatis reiciendis sunt molestias voluptatum neque!
            </p>
        </div>
    </div>

    <div id="modal3" class="modal fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 backdrop-blur-sm animate-fade-in">
        <div class="bg-white rounded-2xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-hidden shadow-2xl animate-scale-in">
            <div class="relative">
                <button class="absolute top-4 right-4 z-10 p-2 bg-white bg-opacity-90 rounded-full hover:bg-opacity-100 transition-all duration-200 hover:scale-110" onclick="closeModal('modal3')">
                    <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                
                <div class="h-64 bg-gradient-to-br from-blue-600 to-blue-800 relative overflow-hidden">
                    <img src="/images/PantiStock/3.jpg" alt="Speaker" class="w-full h-full object-cover opacity-80">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>

                    <div class="absolute bottom-6 left-6 right-16">
                        <h2 class="text-2xl font-bold text-white mb-2">Agenda Kementerian Kesehatan</h2>
                    </div>
                </div>
            </div>

            <div class="p-6 max-h-[calc(90vh-16rem)] overflow-y-auto">
                <div class="mb-6">
                    <div class="flex items-center gap-4 text-gray-900">
                        <span class="font-semibold">Pembicara: <span class="text-[#E9762B]">Farel Fathir</span></span>
                        <span class="text-gray-900">•</span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            Gedung B11
                        </span>
                    </div>
                </div>

                <div class="flex flex-col gap-2 text-gray-900 mb-6">
                    <div class="flex gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="font-bold">Kapan</span>
                    </div>
                    <span>Jumat, 13 Juni 09:00 - 10:30</span>
                </div>

                <p class="text-gray-900 leading-relaxed mb-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit unde repellendus ex animi nihil voluptates iusto tempore aut! Officia quia, similique alias sequi quaerat vero a suscipit assumenda mollitia distinctio!
                </p>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3"> Detail Agenda</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem aperiam nisi rem iste asperiores illo dolore vero itaque adipisci facere quisquam nostrum aspernatur, sint impedit quas repudiandae repellendus eveniet hic.</p>
                </div>

                <div class="border-t pt-6">
                    <h3 class="font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                        </svg>
                        Bagikan
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <button class="flex items-center justify-center gap-2 px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                        </svg>
                            <span class="font-medium">Salin Tautan</span>
                        </button>

                        <button class="flex items-center justify-center gap-2 px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <span class="font-medium">Undang Melalui Email</span>
                        </button>
                    </div>

                    <button class="w-full mt-3 flex items-center justify-center gap-2 px-4 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-200 font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                        Tambahkan Ke Kalender
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="max-w-6xl mx-auto px-6 py-16">
    <div class="flex flex-col lg:flex-row justify-center gap-8 sm:gap-12 py-8">
        <div class="flex w-full lg:w-[600px] flex-col gap-4 sm:gap-6 font-bold">
            <h1 class="text-5xl lg:text-6xl text-[#41644A]">Hubungi Kami</h1>
            <p class="text-lg lg:text-xl">Mari Berkolaborasi dan Wujudkan Perubahan Bersama</p>
            <p class="text-lg lg:text-xl flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                </svg>
                titikkebaikan@gmail.com
            </p>
            <p class="text-lg lg:text-xl flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                </svg>
                +62 852-2615-8143
            </p>
            <p class="text-lg lg:text-xl flex gap-2 align-top">
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                Jl. Cakrawala No.5, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145
            </p>
        </div>

        <div class="flex-auto p-6 rounded-xl shadow-lg bg-white">
            <form action="">
                <div class="mb-4">
                    <label class="block text-lg font-bold text-gray-700">Nama Lengkap</label>
                    <input type="text" placeholder="Nama Lengkap Anda" class="mt-1 p-2 w-full bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-none focus:ring-1 focus:ring-[#E9762B]">
                </div>
                <div class="mb-4">
                    <label class="block text-lg font-bold text-gray-700">Email</label>
                    <input type="email" placeholder="Email Anda" class="mt-1 p-2 w-full bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-none focus:ring-1 focus:ring-[#E9762B]">
                </div>
                <div class="mb-4">
                    <label class="block text-lg font-bold text-gray-700">Nomor Telepon</label>
                    <input type="text" placeholder="Nomor Telepon Anda" class="mt-1 p-2 w-full bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-none focus:ring-1 focus:ring-[#E9762B]">
                </div>
                <div class="mb-4">
                    <label class="block text-lg font-bold text-gray-700">Subjek Pesan</label>
                    <select class="mt-1 p-2 w-full text-gray-500 bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-none focus:ring-1 focus:ring-[#E9762B]" name="subjek-pesan" id="subjek-pesan">
                        <option value=""selected hidden>Pilih Salah Satu</option>
                        <option value="usulan-kerja-sama">Usulan Kerja Sama</option>
                        <option value="pesan">Pesan</option>
                        <option value="pertanyaan">Pertanyaan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-lg font-bold text-gray-700">Pesan</label>
                    <textarea placeholder="Tulis Pesan Kepada Kami" class="mt-1 p-2 w-full bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-none focus:ring-1 focus:ring-[#E9762B] h-24"></textarea>
                </div>
                <button type="submit" class="w-full bg-[#E9762B] hover:bg-[#E9762B]/90 text-white font-bold py-2 rounded-md">Kirim Pesan</button>
            </form>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto py-16 px-6">
    <div class="max-w-4xl mx-auto text-left lg:text-center flex flex-col gap-4">
        <svg class="lg:mx-auto w-16 h-16 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
            <path d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z"/>
        </svg>
        <h1 class="text-4xl lg:text-6xl font-bold">Punya Pertanyaan?</h1>
        <h1 class="text-4xl lg:text-6xl font-bold">Kami Punya Jawabannya</h1>
        <p class="text-base lg:text-xl mt-4 w-4/5 lg:mx-auto">Temukan jawaban atas pertanyaan yang sering diajukan dan dapatkan informasi untuk membantu anda berkolaborasi bersama kami.</p>
    </div>

    <div class="max-w-5xl mx-auto py-8">
        <div class="space-y-4">
            <details class="bg-white border rounded-lg shadow-sm">
                <summary class="flex justify-between items-center p-4 cursor-pointer font-medium text-base lg:text-xl">
                    Apa itu TitikKebaikan dan bagaimana mereka membantu panti asuhan?
                    <svg class="w-5 h-5 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <div class="p-4 lg:text-lg text-gray-600 ">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus aperiam enim, illum suscipit labore tempora facere, blanditiis saepe quaerat temporibus pariatur rem. Molestias, aut! Ratione accusamus quaerat praesentium facilis optio!</p>
                </div>
            </details>

            <details class="bg-white border rounded-lg shadow-sm">
                <summary class="flex justify-between items-center p-4 cursor-pointer font-medium text-base lg:text-xl">
                    Siapa member paling ganteng?
                    <svg class="w-5 h-5 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <div class="p-4 lg:text-lg text-gray-600 ">
                    <p>Ferdi</p>
                </div>
            </details>

            <details class="bg-white border rounded-lg shadow-sm">
                <summary class="flex justify-between items-center p-4 cursor-pointer font-medium text-base lg:text-xl">
                   Bagaimana cara saya bisa mendukung panti asuhan di Malang?
                    <svg class="w-5 h-5 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <div class="p-4 lg:text-lg text-gray-600 ">
                    <p>Ada banyak cara untuk berkontribusi! Anda bisa menjadi donatur, relawan, atau mitra dalam program CSR. Komunitas dapat mengadakan acara amal, perusahaan dapat mendukung melalui beasiswa atau donasi, dan individu bisa menjadi mentor atau pengajar. Lihat peluang di [Partnership Hub] atau hubungi kami untuk mendiskusikan ide Anda!</p>
                </div>
            </details>

            <details class="bg-white border rounded-lg shadow-sm">
                <summary class="flex justify-between items-center p-4 cursor-pointer font-medium text-base lg:text-xl">
                    Apakah saya bisa menjadi relawan di panti asuhan?
                    <svg class="w-5 h-5 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <div class="p-4 lg:text-lg text-gray-600 ">
                    <p>Tentu saja! Kami menyambut relawan untuk mengajar, menjadi mentor, atau membantu kegiatan harian. Daftar melalui [Volunteer Matching] atau hubungi kami untuk mencocokkan keterampilan Anda dengan kebutuhan panti.</p>
                </div>
            </details>
            
            <details class="bg-white border rounded-lg shadow-sm">
                <summary class="flex justify-between items-center p-4 cursor-pointer font-medium text-base lg:text-xl">
                    Apakah donasi saya akan digunakan secara transparan?
                    <svg class="w-5 h-5 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <div class="p-4 lg:text-lg text-gray-600 ">
                    <p>Kami berkommetmen untuk transparansi. Setiap donasi digunakan untuk kebutuhan anak-anak, seperti pendidikan, kesehatan, dan fasilitas panti. Kami menyediakan laporan tahunan untuk mitra dan donatur. Hubungi kami untuk informasi lebih lanjut!</p>
                </div>
            </details>
        </div>
    </div>
</div>

<script src="/js/jadwal-kegiatan.js"></script>
@endsection 