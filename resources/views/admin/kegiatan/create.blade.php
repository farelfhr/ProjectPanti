@extends('layouts.admin')
@section('title', 'Tambah Kegiatan Baru')
@section('content')
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Kegiatan Baru</h2>
        <form action="{{ route('admin.kegiatan.store') }}" method="POST" enctype="multipart/form-data">
            @include('admin.kegiatan._form')
        </form>
    </div>
@endsection