<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

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
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Contoh validasi gambar
        ]);

        Artikel::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'id_penulis' => auth()->id(),
            'publish_date' => now(),
            'id_kategori' => 1, // Ganti dengan kategori dinamis nanti
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
    public function edit(string $id)
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
        ]);

        $artikel->update($request->all());

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
