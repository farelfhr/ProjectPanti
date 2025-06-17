@extends('layouts.admin')
@section('title', 'Tambah Data Panti')
@section('content')
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <form action="{{ route('admin.panti.store') }}" method="POST" enctype="multipart/form-data">
            @include('admin.panti._form')
        </form>
    </div>
@endsection
