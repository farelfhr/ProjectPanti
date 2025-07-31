@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Setup Panti Asuhan') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Flash Messages -->
            @if(session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('status') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#D0D5CB]">
                <div class="p-6 text-gray-900">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold mb-4 text-[#41644A]">Selamat Datang, {{ $user->name }}!</h3>
                        <p class="text-gray-600 mb-6">
                            Untuk menggunakan dashboard panti asuhan, Anda perlu melengkapi informasi panti asuhan terlebih dahulu.
                        </p>
                        @if($user->getPanti())
                            <div class="bg-blue-50 rounded-lg border border-blue-200 p-4 mb-6">
                                <p class="text-blue-800">
                                    <strong>Panti Asuhan:</strong> {{ $user->getPanti()->nama }}
                                </p>
                            </div>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('panti.setup.store') }}" enctype="multipart/form-data" class="max-w-2xl mx-auto">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Panti Asuhan *
                                </label>
                                <input type="text" name="nama" id="nama" required 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#E9762B]"
                                       value="{{ old('nama', $user->getPanti()->nama ?? '') }}">
                                @error('nama')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                                    Alamat Lengkap *
                                </label>
                                <textarea name="alamat" id="alamat" required rows="3"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#E9762B]">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kecamatan *
                                </label>
                                <input type="text" name="kecamatan" id="kecamatan" required 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#E9762B]"
                                       value="{{ old('kecamatan') }}">
                                @error('kecamatan')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nomor Telepon
                                </label>
                                <input type="text" name="phone" id="phone" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#E9762B]"
                                       value="{{ old('phone') }}">
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="jumlah_anak" class="block text-sm font-medium text-gray-700 mb-2">
                                    Jumlah Anak *
                                </label>
                                <input type="number" name="jumlah_anak" id="jumlah_anak" required min="1"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#E9762B]"
                                       value="{{ old('jumlah_anak') }}">
                                @error('jumlah_anak')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="kapasitas" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kapasitas Maksimal *
                                </label>
                                <input type="number" name="kapasitas" id="kapasitas" required min="1"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#E9762B]"
                                       value="{{ old('kapasitas') }}">
                                @error('kapasitas')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="tahun_berdiri" class="block text-sm font-medium text-gray-700 mb-2">
                                    Tahun Berdiri
                                </label>
                                <input type="number" name="tahun_berdiri" id="tahun_berdiri" min="1900" max="{{ date('Y') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#E9762B]"
                                       value="{{ old('tahun_berdiri') }}">
                                @error('tahun_berdiri')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Panti
                                </label>
                                <input type="email" name="email" id="email" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#E9762B]"
                                       value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                                    Deskripsi Panti
                                </label>
                                <textarea name="deskripsi" id="deskripsi" rows="4"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#E9762B]">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                                    Foto Panti
                                </label>
                                <input type="file" name="gambar" id="gambar" accept="image/*"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#E9762B]">
                                <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF. Maksimal 2MB.</p>
                                @error('gambar')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-8 text-center">
                            <button type="submit" 
                                    class="bg-[#E9762B] hover:bg-[#0D4715] text-white font-bold py-3 px-6 rounded-lg transition-colors">
                                Simpan Data Panti
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection 