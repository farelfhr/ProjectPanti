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
        <div class="w-64 bg-gray-800 text-white p-5">
            <h2 class="text-2xl font-bold mb-10">{{ config('app.name') }}</h2>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('admin.artikel.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Manajemen Artikel</a>
                <a href="{{ route('admin.panti.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Manajemen Panti</a>
                <a href="{{ route('admin.kategori.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Manajemen Kategori</a>
                <a href="{{ route('admin.kontak.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Pesan Masuk</a>
                <a href="{{ route('admin.users.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Manajemen Pengguna</a>
                {{-- Tambahkan link manajemen lain di sini (Panti, Kategori, dll) --}}
            </nav>
        </div>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="flex justify-between items-center p-6 bg-white border-b">
                <h1 class="text-2xl font-semibold">@yield('title')</h1>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-500 hover:underline">Logout</button>
                </form>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>