<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    /**
     * Menangani permintaan user untuk mengikuti sebuah kegiatan.
     * Method ini dipanggil oleh route: POST /kegiatan/{kegiatan}/follow
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\JsonResponse
     */
    public function follow(Kegiatan $kegiatan)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda harus login terlebih dahulu.'
            ], 401);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Cek apakah user sudah mengikuti kegiatan ini
        $isFollowing = $user->kegiatans()->where('kegiatan_user.id_kegiatan', $kegiatan->id_kegiatan)->exists();

        if ($isFollowing) {
            return response()->json([
                'status' => 'already_followed',
                'message' => 'Anda sudah mengikuti acara ini.'
            ], 409);
        }

        try {
            // Tambahkan relasi di tabel pivot
            $user->kegiatans()->attach($kegiatan->id_kegiatan);

            // Muat relasi panti agar bisa dikirim kembali ke frontend
            $kegiatan->load('panti');

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengikuti acara! Acara telah ditambahkan ke dashboard Anda.',
                'kegiatan' => $kegiatan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengikuti acara. Silakan coba lagi.'
            ], 500);
        }
    }
}
