@extends('layouts.admin')
@section('title', 'Pesan Masuk')
@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Daftar Pesan Kontak</h2>
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="text-left py-3 px-4">Pengirim</th>
                <th class="text-left py-3 px-4">Subjek</th>
                <th class="text-left py-3 px-4">Tanggal</th>
                <th class="text-left py-3 px-4">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse ($kontaks as $kontak)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $kontak->user->name ?? 'Pengunjung Tamu' }}</td>
                    <td class="py-3 px-4">{{ $kontak->subjek }}</td>
                    <td class="py-3 px-4">{{ $kontak->created_at->format('d M Y, H:i') }}</td>
                    <td class="py-3 px-4 flex gap-2">
                        <a href="{{ route('admin.kontak.show', $kontak) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-xs">Lihat</a>
                        <form action="{{ route('admin.kontak.destroy', $kontak) }}" method="POST" onsubmit="return confirm('Yakin hapus pesan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center py-4">Tidak ada pesan masuk.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">{{ $kontaks->links() }}</div>
</div>
@endsection