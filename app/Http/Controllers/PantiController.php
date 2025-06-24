<?php

namespace App\Http\Controllers;

use App\Models\Panti;
use Illuminate\Http\Request;

class PantiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data panti dari database
        $panti = Panti::latest()->get();

        // Kirim data ke view 'daftar-panti'
        return view('daftar-panti', ['semua_panti' => $panti]);
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
    public function show($id)
    {
        $panti = Panti::with('kebutuhan')->findOrFail($id);
        return view('panti.show', compact('panti'));
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

    public function getPantiData()
    {
        $pantis = Panti::all();
        $formattedPanti = $pantis->map(function ($panti) {
            return [
                'id' => $panti->id_panti,
                'nama' => $panti->nama,
                'alamat' => $panti->alamat,
                'kecamatan' => $panti->kecamatan,
                'jumlah_anak' => $panti->jumlah_anak,
                'deskripsi' => $panti->deskripsi,
                'lat' => (float) $panti->latitude,
                'lng' => (float) $panti->longitude,
                'programs' => ['umum'], // Dummy, ganti jika ada relasi program
            ];
        });
        return response()->json($formattedPanti);
    }
}
