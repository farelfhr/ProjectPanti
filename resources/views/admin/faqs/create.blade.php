@extends('layouts.admin')

@section('title', 'Tambah FAQ Baru')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah FAQ Baru</h2>
    
    {{-- Form ini akan mengirim data ke method 'store' di FaqController --}}
    <form action="{{ route('admin.faqs.store') }}" method="POST">
        {{-- Ini akan menyertakan semua field input dari form partial --}}
        @include('admin.faqs._form')
    </form>
</div>
@endsection