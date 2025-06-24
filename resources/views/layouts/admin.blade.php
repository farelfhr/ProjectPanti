<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="sm:scroll-smooth">
<head>
    <meta charset="utf-t">
    <link rel="icon" type="image/gif" href="/images/titik_kebaikan_icon.gif">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel') - Titik Kebaikan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F3F4F6; /* light-gray */
        }
        .sidebar-link:hover {
            background-color: #374151; /* gray-700 */
        }
        .sidebar-link.active {
            background-color: #3B82F6; /* primary */
            color: white;
            font-weight: 600;
        }
    </style>
</head>
<body class="flex h-screen bg-light-gray">
    <aside id="adminSidebar" class="w-64 flex-shrink-0 bg-gray-800 text-gray-300 flex flex-col">
        <div id="adminSidebar" class="h-20 flex items-center justify-center bg-gray-900">
            <h1 class="text-2xl font-bold text-white">{{ config('app.name') }}'s Admin</h1>
        </div>
        <!-- Sidebar -->
        <nav class="flex-grow px-4 py-6">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors duration-200 sidebar-link active">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.artikel.index') }}" class="flex items-center gap-3 px-4 py-3 mt-2 rounded-lg transition-colors duration-200 sidebar-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h4"/><path d="M16 2v20"/><path d="M8 7h4"/><path d="M8 12h4"/><path d="M8 17h4"/></svg>
                <span>Manajemen Artikel</span>
            </a>

            <a href="{{ route('admin.panti.index') }}" class="flex items-center gap-3 px-4 py-3 mt-2 rounded-lg transition-colors duration-200 sidebar-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                <span>Manajemen Panti</span>
            </a>

            <a href="{{ route('admin.kategori.index') }}" class="flex items-center gap-3 px-4 py-3 mt-2 rounded-lg transition-colors duration-200 sidebar-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>
                <span>Manajemen Kategori</span>
            </a>

            <a href="{{ route('admin.kegiatan.index') }}" class="flex items-center gap-3 px-4 py-3 mt-2 rounded-lg transition-colors duration-200 sidebar-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>
                <span>Manajemen Kegiatan</span>
            </a>

            <a href="{{ route('admin.faqs.index') }}" class="flex items-center gap-3 px-4 py-3 mt-2 rounded-lg transition-colors duration-200 sidebar-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                <span>Manajemen FAQ</span>
            </a>

            <a href="{{ route('admin.kontak.index') }}" class="flex items-center gap-3 px-4 py-3 mt-2 rounded-lg transition-colors duration-200 sidebar-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2z"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                <span>Pesan Masuk</span>
            </a>

            <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-3 mt-2 rounded-lg transition-colors duration-200 sidebar-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                <span>Manajemen Pengguna</span>
            </a>
        </nav>

        <div class="px-4 py-4 bg-gray-900">
            <div class="flex items-center gap-3">
                <img src="https://placehold.co/40x40/E2E8F0/333?text=A" alt="Avatar Admin" class="rounded-full w-10 h-10">
                <div>
                    <!--
                        Ganti dengan data pengguna yang sedang login
                        `Auth::user()->name`
                    -->
                    <p class="font-semibold text-white text-sm">{{ Auth::user()->name }}</p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-xs text-red-400 hover:underline">Logout</button>
                    </form>
                </div>
            </div>
            {{-- <a href="{{ route('home') }}" class="text-blue-500 hover:text-blue-700">Kembali ke Beranda</a> --}}
        </div>
    </aside>

    <!-- Overlay for mobile -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-40 z-20 hidden md:hidden" onclick="toggleSidebar(false)"></div>

    <div id="adminMain" class="flex-1 flex flex-col overflow-hidden">
        <header class="h-20 flex items-center justify-between px-8 bg-white border-b border-gray-200">
            <div>
                <button class="md:hidden focus:outline-none mr-2" onclick="toggleSidebar(true)">
                    <svg class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h2 class="text-2xl font-bold text-gray-800">@yield('title')</h2>
            </div>

            <div class="flex items-center gap-4">
                <button class="p-2 rounded-full hover:bg-gray-100" onclick="toggleSidebar(true)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                </button>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-8">
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            @yield('content')
        </main>
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