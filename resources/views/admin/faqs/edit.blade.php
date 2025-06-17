@extends('layouts.admin')

@section('title', 'Edit FAQ')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit FAQ</h2>

    {{-- Form ini akan mengirim data ke method 'update' di FaqController --}}
    <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
        @method('PUT') {{-- Penting untuk memberitahu Laravel bahwa ini adalah request UPDATE --}}

        {{-- Ini akan menyertakan semua field input dari form partial --}}
        {{-- Variabel $faq otomatis terkirim dari controller ke _form ini --}}
        @include('admin.faqs._form')
    </form>
</div>
@endsection