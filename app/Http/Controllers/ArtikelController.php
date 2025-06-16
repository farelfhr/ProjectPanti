<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Log;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita_terkini = Artikel::latest()->with('author')->take(3)->get();
        $query = Artikel::latest()->with('author');

        if (request('search')) {
            $query->where('judul', 'like', '%' . request('search') . '%');
        }

        $berita_lain = $query->paginate(6);
        $kategori = Kategori::all();

        return view('berita', compact('berita_terkini', 'berita_lain', 'kategori'));
    }

    public function kategori($deskripsi)
    {
        $berita_terkini = Artikel::latest()->with('author')->take(3)->get();
        $kategori = Kategori::where('deskripsi', $deskripsi)->firstOrFail();
        $berita_lain = Artikel::where('id_kategori', $kategori->id_kategori)
            ->with('author')
            ->latest()
            ->paginate(6);
        $semuaKategori = Kategori::all();

        return view('berita', [
            'berita_terkini' => $berita_terkini,
            'berita_lain' => $berita_lain,
            'kategori' => $semuaKategori,
            'kategoriAktif' => $kategori
        ]);
    }

    public function getArtikelByKategori($deskripsi)
    {
        try {
            Log::info("Mencari artikel dengan kategori: " . $deskripsi);
            
            if ($deskripsi === 'semua') {
                $artikel = Artikel::with('author')
                    ->latest()
                    ->paginate(6);
                
                Log::info("Semua artikel ditemukan: " . $artikel->count());
            } else {
                // Cari kategori berdasarkan deskripsi
                $kategori = Kategori::where('deskripsi', $deskripsi)->first();
                
                if (!$kategori) {
                    Log::warning("Kategori tidak ditemukan: " . $deskripsi);
                    return response()->json([
                        'error' => 'Kategori tidak ditemukan',
                        'deskripsi' => $deskripsi,
                        'available_categories' => Kategori::pluck('deskripsi')->toArray()
                    ], 404);
                }
                
                Log::info("Kategori ditemukan: " . $kategori->nama . " (ID: " . $kategori->id_kategori . ")");
                
                $artikel = Artikel::where('id_kategori', $kategori->id_kategori)
                    ->with('author')
                    ->latest()
                    ->paginate(6);
                
                Log::info("Artikel dalam kategori ditemukan: " . $artikel->count());
            }
            
            // Debug response
            $response = $artikel->toArray();
            Log::info("Response data count: " . count($response['data']));
            
            return response()->json($artikel);
            
        } catch (\Exception $e) {
            Log::error("Error in getArtikelByKategori: " . $e->getMessage());
            return response()->json([
                'error' => 'Terjadi kesalahan server',
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
        }
    }

    // Method untuk mendapatkan semua artikel
    public function getAllArtikel()
    {
        try {
            $artikel = Artikel::latest()->with('author')->paginate(6);
            Log::info("getAllArtikel called, found: " . $artikel->count());
            return response()->json($artikel);
        } catch (\Exception $e) {
            Log::error("Error in getAllArtikel: " . $e->getMessage());
            return response()->json([
                'error' => 'Terjadi kesalahan server',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function search(Request $request)
    {
        try {
            $query = $request->query('search', '');
            Log::info("Search query: " . $query);

            $artikel = Artikel::where('judul', 'like', '%' . $query . '%')
                ->with('author')
                ->latest()
                ->paginate(6);

            Log::info("Search results found: " . $artikel->count());

            return response()->json($artikel);
        } catch (\Exception $e) {
            Log::error("Error in search: " . $e->getMessage());
            return response()->json([
                'error' => 'Terjadi kesalahan server',
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
        }
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