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
    <label for="kecamatan" class="block text-gray-700 text-sm font-bold mb-2">Kecamatan:</label>
    <input type="text" name="kecamatan" id="kecamatan" value="{{ old('kecamatan', $panti->kecamatan ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
    <p class="text-xs text-gray-500 mt-1">Masukkan nama kecamatan (contoh: Klojen)</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label for="latitude" class="block text-gray-700 text-sm font-bold mb-2">Latitude:</label>
        <input type="text" name="latitude" id="latitude" value="{{ old('latitude', $panti->latitude ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        <p class="text-xs text-gray-500 mt-1">Contoh: -6.175392</p>
    </div>
    <div>
        <label for="longitude" class="block text-gray-700 text-sm font-bold mb-2">Longitude:</label>
        <input type="text" name="longitude" id="longitude" value="{{ old('longitude', $panti->longitude ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        <p class="text-xs text-gray-500 mt-1">Contoh: 106.827153</p>
    </div>
</div>
<p class="text-sm text-gray-600 mb-4">
    💡 **Tips:** Untuk mendapatkan Latitude & Longitude, buka Google Maps, klik kanan pada lokasi panti, dan klik pada angka koordinat yang muncul untuk menyalinnya.
</p>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label for="jumlah_anak" class="block text-gray-700 text-sm font-bold mb-2">Jumlah Anak:</label>
        <input type="number" name="jumlah_anak" id="jumlah_anak" value="{{ old('jumlah_anak', $panti->jumlah_anak ?? 0) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" min="0" required>
    </div>
    <div>
        <label for="kapasitas" class="block text-gray-700 text-sm font-bold mb-2">Kapasitas:</label>
        <input type="number" name="kapasitas" id="kapasitas" value="{{ old('kapasitas', $panti->kapasitas ?? 0) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" min="0" required>
    </div>
</div>

<div class="mb-4">
    <label for="tahun_berdiri" class="block text-gray-700 text-sm font-bold mb-2">Tahun Berdiri:</label>
    <input type="number" name="tahun_berdiri" id="tahun_berdiri" value="{{ old('tahun_berdiri', $panti->tahun_berdiri ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" min="1900" max="{{ date('Y') }}">
    <p class="text-xs text-gray-500 mt-1">Masukkan tahun berdirinya panti (contoh: 1990)</p>
</div>

<div class="mb-4">
    <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi:</label>
    <textarea name="deskripsi" id="deskripsi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ old('deskripsi', $panti->deskripsi ?? '') }}</textarea>
    <p class="text-xs text-gray-500 mt-1">Jelaskan tentang panti asuhan, sejarah, visi misi, dan informasi penting lainnya</p>
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

<div class="flex justify-end">
    <button type="submit" class="bg-brand-green hover:bg-brand-green-dark text-white bg-lime-500 font-bold py-2 px-4 rounded">
        {{ isset($panti) ? 'Update Data Panti' : 'Simpan Data Panti' }}
    </button>
</div>