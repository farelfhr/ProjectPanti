@extends('layouts.app')
@section('content')
<div class="py-20 md:py-28 bg-white relative -mt-32">
  <div class="absolute inset-0 opacity-3">
      <div class="absolute top-20 right-10 w-32 h-32 bg-[#D0D5CB] rounded-full animate-float"></div>
      <div class="absolute bottom-20 left-10 w-24 h-24 bg-[#F1F0E9] rounded-full animate-float" style="animation-delay: 1s;"></div>
  </div>

  <div class="max-w-3xl mx-auto px-6 relative z-10">
    <div class="" href="/berita/{{ $beritas['id_artikel'] }}">
      <div class="flex flex-col gap-6">
        <h3 class="text-5xl pt-8 font-bold">{{ $beritas['judul'] }}</h3>
        <p class="text-lg uppercase text-[#41644A] font-bold">{{ $beritas->kategori->nama }}</p>
        <img class="w-96 h-auto mx-auto rounded-lg shadow-md object-cover" src="{{ $beritas['gambar'] }}" alt="Artikel">
        <p class="text-lg">{{ $beritas['konten'] }}</p>
      
        <div class="flex gap-2">
          <p class="font-bold">{{ $beritas->author->name }}</p>
          <span>|</span>
          <p class="font-bold">{{ $beritas->publish_date->diffForHumans() }}</p>
        </div>

        <a class="text-[#E9762B] font-bold hover:underline" href="/berita">kembali</a>
      </div>
  </div>
</div>

@endsection 