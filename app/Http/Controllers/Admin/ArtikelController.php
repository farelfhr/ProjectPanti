<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['judul', 'konten']);
        $data['id_penulis'] = auth()->id();
        $data['publish_date'] = now();
        $data['id_kategori'] = 1;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('artikel', 'public');
            $data['gambar'] = $path;
        }

        Artikel::create($data);

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
        return view('admin.artikel.edit', compact('artikel'));
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

        //$artikel->update($request->all());
        $artikel->update($data);

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
        
        $artikel->delete();
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
