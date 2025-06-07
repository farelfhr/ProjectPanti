@extends('layouts.admin')

@section('title', 'Manajemen Artikel')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <a href="{{ route('admin.artikel.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            Tambah Artikel Baru
        </a>
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Judul</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Penulis</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Tanggal Publish</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($artikels as $artikel)
                    <tr class="border-b">
                        <td class="w-1/3 text-left py-3 px-4">{{ $artikel->judul }}</td>
                        <td class="w-1/3 text-left py-3 px-4">{{ $artikel->author->name }}</td>
                        <td class="text-left py-3 px-4">{{ $artikel->publish_date->format('d M Y') }}</td>
                        <td class="py-3 px-4 flex gap-2">
                            <a href="{{ route('admin.artikel.edit', $artikel) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-xs">Edit</a>
                            <form action="{{ route('admin.artikel.destroy', $artikel) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Tidak ada artikel.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $artikels->links() }}
        </div>
    </div>
@endsection