<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setup Data Panti') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('warning'))
                        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
                            {{ session('warning') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">
                            @if($panti)
                                Perbarui Data Panti
                            @else
                                Lengkapi Data Panti Anda
                            @endif
                        </h3>
                        <p class="text-gray-600">
                            Silakan lengkapi informasi panti asuhan Anda. Data ini akan ditinjau oleh admin sebelum dipublikasikan.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('panti.setup.store') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Panti -->
                            <div>
                                <x-input-label for="nama" :value="__('Nama Panti Asuhan')" />
                                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama', $panti->nama ?? '')" required autofocus />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>

                            <!-- Kecamatan -->
                            <div>
                                <x-input-label for="kecamatan" :value="__('Kecamatan')" />
                                <x-text-input id="kecamatan" class="block mt-1 w-full" type="text" name="kecamatan" :value="old('kecamatan', $panti->kecamatan ?? '')" required />
                                <x-input-error :messages="$errors->get('kecamatan')" class="mt-2" />
                            </div>

                            <!-- Alamat -->
                            <div class="md:col-span-2">
                                <x-input-label for="alamat" :value="__('Alamat Lengkap')" />
                                <textarea id="alamat" name="alamat" rows="3" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>{{ old('alamat', $panti->alamat ?? '') }}</textarea>
                                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                            </div>

                            <!-- Telepon -->
                            <div>
                                <x-input-label for="phone" :value="__('Nomor Telepon')" />
                                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $panti->phone ?? '')" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>

                            <!-- Email -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $panti->email ?? '')" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Jumlah Anak -->
                            <div>
                                <x-input-label for="jumlah_anak" :value="__('Jumlah Anak Saat Ini')" />
                                <x-text-input id="jumlah_anak" class="block mt-1 w-full" type="number" name="jumlah_anak" :value="old('jumlah_anak', $panti->jumlah_anak ?? '')" required min="0" />
                                <x-input-error :messages="$errors->get('jumlah_anak')" class="mt-2" />
                            </div>

                            <!-- Kapasitas -->
                            <div>
                                <x-input-label for="kapasitas" :value="__('Kapasitas Maksimal')" />
                                <x-text-input id="kapasitas" class="block mt-1 w-full" type="number" name="kapasitas" :value="old('kapasitas', $panti->kapasitas ?? '')" required min="0" />
                                <x-input-error :messages="$errors->get('kapasitas')" class="mt-2" />
                            </div>

                            <!-- Tahun Berdiri -->
                            <div>
                                <x-input-label for="tahun_berdiri" :value="__('Tahun Berdiri')" />
                                <x-text-input id="tahun_berdiri" class="block mt-1 w-full" type="number" name="tahun_berdiri" :value="old('tahun_berdiri', $panti->tahun_berdiri ?? '')" min="1900" max="{{ date('Y') }}" />
                                <x-input-error :messages="$errors->get('tahun_berdiri')" class="mt-2" />
                            </div>

                            <!-- Gambar -->
                            <div>
                                <x-input-label for="gambar" :value="__('Foto Panti')" />
                                <input id="gambar" class="block mt-1 w-full" type="file" name="gambar" accept="image/*" />
                                <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF. Maksimal 2MB.</p>
                                @if($panti && $panti->gambar)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $panti->gambar) }}" alt="Foto Panti" class="w-32 h-32 object-cover rounded">
                                    </div>
                                @endif
                                <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <x-input-label for="deskripsi" :value="__('Deskripsi Panti')" />
                            <textarea id="deskripsi" name="deskripsi" rows="4" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">{{ old('deskripsi', $panti->deskripsi ?? '') }}</textarea>
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button class="ml-3">
                                {{ $panti ? 'Perbarui Data' : 'Simpan Data Panti' }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 