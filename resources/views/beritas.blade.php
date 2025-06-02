@extends('layouts.app')
@section('content')

<div class="max-w-4xl mx-auto py-16 px-4">
  <div class="p-6 bg-[#f1f0e9] rounded-lg shadow-md hover:shadow-xl transition-all duration-300" href="/berita/{{ $beritas['id'] }}">
    <h3 class="text-4xl text-center py-8 font-bold mb-4">{{ $beritas['judul'] }}</h3>
    <img class="w-96 h-auto mx-auto mb-12 rounded-lg shadow-md object-cover" src="{{ $beritas['gambar'] }}" alt="Artikel">
    <p class="text-lg mb-4">{{ $beritas['isi'] }}</p>
    <p class="text-sm mb-4">{{ $beritas['tanggal'] }} <span class="text-[#41644A] font-bold">{{ $beritas['penulis'] }}</span></p>
    <a class="text-[#E9762B] hover:underline font-bold" href="/berita">kembali</a>
  </div>
</div>

@endsection 