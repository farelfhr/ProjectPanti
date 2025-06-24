@extends('layouts.admin')
@section('title', 'Manajemen Panti')
@section('content')
    <div class="bg-white p-4 sm:p-8 rounded-lg shadow-lg">
        <div class="overflow-x-auto">
            <a href="{{ route('admin.panti.create') }}" class="bg-brand-green bg-lime-500 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                Tambah Panti Baru
            </a>
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4">Gambar</th>
                        <th class="text-left py-3 px-4">Nama Panti</th>
                        <th class="text-left py-3 px-4">Email</th>
                        <th class="text-left py-3 px-4">Telepon</th>
                        <th class="text-left py-3 px-4">Pembayaran</th>
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
                            <td class="py-3 px-4">
                                <div class="text-xs">
                                    @if($panti->qr_code)
                                        <div class="flex items-center mb-1">
                                            <svg class="w-4 h-4 text-green-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            QR Code
                                        </div>
                                    @endif
                                    @if($panti->bank_account)
                                        <div class="flex items-center mb-1">
                                            <svg class="w-4 h-4 text-blue-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                            </svg>
                                            Bank
                                        </div>
                                    @endif
                                    @if($panti->whatsapp_number)
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-green-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                            </svg>
                                            WhatsApp
                                        </div>
                                    @endif
                                    @if(!$panti->qr_code && !$panti->bank_account && !$panti->whatsapp_number)
                                        <span class="text-red-500">Belum diatur</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-4 flex gap-2">
                                <a href="{{ route('admin.panti.edit', $panti) }}" class="bg-brand-orange bg-orange-600 text-white font-bold py-1 px-3 rounded text-xs">Edit</a>
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
                            <td colspan="6" class="text-center py-4">Tidak ada data panti.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $pantis->links() }}
        </div>
    </div>
@endsection
