@extends('layouts.admin')
@section('title', 'Edit Peran Pengguna')
@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Peran untuk: {{ $user->name }}</h2>
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="is_admin" class="flex items-center">
                <input type="checkbox" name="is_admin" id="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }} class="h-4 w-4 text-brand-orange rounded">
                <span class="ml-2 text-gray-700 font-medium">Jadikan sebagai Admin</span>
            </label>
            <p class="text-sm text-gray-500 mt-1">Dengan mencentang kotak ini, pengguna akan memiliki akses penuh ke panel admin.</p>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Update Peran
            </button>
            <a href="{{ route('admin.users.index') }}" class="text-blue-500 hover:text-blue-800">Batal</a>
        </div>
    </form>
</div>
@endsection