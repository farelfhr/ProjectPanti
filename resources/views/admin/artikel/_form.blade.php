@csrf
<div class="mb-4">
    <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul Artikel:</label>
    <input type="text" name="judul" id="judul" value="{{ old('judul', $artikel->judul ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('judul') border-red-500 @enderror" required>
    @error('judul')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="konten" class="block text-gray-700 text-sm font-bold mb-2">Konten:</label>
    <textarea name="konten" id="konten" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('konten') border-red-500 @enderror" required>{{ old('konten', $artikel->konten ?? '') }}</textarea>
    @error('konten')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>

<div class="flex items-center justify-between">
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        {{ isset($artikel) ? 'Update Artikel' : 'Simpan Artikel' }}
    </button>
    <a href="{{ route('admin.artikel.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
        Batal
    </a>
</div>