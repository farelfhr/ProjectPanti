@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <form action="{{ route('admin.artikel.update', $artikel) }}" method="POST">
            @method('PUT')
            @include('admin.artikel._form')
        </form>
    </div>
@endsection