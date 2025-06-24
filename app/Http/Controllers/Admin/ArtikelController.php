<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityLog;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikels = Artikel::latest()->paginate(10);
        return view('admin.artikel.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = \App\Models\Kategori::all();
        return view('admin.artikel.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);

        $data = $request->only(['judul', 'konten', 'id_kategori']);
        $data['id_penulis'] = auth()->id();
        $data['publish_date'] = now();

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('artikel', 'public');
            $data['gambar'] = $path;
        }

        $artikel = Artikel::create($data);
        dd('masuk logging', auth()->user());
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Tambah Artikel',
            'subject_type' => 'Artikel',
            'subject_id' => $artikel->id,
            'description' => 'Judul: ' . $artikel->judul,
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        $kategoris = \App\Models\Kategori::all();
        return view('admin.artikel.edit', compact('artikel', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['judul', 'konten']);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            // Simpan gambar baru
            $path = $request->file('gambar')->store('artikel', 'public');
            $data['gambar'] = $path;
        }

        $artikel->update($data);
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Edit Artikel',
            'subject_type' => 'Artikel',
            'subject_id' => $artikel->id,
            'description' => 'Judul: ' . $artikel->judul,
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        if ($artikel->gambar) {
            Storage::disk('public')->delete($artikel->gambar);
        }
        
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Hapus Artikel',
            'subject_type' => 'Artikel',
            'subject_id' => $artikel->id,
            'description' => 'Judul: ' . $artikel->judul,
        ]);
        $artikel->delete();
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
