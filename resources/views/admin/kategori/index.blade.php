@extends('layouts.admin')
@section('title', 'Manajemen Kategori')
@section('content')
    <div class="bg-white p-8 rounded-lg shadow-lg">
        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <p>{{ session('error') }}</p>
            </div>
        @endif
        <a href="{{ route('admin.kategori.create') }}" class="bg-brand-green bg-lime-500 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            Tambah Kategori Baru
        </a>
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="text-left py-3 px-4">Nama</th>
                    <th class="text-left py-3 px-4">Jumlah Artikel</th>
                    <th class="text-left py-3 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($kategoris as $kategori)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $kategori->nama }}</td>
                        <td class="py-3 px-4">{{ $kategori->artikel_count ?? $kategori->artikel()->count() }}</td>
                        <td class="py-3 px-4 flex gap-2">
                            <a href="{{ route('admin.kategori.edit', $kategori) }}" class="bg-brand-orange bg-orange-600 text-white font-bold py-1 px-3 rounded text-xs">Edit</a>
                            <form action="{{ route('admin.kategori.destroy', $kategori) }}" method="POST" onsubmit="return confirm('Yakin hapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center py-4">Tidak ada data kategori.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $kategoris->links() }}</div>
    </div>
@endsection