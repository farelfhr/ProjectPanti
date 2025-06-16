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
        $artikel = Artikel::latest()->with(['kategori', 'author'])->paginate(9);
        $kategori = Kategori::all();

        $beritaTerkini = Artikel::with('author') // pastikan relasi 'author' udah ada
        ->latest('publish_date')
        ->take(3)
        ->get();

        return view('berita', [
            'berita' => $artikel,
            'kategori' => $kategori
        ], compact('beritaTerkini'));
    }

    public function kategori($deskripsi)
    {
        $kategori = Kategori::where('deskripsi', $deskripsi)->firstOrFail();
        $artikel = $kategori->artikel()->latest()->with(['kategori', 'author'])->paginate(9);
        $semuaKategori = Kategori::all();

        return view('berita', [
            'berita' => $artikel,
            'kategori' => $semuaKategori,
            'kategoriAktif' => $kategori // kalau ingin highlight kategori yang sedang dipilih
        ]);
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
