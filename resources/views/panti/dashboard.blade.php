@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard Panti Asuhan') }}
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

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Welcome Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 border border-[#D0D5CB]">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4 text-[#41644A]">Selamat Datang, {{ $user->name }}!</h3>
                    <p class="text-gray-600">
                        Kelola profil panti asuhan, donasi, dan kebutuhan Anda melalui dashboard ini.
                    </p>
                </div>
            </div>

            <!-- Profile Panti Section -->
            @if($panti)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 border border-[#D0D5CB]">
                <div class="p-6">
                    <h4 class="text-xl font-semibold text-gray-900 mb-4 text-[#41644A]">Profil Panti</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">Nama Panti</p>
                            <p class="font-medium text-gray-900">{{ $panti->nama }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Alamat</p>
                            <p class="font-medium text-gray-900">{{ $panti->alamat }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Jumlah Anak</p>
                            <p class="font-medium text-gray-900">{{ $panti->jumlah_anak }} anak</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Kapasitas</p>
                            <p class="font-medium text-gray-900">{{ $panti->kapasitas }} anak</p>
                        </div>
                    </div>
                    
                    <!-- Latitude Longitude Section -->
                    <div class="mt-4 p-4 bg-blue-50 rounded-lg border border-blue-200">
                        <h5 class="font-medium text-blue-900 mb-2">Koordinat Lokasi</h5>
                        <p class="text-sm text-blue-700 mb-2">
                            Latitude: {{ $panti->latitude ?? 'Belum diatur' }} | 
                            Longitude: {{ $panti->longitude ?? 'Belum diatur' }}
                        </p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm underline">
                            📹 Tutorial: Cara Mengatur Koordinat Lokasi Panti
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#D0D5CB]">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="p-2 bg-green-100 rounded-lg">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm text-gray-600">Total Donasi</p>
                                    <p class="text-2xl font-semibold text-gray-900">{{ $totalDonations }}</p>
                                </div>
                            </div>
                            <a href="{{ route('panti.donations.history') }}" class="text-[#E9762B] hover:text-[#0D4715] text-sm font-medium">
                                Lihat Riwayat →
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#D0D5CB]">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-600">Kebutuhan Aktif</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $urgentNeeds->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#D0D5CB]">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="p-2 bg-purple-100 rounded-lg">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm text-gray-600">Kegiatan</p>
                                    <p class="text-2xl font-semibold text-gray-900">{{ $activities->count() }}</p>
                                </div>
                            </div>
                            <a href="{{ route('panti.activities.history') }}" class="text-[#E9762B] hover:text-[#0D4715] text-sm font-medium">
                                Lihat Riwayat →
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Two Column Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Laporan Donasi Non Tunai -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#D0D5CB]">
                    <div class="p-6">
                        <h4 class="text-xl font-semibold text-gray-900 mb-4 text-[#41644A]">Laporan Donasi Non Tunai</h4>
                        @if($donations->count() > 0)
                            <div class="space-y-3">
                                @foreach($donations as $donation)
                                <div class="border-l-4 border-green-400 pl-4 py-2">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-medium text-gray-900">{{ $donation->user->name }}</p>
                                            <p class="text-sm text-gray-600">{{ $donation->donation_items }}</p>
                                            <p class="text-xs text-gray-500">{{ $donation->created_at->format('d M Y') }}</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs rounded-full 
                                            @if($donation->status === 'completed') bg-green-100 text-green-800
                                            @elseif($donation->status === 'pending') bg-yellow-100 text-yellow-800
                                            @else bg-red-100 text-red-800 @endif">
                                            {{ ucfirst($donation->status) }}
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 text-center py-8">Belum ada donasi non tunai</p>
                        @endif
                    </div>
                </div>

                <!-- Kebutuhan Mendesak -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#D0D5CB]">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="text-xl font-semibold text-gray-900 text-[#41644A]">Kebutuhan Mendesak</h4>
                            <button onclick="openAddNeedModal()" class="bg-[#E9762B] hover:bg-[#0D4715] text-white font-bold py-2 px-4 rounded text-sm transition">
                                Tambah Kebutuhan
                            </button>
                        </div>
                        
                        @if($urgentNeeds->count() > 0)
                            <div class="space-y-3">
                                @foreach($urgentNeeds as $need)
                                <div class="border rounded-lg p-3 hover:bg-gray-50 transition-colors border-[#D0D5CB]">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">
                                            <h5 class="font-medium text-gray-900">{{ $need->nama_kebutuhan }}</h5>
                                            <p class="text-sm text-gray-600 mt-1">{{ Str::limit($need->deskripsi, 100) }}</p>
                                            <div class="flex items-center mt-2 space-x-4">
                                                <span class="text-xs text-gray-500">
                                                    Dibutuhkan: {{ $need->jumlah_dibutuhkan }}
                                                </span>
                                                <span class="px-2 py-1 text-xs rounded-full 
                                                    @if($need->prioritas === 'mendesak') bg-red-100 text-red-800
                                                    @elseif($need->prioritas === 'tinggi') bg-orange-100 text-orange-800
                                                    @elseif($need->prioritas === 'sedang') bg-yellow-100 text-yellow-800
                                                    @else bg-green-100 text-green-800 @endif">
                                                    {{ ucfirst($need->prioritas) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex space-x-2 ml-4">
                                            <button onclick="editNeed({{ $need->id }})" class="text-[#E9762B] hover:text-[#0D4715]">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </button>
                                            <form method="POST" action="{{ route('panti.kebutuhan.delete', $need) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Yakin ingin menghapus kebutuhan ini?')" class="text-red-600 hover:text-red-800">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 text-center py-8">Belum ada kebutuhan yang terdaftar</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Kegiatan Panti -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 border border-[#D0D5CB]">
                <div class="p-6">
                    <h4 class="text-xl font-semibold text-gray-900 mb-4 text-[#41644A]">Kegiatan Panti</h4>
                    @if($activities->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($activities as $activity)
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow border-[#D0D5CB]">
                                <h5 class="font-medium text-gray-900 mb-2">{{ $activity->judul }}</h5>
                                <p class="text-sm text-gray-600 mb-2">{{ Str::limit($activity->deskripsi_singkat, 80) }}</p>
                                <div class="text-xs text-gray-500">
                                    <p>📅 {{ \Carbon\Carbon::parse($activity->tanggal)->format('d M Y') }}</p>
                                    <p>📍 {{ $activity->lokasi }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-8">Belum ada kegiatan yang terdaftar</p>
                    @endif
                </div>
            </div>

            <!-- Logout Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 border border-[#D0D5CB]">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 text-[#41644A]">Keluar dari Akun</h4>
                            <p class="text-sm text-gray-600 mt-1">Klik tombol di bawah untuk keluar dari akun Anda</p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Tambah Kebutuhan -->
    <div id="addNeedModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white border-[#D0D5CB]">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Tambah Kebutuhan Baru</h3>
                <form method="POST" action="{{ route('panti.kebutuhan.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kebutuhan</label>
                        <input type="text" name="nama_kebutuhan" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#E9762B]">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" required rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#E9762B]"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Dibutuhkan</label>
                        <input type="number" name="jumlah_dibutuhkan" required min="1" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#E9762B]">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Prioritas</label>
                        <select name="prioritas" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#E9762B]">
                            <option value="rendah">Rendah</option>
                            <option value="sedang">Sedang</option>
                            <option value="tinggi">Tinggi</option>
                            <option value="mendesak">Mendesak</option>
                        </select>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeAddNeedModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-[#E9762B] text-white rounded-md hover:bg-[#0D4715]">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openAddNeedModal() {
            document.getElementById('addNeedModal').classList.remove('hidden');
        }

        function closeAddNeedModal() {
            document.getElementById('addNeedModal').classList.add('hidden');
        }

        function editNeed(id) {
            // Implementasi edit functionality
            alert('Fitur edit akan segera tersedia');
        }
    </script>
@endsection
