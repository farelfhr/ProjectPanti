<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KontakController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'subjek' => 'required|string', // Ini akan menjadi 'kategori'
            'pesan' => 'required|string',
        ]);

        Kontak::create([
            'id_user' => Auth::id(), // Simpan id user jika login, jika tidak akan null
            'nama_pengirim' => $validatedData['nama'],
            'email_pengirim' => $validatedData['email'],
            'telepon_pengirim' => $validatedData['telepon'],
            'kategori' => $validatedData['subjek'], // Gunakan 'subjek' dari form sebagai 'kategori'
            'subjek' => 'Pesan dari Halaman Kerjasama', // Atau bisa dibuat lebih dinamis
            'konten' => $validatedData['pesan'],
        ]);

        return back()->with('success', 'Pesan Anda telah berhasil dikirim! Terima kasih.');
    }
}
