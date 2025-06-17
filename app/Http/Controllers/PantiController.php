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
            // Placeholder values for 'programs' and 'yearlyData'
            // Adjust these based on your actual data structure if needed
            $programs = ['umum']; // Example placeholder
            $yearlyData = ['2020' => $panti->jumlah_anak, '2021' => $panti->jumlah_anak, '2022' => $panti->jumlah_anak, '2023' => $panti->jumlah_anak, '2024' => $panti->jumlah_anak]; // Example placeholder

            return [
                'id' => $panti->id_panti,
                'name' => $panti->nama,
                'children' => $panti->jumlah_anak,
                'programs' => $programs,
                'city' => $panti->alamat, // Using alamat as city for simplicity
                'stories' => $panti->deskripsi,
                'lat' => (float) $panti->latitude,
                'lng' => (float) $panti->longitude,
                'yearlyData' => $yearlyData,
            ];
        });

        return response()->json($formattedPanti);
    }
}
