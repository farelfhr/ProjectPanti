@extends('layouts.admin')

@section('title', 'Tambah Artikel Baru')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <form action="{{ route('admin.artikel.store') }}" method="POST">
            @include('admin.artikel._form')
        </form>
    </div>
@endsection