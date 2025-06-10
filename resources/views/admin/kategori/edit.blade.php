@extends('layouts.admin')
@section('title', 'Edit Kategori')
@section('content')
   <div class="bg-white p-8 rounded-lg shadow-lg">
       <form action="{{ route('admin.kategori.update', $kategori) }}" method="POST">
           @method('PUT')
           @include('admin.kategori._form')
       </form>
   </div>
@endsection