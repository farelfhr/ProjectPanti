<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KontakController extends Controller
{
    public function store(Request $request){
        if (!auth()->check()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'must_login' => 'Anda harus login terlebih dahulu untuk mengirim pesan. Silakan login untuk melanjutkan.'
                ], 401);
            }
            return back()->withInput()->with('must_login', 'Anda harus login terlebih dahulu untuk mengirim pesan. Silakan login untuk melanjutkan.');
        }
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'subjek' => 'required|string', // Ini akan menjadi 'kategori'
            'pesan' => 'required|string',
        ]);

        $kontak = Kontak::create([
            'id_user' => Auth::id(), // Simpan id user jika login, jika tidak akan null
            'nama_pengirim' => $validatedData['nama'],
            'email_pengirim' => $validatedData['email'],
            'telepon_pengirim' => $validatedData['telepon'],
            'kategori' => $validatedData['subjek'], // Gunakan 'subjek' dari form sebagai 'kategori'
            'subjek' => 'Pesan dari Halaman Kerjasama', // Atau bisa dibuat lebih dinamis
            'konten' => $validatedData['pesan'],
        ]);

        // Log aktivitas
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Kirim Pesan',
            'subject_type' => 'Kontak',
            'subject_id' => $kontak->id_kontak,
            'description' => 'Dari: ' . $validatedData['nama'] . ' - Subjek: ' . $validatedData['subjek'],
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => 'Pesan Anda telah berhasil dikirim! Terima kasih.'
            ]);
        }
        return back()->with('success', 'Pesan Anda telah berhasil dikirim! Terima kasih.');
    }
}
