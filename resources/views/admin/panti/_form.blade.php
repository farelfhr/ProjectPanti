@csrf
<div class="mb-4">
    <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Panti:</label>
    <input type="text" name="nama" id="nama" value="{{ old('nama', $panti->nama ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
</div>
<div class="mb-4">
    <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat:</label>
    <textarea name="alamat" id="alamat" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>{{ old('alamat', $panti->alamat ?? '') }}</textarea>
</div>
<div class="mb-4">
    <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Telepon:</label>
    <input type="text" name="phone" id="phone" value="{{ old('phone', $panti->phone ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
</div>
<div class="mb-4">
    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
    <input type="email" name="email" id="email" value="{{ old('email', $panti->email ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
</div>
<div class="mb-4">
    <label for="social_media_url" class="block text-gray-700 text-sm font-bold mb-2">URL Media Sosial (Opsional):</label>
    <input type="url" name="social_media_url" id="social_media_url" value="{{ old('social_media_url', $panti->social_media_url ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
</div>

<div class="mb-4">
    <label for="gambar" class="block text-gray-700 text-sm font-bold mb-2">Gambar Panti:</label>
    <input type="file" name="gambar" id="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('gambar') border-red-500 @enderror">
    @error('gambar')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror

    {{-- Tampilkan gambar saat ini jika sedang edit --}}
    @if(isset($panti) && $panti->gambar)
        <div class="mt-4">
            <p class="text-sm text-gray-600">Gambar saat ini:</p>
            <img src="{{ asset('storage/' . $panti->gambar) }}" alt="{{ $panti->nama }}" class="mt-2 w-48 h-auto rounded">
        </div>
    @endif
</div>

<div class="flex items-center justify-between">
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        {{ isset($panti) ? 'Update Data' : 'Simpan Data' }}
    </button>
    <a href="{{ route('admin.panti.index') }}" class="text-blue-500 hover:text-blue-800">Batal</a>
</div>