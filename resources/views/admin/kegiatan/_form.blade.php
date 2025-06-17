@csrf
<div class="mb-4">
    <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul Kegiatan:</label>
    <input type="text" name="judul" id="judul" value="{{ old('judul', $kegiatan->judul ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
</div>

<div class="mb-4">
    <label for="pembicara" class="block text-gray-700 text-sm font-bold mb-2">Pembicara/Penanggung Jawab:</label>
    <input type="text" name="pembicara" id="pembicara" value="{{ old('pembicara', $kegiatan->pembicara ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label for="tanggal" class="block text-gray-700 text-sm font-bold mb-2">Tanggal:</label>
        {{-- INI BAGIAN YANG DIPERBAIKI --}}
        <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', isset($kegiatan) ? $kegiatan->tanggal->format('Y-m-d') : '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
    </div>
    <div>
        <label for="waktu" class="block text-gray-700 text-sm font-bold mb-2">Waktu:</label>
        <input type="text" name="waktu" id="waktu" value="{{ old('waktu', $kegiatan->waktu ?? '') }}" placeholder="Contoh: 09:00 - 11:00" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
    </div>
</div>

<div class="mb-4">
    <label for="lokasi" class="block text-gray-700 text-sm font-bold mb-2">Lokasi:</label>
    <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi', $kegiatan->lokasi ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
</div>

<div class="mb-4">
    <label for="deskripsi_singkat" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Singkat (untuk kartu):</label>
    <textarea name="deskripsi_singkat" id="deskripsi_singkat" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>{{ old('deskripsi_singkat', $kegiatan->deskripsi_singkat ?? '') }}</textarea>
</div>

<hr class="my-6">

<h3 class="text-xl font-semibold mb-4">Konten Modal</h3>

<div class="mb-4">
    <label for="judul_modal" class="block text-gray-700 text-sm font-bold mb-2">Judul di dalam Modal:</label>
    <input type="text" name="judul_modal" id="judul_modal" value="{{ old('judul_modal', $kegiatan->judul_modal ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
</div>

<div class="mb-4">
    <label for="deskripsi_panjang" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Panjang (di dalam modal):</label>
    <textarea name="deskripsi_panjang" id="deskripsi_panjang" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>{{ old('deskripsi_panjang', $kegiatan->deskripsi_panjang ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label for="gambar" class="block text-gray-700 text-sm font-bold mb-2">Gambar (untuk modal):</label>
    <input type="file" name="gambar" id="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
    @if(isset($kegiatan) && $kegiatan->gambar)
        <div class="mt-2">
            <p class="text-sm text-gray-600">Gambar saat ini:</p>
            <img src="{{ asset('storage/' . $kegiatan->gambar) }}" alt="{{ $kegiatan->judul }}" class="mt-1 w-40 h-auto rounded">
        </div>
    @endif
</div>


<div class="flex items-center justify-between mt-6">
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        {{ isset($kegiatan) ? 'Update Kegiatan' : 'Simpan Kegiatan' }}
    </button>
    <a href="{{ route('admin.kegiatan.index') }}" class="text-blue-500 hover:text-blue-800">Batal</a>
</div>