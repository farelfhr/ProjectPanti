<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="sm:scroll-smooth">
<head>
    <meta charset="utf-t">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel') - {{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="flex h-screen bg-gray-200">
        <!-- Sidebar -->
        <div id="adminSidebar" class="fixed inset-y-0 left-0 z-30 w-64 bg-gray-800 text-white p-5 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-200 ease-in-out md:w-64 md:block">
            <h2 class="text-2xl font-bold mb-10">{{ config('app.name') }}</h2>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('admin.artikel.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Manajemen Artikel</a>
                <a href="{{ route('admin.panti.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Manajemen Panti</a>
                <a href="{{ route('admin.kategori.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Manajemen Kategori</a>
                <a href="{{ route('admin.kegiatan.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Manajemen Kegiatan</a>
                <a href="{{ route('admin.faqs.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Manajemen FAQ</a>
                <a href="{{ route('admin.kontak.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Pesan Masuk</a>
                <a href="{{ route('admin.users.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Manajemen Pengguna</a>
            </nav>
        </div>

        <!-- Overlay for mobile -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-40 z-20 hidden md:hidden" onclick="toggleSidebar(false)"></div>

        <div id="adminMain" class="flex-1 flex flex-col overflow-hidden ml-0 md:ml-0 transition-all duration-200">
            <header class="flex justify-between items-center p-4 bg-white border-b md:p-6">
                <div class="flex items-center gap-4">
                    <!-- Hamburger for mobile -->
                    <button class="md:hidden focus:outline-none mr-2" onclick="toggleSidebar(true)">
                        <svg class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h1 class="text-2xl font-semibold">@yield('title')</h1>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('home') }}" class="text-blue-500 hover:text-blue-700">Kembali ke Beranda</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Logout</button>
                    </form>
                </div>
            </header>
            <main class="flex-1 overflow-x-auto overflow-y-auto bg-gray-100 p-2 sm:p-4 md:p-6">
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
    <script>
        function toggleSidebar(show) {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const main = document.getElementById('adminMain');
            if (show) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                if(window.innerWidth < 768) main.classList.add('ml-64');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                if(window.innerWidth < 768) main.classList.remove('ml-64');
            }
        }
        window.addEventListener('resize', function() {
            const main = document.getElementById('adminMain');
            if(window.innerWidth >= 768) main.classList.remove('ml-64');
        });
    </script>
</body>
</html>