@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name }}!</h1>
        <p class="text-gray-600 mt-2">Ini adalah pusat kendali untuk website TitikKebaikan. Anda bisa mengelola semua data dari menu di sebelah kiri.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <div class="bg-white p-6 rounded-lg shadow-lg transform hover:-translate-y-1 transition-transform duration-300">
            <h3 class="text-lg font-semibold text-gray-500">Total Artikel</h3>
            <p class="text-4xl font-bold mt-2 text-brand-green">{{ $jumlahArtikel ?? 0 }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg transform hover:-translate-y-1 transition-transform duration-300">
            <h3 class="text-lg font-semibold text-gray-500">Total Panti Terdaftar</h3>
            <p class="text-4xl font-bold mt-2 text-brand-orange">{{ $jumlahPanti ?? 0 }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg transform hover:-translate-y-1 transition-transform duration-300">
            <h3 class="text-lg font-semibold text-gray-500">Pesan Masuk</h3>
            <p class="text-4xl font-bold mt-2 text-blue-600">{{ $jumlahPesan ?? 0 }}</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-lg transform hover:-translate-y-1 transition-transform duration-300">
            <h3 class="text-lg font-semibold text-gray-500">Jumlah Pengguna</h3>
            <p class="text-4xl font-bold mt-2 text-purple-600">{{ $jumlahUser ?? 0 }}</p>
        </div>

    </div>

    <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
        <h3 class="text-xl font-bold text-gray-800">Akses Cepat</h3>
        <div class="mt-4 flex flex-wrap gap-4">
            <a href="{{ route('admin.artikel.index') }}" class="bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors">Manajemen Artikel</a>
            <a href="{{ route('admin.panti.index') }}" class="bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors">Manajemen Panti</a>
            <a href="{{ route('admin.kategori.index') }}" class="bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors">Manajemen Kategori</a>
            <a href="{{ route('admin.kontak.index') }}" class="bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors">Pesan Masuk</a>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors">Manajemen Pengguna</a>
        </div>
    </div>
@endsection