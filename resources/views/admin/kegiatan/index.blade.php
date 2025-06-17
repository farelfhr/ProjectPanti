@extends('layouts.admin')
@section('title', 'Manajemen Kegiatan Kerjasama')
@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg">
    <a href="{{ route('admin.kegiatan.create') }}" class="bg-brand-green hover:bg-brand-green-dark text-white font-bold py-2 px-4 rounded mb-6 inline-block">
        Tambah Kegiatan Baru
    </a>
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Judul</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Pembicara</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Tanggal</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Lokasi</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse ($kegiatan as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $item->judul }}</td>
                    <td class="py-3 px-4">{{ $item->pembicara }}</td>
                    <td class="py-3 px-4">{{ $item->tanggal->format('d M Y') }}</td>
                    <td class="py-3 px-4">{{ $item->lokasi }}</td>
                    <td class="py-3 px-4 flex gap-2">
                        <a href="{{ route('admin.kegiatan.edit', $item) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-xs">Edit</a>
                        <form action="{{ route('admin.kegiatan.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin hapus kegiatan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center py-4">Tidak ada data kegiatan.</td></tr>
            @endforelse
        </tbody>
    </table>
     <div class="mt-4">{{ $kegiatan->links() }}</div>
</div>
@endsection