<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Panti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PantiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pantis = Panti::latest()->paginate(10);
        return view('admin.panti.index', compact('pantis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.panti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kecamatan' => 'required|string|max:255',
            'latitude' => 'nullable|numeric|between:-90,90', 
            'longitude' => 'nullable|numeric|between:-180,180', 
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:panti,email',
            'social_media_url' => 'nullable|url',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('panti', 'public');
            $validatedData['gambar'] = $path;
        }

        Panti::create($validatedData);

        return redirect()->route('admin.panti.index')->with('success', 'Data panti berhasil ditambahkan.');
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
    public function edit(Panti $panti)
    {
        $panti->load('kebutuhan');
        return view('admin.panti.edit', compact('panti'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Panti $panti)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kecamatan' => 'required|string|max:255',
            'latitude' => 'nullable|numeric|between:-90,90', 
            'longitude' => 'nullable|numeric|between:-180,180', 
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:panti,email,' . $panti->id_panti . ',id_panti',
            'social_media_url' => 'nullable|url',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($panti->gambar) {
                Storage::disk('public')->delete($panti->gambar);
            }
            // Simpan gambar baru
            $path = $request->file('gambar')->store('panti', 'public');
            $validatedData['gambar'] = $path;
        }

        $panti->update($validatedData);

        return redirect()->route('admin.panti.index')->with('success', 'Data panti berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panti $panti)
    {
        if ($panti->gambar) {
            Storage::disk('public')->delete($panti->gambar);
        }

        $panti->delete();
        return redirect()->route('admin.panti.index')->with('success', 'Data panti berhasil dihapus.');
    }
}
