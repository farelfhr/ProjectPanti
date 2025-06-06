<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'subjek_pesan' => 'required|string',
            'pesan' => 'required|string',
        ]);

        Kontak::create([
            'id_user' => auth()->id(), // Opsional: jika user sudah login
            'subjek' => $validatedData['subjek_pesan'],
            'konten' => $validatedData['pesan'],
            'kategori' => 'lainnya', // Anda bisa sesuaikan ini
            // Pastikan model Kontak Anda memiliki fillable yang sesuai
        ]);

        return back()->with('success', 'Pesan Anda telah berhasil dikirim!');
    }
}
