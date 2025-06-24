<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Panti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityLog;

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
            'qr_code' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'whatsapp_number' => 'nullable|string|max:20',
            'bank_account' => 'nullable|string|max:50',
            'bank_name' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('panti', 'public');
            $validatedData['gambar'] = $path;
        }

        if ($request->hasFile('qr_code')) {
            $path = $request->file('qr_code')->store('qr-codes', 'public');
            $validatedData['qr_code'] = $path;
        }

        $panti = Panti::create($validatedData);
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Tambah Panti',
            'subject_type' => 'Panti',
            'subject_id' => $panti->id_panti,
            'description' => 'Nama: ' . $panti->nama,
        ]);

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
            'qr_code' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'whatsapp_number' => 'nullable|string|max:20',
            'bank_account' => 'nullable|string|max:50',
            'bank_name' => 'nullable|string|max:100',
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

        if ($request->hasFile('qr_code')) {
            // Hapus QR code lama jika ada
            if ($panti->qr_code) {
                Storage::disk('public')->delete($panti->qr_code);
            }
            // Simpan QR code baru
            $path = $request->file('qr_code')->store('qr-codes', 'public');
            $validatedData['qr_code'] = $path;
        }

        $panti->update($validatedData);
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Edit Panti',
            'subject_type' => 'Panti',
            'subject_id' => $panti->id_panti,
            'description' => 'Nama: ' . $panti->nama,
        ]);

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

        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Hapus Panti',
            'subject_type' => 'Panti',
            'subject_id' => $panti->id_panti,
            'description' => 'Nama: ' . $panti->nama,
        ]);
        $panti->delete();
        return redirect()->route('admin.panti.index')->with('success', 'Data panti berhasil dihapus.');
    }
}
