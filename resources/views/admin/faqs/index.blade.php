@extends('layouts.admin')
@section('title', 'Manajemen FAQ')
@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg">
    <a href="{{ route('admin.faqs.create') }}" class="bg-brand-green hover:bg-brand-green-dark text-white font-bold py-2 px-4 rounded mb-6 inline-block">
        Tambah FAQ Baru
    </a>
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Pertanyaan</th>
                <th class="w-2/3 text-left py-3 px-4 uppercase font-semibold text-sm">Jawaban</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse ($faqs as $faq)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $faq->question }}</td>
                    <td class="py-3 px-4">{{ Str::limit($faq->answer, 100) }}</td>
                    <td class="py-3 px-4 flex gap-2">
                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-xs">Edit</a>
                        <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" onsubmit="return confirm('Yakin hapus FAQ ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center py-4">Tidak ada data FAQ.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">{{ $faqs->links() }}</div>
</div>
@endsection