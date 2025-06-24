<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = Kegiatan::latest()->paginate(10);
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'pembicara' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul_modal' => 'required|string|max:255',
            'deskripsi_panjang' => 'required|string',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('kegiatan', 'public');
            $validated['gambar'] = $path;
        }

        $kegiatan = Kegiatan::create($validated);
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Tambah Kegiatan',
            'subject_type' => 'Kegiatan',
            'subject_id' => $kegiatan->id_kegiatan,
            'description' => 'Nama: ' . $kegiatan->judul,
        ]);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'pembicara' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul_modal' => 'required|string|max:255',
            'deskripsi_panjang' => 'required|string',
        ]);

        if ($request->hasFile('gambar')) {
            if ($kegiatan->gambar) {
                Storage::disk('public')->delete($kegiatan->gambar);
            }
            $path = $request->file('gambar')->store('kegiatan', 'public');
            $validated['gambar'] = $path;
        }

        $kegiatan->update($validated);
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Edit Kegiatan',
            'subject_type' => 'Kegiatan',
            'subject_id' => $kegiatan->id_kegiatan,
            'description' => 'Nama: ' . $kegiatan->judul,
        ]);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        if ($kegiatan->gambar) {
            Storage::disk('public')->delete($kegiatan->gambar);
        }
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Hapus Kegiatan',
            'subject_type' => 'Kegiatan',
            'subject_id' => $kegiatan->id_kegiatan,
            'description' => 'Nama: ' . $kegiatan->judul,
        ]);
        $kegiatan->delete();
        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
