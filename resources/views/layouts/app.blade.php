<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="sm:scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-[#FFF8E3]">
            @include('components.navbar')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="pt-32">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-[#0D4715] py-16 px-6 text-[#F1F0E9] font-medium">
                <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-12">
                    <!-- Kolom 1: Logo dan Deskripsi -->
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center gap-3 mb-4">
                            <img src="{{ asset('images/titik_kebaikan_logo.jpg') }}" alt="Titik Kebaikan Logo" class="h-12 w-auto"/>
                            <div>
                                <span class="text-3xl font-bold block">TitikKebaikan</span>
                                <span class="text-lg block">Kota Malang</span>
                            </div>
                        </div>
                        <p class="leading-relaxed mb-4">
                            Membangun jembatan kebaikan antara masyarakat
                            dan panti asuhan di Kota Malang untuk menciptakan
                            masa depan yang lebih cerah dan penuh harapan.
                        </p>
                        <div class="flex items-center gap-2 text-[#E9762B]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                            <span>Bersama kita wujudkan harapan</span>
                        </div>
                        <div class="flex gap-4 mt-6">
                            <a href="#" class="bg-white bg-opacity-20 p-3 rounded-full hover:bg-opacity-40 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                            </a>
                            <a href="#" class="bg-white bg-opacity-20 p-3 rounded-full hover:bg-opacity-40 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                            </a>
                            <a href="#" class="bg-white bg-opacity-20 p-3 rounded-full hover:bg-opacity-40 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c1.7 1.2 3.7 2 5.7 2A12.66 12.66 0 0 0 22 8.5c0-.2 0-.4 0-.6a8.34 8.34 0 0 0 2-2.1z"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Kolom 2: Kontak Kami -->
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-6">Kontak Kami</h3>
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="bg-[#E9762B] p-3 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z"/></svg>
                                </div>
                                <div>
                                    <p class="text-base text-[#F1F0E9]">Alamat</p>
                                    <p class="text-sm text-gray-400">Kota Malang, Jawa Timur</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="bg-[#E9762B] p-3 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                                </div>
                                <div>
                                    <p class="text-base text-[#F1F0E9]">Email</p>
                                    <p class="text-sm text-gray-400">info@titikkebaikan.id</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="bg-[#E9762B] p-3 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M20 15.5c-1.25 0-2.45-.2-3.57-.57-.35-.12-.74-.03-1.01.24l-2.29 2.29c-3.15-1.56-5.69-4.1-7.25-7.25l2.29-2.29c.27-.27.36-.66.24-1.01C8.75 3.95 8.55 2.75 8.55 1.5c0-.83-.67-1.5-1.5-1.5H3.5C2.67 0 2 0.67 2 1.5c0 10.15 8.35 18.5 18.5 18.5.83 0 1.5-.67 1.5-1.5v-3.5c0-.83-.67-1.5-1.5-1.5z"/></svg>
                                </div>
                                <div>
                                    <p class="text-base text-[#F1F0E9]">Telepon</p>
                                    <p class="text-sm text-gray-400">+62 812-3456-7890</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom 3: Menu Cepat -->
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-6">Menu Cepat</h3>
                        <ul class="space-y-3">
                            <li><a href="/" class="hover:text-[#E9762B] transition-colors duration-300">Beranda</a></li>
                            <li><a href="/daftar-panti" class="hover:text-[#E9762B] transition-colors duration-300">Daftar Panti</a></li>
                            <li><a href="/berita" class="hover:text-[#E9762B] transition-colors duration-300">Berita</a></li>
                            <li><a href="/kerjasama" class="hover:text-[#E9762B] transition-colors duration-300">Kerjasama</a></li>
                            <li><a href="/tentang" class="hover:text-[#E9762B] transition-colors duration-300">Tentang Kami</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mt-12 pt-8 border-t border-gray-700 text-center text-sm text-gray-400">
                    &copy; {{ date('Y') }} TitikKebaikan. All rights reserved.
                </div>
            </footer>
        </div>
        @stack('scripts')
    </body>
</html>
