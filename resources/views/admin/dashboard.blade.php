@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name }}!</h1>
        <p class="text-gray-600 mt-2">Ini adalah pusat kendali untuk website TitikKebaikan. Anda bisa mengelola semua data dari menu di sebelah kiri.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-white p-6 rounded-xl shadow-md flex items-center gap-5 transform hover:-translate-y-1 transition-transform duration-300">
            <div class="bg-green-100 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h4"/><path d="M16 2v20"/><path d="M8 7h4"/><path d="M8 12h4"/><path d="M8 17h4"/></svg>
            </div>

            <div>
                <h3 class="text-sm text-gray-500">Total Artikel</h3>
                <p class="text-2xl font-bold text-gray-800">{{ $jumlahArtikel ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md flex items-center gap-5 transform hover:-translate-y-1 transition-transform duration-300">
            <div class="bg-blue-100 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            </div>

            <div>
                <h3 class="text-sm text-gray-500">Total Panti Terdaftar</h3>
                <p class="text-2xl font-bold text-gray-800">{{ $jumlahPanti ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md flex items-center gap-5 transform hover:-translate-y-1 transition-transform duration-300">
            <div class="bg-purple-100 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-500"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg>
            </div>

            <div>
                <h3 class="text-sm text-gray-500">Pesan Masuk</h3>
                <p class="text-2xl font-bold text-gray-800">{{ $jumlahPesan ?? 0 }}</p>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow-md flex items-center gap-5 transform hover:-translate-y-1 transition-transform duration-300">
            <div class="bg-yellow-100 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-500"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>

            <div>
                <h3 class="text-sm text-gray-500">Jumlah Pengguna</h3>
                <p class="text-2xl font-bold text-gray-800">{{ $jumlahUser ?? 0 }}</p>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Aktivitas Terbaru</h3>
            <div class="space-y-4">
                @forelse($recentActivities as $activity)
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">{{ $activity->action }}</p>
                            <p class="text-xs text-gray-500">
                                {{ $activity->description }}
                                <span class="italic">oleh {{ $activity->user_name }}, {{ $activity->created_at->diffForHumans() }}</span>
                            </p>
                        </div>
                    </div>
                @empty
                <div class="text-center py-4">
                    <p class="text-sm text-gray-500">Tidak ada aktivitas terbaru.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- <div class="mt-8 bg-white p-4 sm:p-6 rounded-lg shadow-lg w-full">
        <h3 class="text-xl font-bold text-gray-800">Akses Cepat</h3>
        <div class="mt-4 flex flex-wrap gap-2 md:gap-4 overflow-x-auto">
            <a href="{{ route('admin.artikel.index') }}" class="bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors">Manajemen Artikel</a>
            <a href="{{ route('admin.panti.index') }}" class="bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors">Manajemen Panti</a>
            <a href="{{ route('admin.kategori.index') }}" class="bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors">Manajemen Kategori</a>
            <a href="{{ route('admin.kegiatan.index') }}" class="bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors">Manajemen Kegiatan</a>
            <a href="{{ route('admin.faqs.index') }}" class="bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors">Manajemen FAQ</a>
            <a href="{{ route('admin.kontak.index') }}" class="bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors">Pesan Masuk</a>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors">Manajemen Pengguna</a>
        </div>
    </div> --}}
@endsection