@csrf
<div class="mb-4">
    <label for="nama" class="block text-gray-700 font-bold mb-2">Nama Kategori:</label>
    <input type="text" name="nama" id="nama" value="{{ old('nama', $kategori->nama ?? '') }}" class="shadow border rounded w-full py-2 px-3" required>
</div>
<div class="mb-4">
    <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi (Opsional):</label>
    <textarea name="deskripsi" id="deskripsi" rows="4" class="shadow border rounded w-full py-2 px-3">{{ old('deskripsi', $kategori->deskripsi ?? '') }}</textarea>
</div>
<div class="flex items-center justify-between">
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        {{ isset($kategori) ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('admin.kategori.index') }}" class="text-blue-500 hover:text-blue-800">Batal</a>
</div>