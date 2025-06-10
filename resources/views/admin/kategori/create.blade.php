@extends('layouts.admin')
@section('title', 'Tambah Kategori')
@section('content')
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <form action="{{ route('admin.kategori.store') }}" method="POST">
            @include('admin.kategori._form')
        </form>
    </div>
@endsection