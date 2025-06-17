@extends('layouts.admin')
@section('title', 'Edit Data Panti')
@section('content')
    {{-- Form Edit Data Panti --}}
    <div class="bg-white p-8 rounded-lg shadow-lg mb-8">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Informasi Panti</h2>
        <form action="{{ route('admin.panti.update', $panti) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.panti._form')
        </form>
    </div>

    {{-- Bagian Baru: Manajemen Kebutuhan --}}
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Manajemen Kebutuhan untuk {{ $panti->nama }}</h2>

        {{-- Form untuk Menambah Kebutuhan Baru --}}
        <form action="{{ route('admin.kebutuhan.store') }}" method="POST" class="mb-6 p-4 border rounded-md">
            @csrf
            <input type="hidden" name="id_panti" value="{{ $panti->id_panti }}">
            <h3 class="text-lg font-semibold mb-2">Tambah Kebutuhan Baru</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="tipe" class="block text-sm font-medium text-gray-700">Tipe</label>
                    <input type="text" name="tipe" id="tipe" placeholder="Cth: Sembako, Dana, Pakaian"
                        class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <input type="text" name="deskripsi" id="deskripsi" placeholder="Cth: Beras, Gula, Baju layak pakai"
                        class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>
                <div>
                    <label for="urgency_level" class="block text-sm font-medium text-gray-700">Tingkat Urgensi</label>
                    <select name="urgency_level" id="urgency_level"
                        class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        <option value="Rendah">Rendah</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Tinggi">Tinggi</option>
                    </select>
                </div>
            </div>
            <button type="submit"
                class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Tambah
                Kebutuhan</button>
        </form>

        {{-- Tabel Daftar Kebutuhan yang Sudah Ada --}}
        <h3 class="text-lg font-semibold mb-2">Daftar Kebutuhan Saat Ini</h3>
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="text-left py-2 px-3">Tipe</th>
                    <th class="text-left py-2 px-3">Deskripsi</th>
                    <th class="text-left py-2 px-3">Urgensi</th>
                    <th class="text-left py-2 px-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($panti->kebutuhan as $kebutuhan)
                    <tr class="border-b">
                        <td class="py-2 px-3">{{ $kebutuhan->tipe }}</td>
                        <td class="py-2 px-3">{{ $kebutuhan->deskripsi }}</td>
                        <td class="py-2 px-3">{{ $kebutuhan->urgency_level }}</td>
                        <td class="py-2 px-3">
                            <form action="{{ route('admin.kebutuhan.destroy', $kebutuhan) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus kebutuhan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Panti ini belum memiliki daftar kebutuhan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
