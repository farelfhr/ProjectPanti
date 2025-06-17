@extends('layouts.admin')
@section('title', 'Manajemen Panti')
@section('content')
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <a href="{{ route('admin.panti.create') }}"
            class="bg-brand-green hover:bg-brand-green-dark text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            Tambah Panti Baru
        </a>
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="text-left py-3 px-4">Gambar</th>
                    <th class="text-left py-3 px-4">Nama Panti</th>
                    <th class="text-left py-3 px-4">Email</th>
                    <th class="text-left py-3 px-4">Telepon</th>
                    <th class="text-left py-3 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($pantis as $panti)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">
                            @if ($panti->gambar)
                                <img src="{{ asset('storage/' . $panti->gambar) }}" alt="{{ $panti->nama }}"
                                    class="w-24 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </td>
                        <td class="py-3 px-4">{{ $panti->nama }}</td>
                        <td class="py-3 px-4">{{ $panti->email }}</td>
                        <td class="py-3 px-4">{{ $panti->phone }}</td>
                        <td class="py-3 px-4 flex gap-2">
                            <a href="{{ route('admin.panti.edit', $panti) }}"
                                class="bg-brand-orange hover:bg-orange-600 text-white font-bold py-1 px-3 rounded text-xs">Edit</a>
                            <form action="{{ route('admin.panti.destroy', $panti) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus data panti ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Tidak ada data panti.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">{{ $pantis->links() }}</div>
    </div>
@endsection
