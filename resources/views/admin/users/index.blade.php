@extends('layouts.admin')
@section('title', 'Manajemen Pengguna')
@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg">
    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
            <p>{{ session('error') }}</p>
        </div>
    @endif
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Daftar Pengguna</h2>
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="text-left py-3 px-4">Nama</th>
                <th class="text-left py-3 px-4">Email</th>
                <th class="text-left py-3 px-4">Peran (Role)</th>
                <th class="text-left py-3 px-4">Tanggal Bergabung</th>
                <th class="text-left py-3 px-4">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse ($users as $user)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $user->name }}</td>
                    <td class="py-3 px-4">{{ $user->email }}</td>
                    <td class="py-3 px-4">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->is_admin ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $user->is_admin ? 'Admin' : 'User' }}
                        </span>
                    </td>
                    <td class="py-3 px-4">{{ $user->created_at->format('d M Y') }}</td>
                    <td class="py-3 px-4 flex gap-2">
                        <a href="{{ route('admin.users.edit', $user) }}" class="bg-brand-orange bg-orange-600 text-white font-bold py-1 px-3 rounded text-xs">Edit Role</a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Yakin hapus pengguna ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center py-4">Tidak ada data pengguna.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">{{ $users->links() }}</div>
</div>
@endsection