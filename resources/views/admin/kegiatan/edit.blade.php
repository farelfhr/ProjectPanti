@extends('layouts.admin')
@section('title', 'Edit Kegiatan')
@section('content')
   <div class="bg-white p-8 rounded-lg shadow-lg">
       <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Kegiatan: {{ $kegiatan->judul }}</h2>
       <form action="{{ route('admin.kegiatan.update', $kegiatan) }}" method="POST" enctype="multipart/form-data">
           @method('PUT')
           @include('admin.kegiatan._form')
       </form>
   </div>
@endsection