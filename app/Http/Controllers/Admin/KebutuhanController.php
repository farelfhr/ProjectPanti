<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kebutuhan;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class KebutuhanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validatedData = $request->validate([
            'id_panti' => 'required|exists:panti,id_panti',
            'tipe' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'urgency_level' => 'required|string',
        ]);

        $kebutuhan = Kebutuhan::create($validatedData);
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Tambah Kebutuhan',
            'subject_type' => 'Kebutuhan',
            'subject_id' => $kebutuhan->id,
            'description' => 'Nama: ' . $kebutuhan->nama_kebutuhan,
        ]);

        return back()->with('success', 'Kebutuhan berhasil ditambahkan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kebutuhan $kebutuhan)
    {
        $validatedData = $request->validate([
            'id_panti' => 'required|exists:panti,id_panti',
            'tipe' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'urgency_level' => 'required|string',
        ]);

        $kebutuhan->update($validatedData);
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Edit Kebutuhan',
            'subject_type' => 'Kebutuhan',
            'subject_id' => $kebutuhan->id,
            'description' => 'Nama: ' . $kebutuhan->nama_kebutuhan,
        ]);

        return back()->with('success', 'Kebutuhan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kebutuhan $kebutuhan)
    {
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Hapus Kebutuhan',
            'subject_type' => 'Kebutuhan',
            'subject_id' => $kebutuhan->id,
            'description' => 'Nama: ' . $kebutuhan->nama_kebutuhan,
        ]);
        $kebutuhan->delete();
        return back()->with('success', 'Kebutuhan berhasil dihapus.');
    }
}
