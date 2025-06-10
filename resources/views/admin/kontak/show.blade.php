@extends('layouts.admin')
@section('title', 'Detail Pesan')
@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-6 border-b pb-4">
        <h2 class="text-2xl font-bold text-gray-800">Detail Pesan</h2>
        <a href="{{ route('admin.kontak.index') }}" class="text-blue-500 hover:text-blue-800">&larr; Kembali ke Daftar Pesan</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
        <strong class="md:col-span-1">Dari:</strong>
        <p class="md:col-span-3">{{ $kontak->user->name ?? 'Pengunjung Tamu' }}</p>

        <strong class="md:col-span-1">Email Pengirim:</strong>
        <p class="md:col-span-3">{{ $kontak->user->email ?? 'Tidak diketahui' }}</p>

        <strong class="md:col-span-1">Subjek:</strong>
        <p class="md:col-span-3">{{ $kontak->subjek }}</p>

        <strong class="md:col-span-1">Tanggal Kirim:</strong>
        <p class="md:col-span-3">{{ $kontak->created_at->format('d F Y, H:i:s') }}</p>
    </div>

    <div class="mt-6 border-t pt-4">
        <strong class="block mb-2">Isi Pesan:</strong>
        <p class="text-gray-700 whitespace-pre-wrap">{{ $kontak->konten }}</p>
    </div>
</div>
@endsection