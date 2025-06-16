<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Models\Kategori;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $berita_terkini = Artikel::latest()->take(3)->get();

        $berita_lain = Artikel::latest()->paginate(6);

        $kategori = Kategori::all();

        return view('berita', compact('berita_terkini', 'berita_lain', 'kategori'));
    }

    public function kategori($deskripsi)
    {
        $berita_terkini = Artikel::latest()->with('author')->take(3)->get();
        $berita_lain = Artikel::latest()->paginate(6);
        $kategori = Kategori::where('deskripsi', $deskripsi)->firstOrFail();
        $semuaKategori = Kategori::all();

        return view('berita', [
            'berita_terkini' => $berita_terkini,
            'berita_lain' => $berita_lain,
            'kategori' => $semuaKategori,
            'kategoriAktif' => $kategori // kalau ingin highlight kategori yang sedang dipilih
        ]);
    }

    public function getArtikelByKategori($deskripsi)
    {
        $kategori = Kategori::where('deskripsi', $deskripsi)->firstOrFail();
        $artikel = Artikel::where('id_kategori', $kategori->id)
            ->with('author')
            ->latest()
            ->paginate(6);
        return response()->json($artikel);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        //
        return view('beritas', ['beritas' => $artikel]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
