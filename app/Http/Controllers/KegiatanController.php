<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        // Validasi: Hanya larang kegiatan yang explicitly rejected
        // Pending dan approved boleh diikuti
        if ($kegiatan->status === 'rejected') {
            return response()->json([
                'status' => 'error',
                'message' => 'Kegiatan ini tidak tersedia untuk diikuti.'
            ], 400);
        }

        // Cek apakah kegiatan masih akan datang
        if ($kegiatan->isPast()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kegiatan ini sudah berakhir.'
            ], 400);
        }

        try {
            // Gunakan database transaction untuk memastikan konsistensi data
            DB::beginTransaction();

            // Cek apakah user sudah mengikuti kegiatan ini dengan lock
            $isFollowing = $user->kegiatans()
                ->where('kegiatan_user.id_kegiatan', $kegiatan->id_kegiatan)
                ->lockForUpdate()
                ->exists();

            if ($isFollowing) {
                DB::rollBack();
                return response()->json([
                    'status' => 'already_followed',
                    'message' => 'Anda sudah mengikuti acara ini.'
                ], 409);
            }

            // Tambahkan relasi di tabel pivot
            $user->kegiatans()->attach($kegiatan->id_kegiatan);

            DB::commit();

            // Muat relasi panti agar bisa dikirim kembali ke frontend
            $kegiatan->load('panti');

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengikuti acara! Acara telah ditambahkan ke dashboard Anda.',
                'kegiatan' => $kegiatan
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error following kegiatan: ' . $e->getMessage(), [
                'user_id' => $user->id,
                'kegiatan_id' => $kegiatan->id_kegiatan,
                'kegiatan_status' => $kegiatan->status
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengikuti acara. Silakan coba lagi.'
            ], 500);
        }
    }

    /**
     * Menangani permintaan user untuk berhenti mengikuti sebuah kegiatan.
     * Method ini dipanggil oleh route: DELETE /kegiatan/{kegiatan}/unfollow
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\JsonResponse
     */
    public function unfollow(Kegiatan $kegiatan)
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

        try {
            // Hapus relasi di tabel pivot
            $detached = $user->kegiatans()->detach($kegiatan->id_kegiatan);

            if ($detached) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Berhasil berhenti mengikuti acara.'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda belum mengikuti acara ini.'
                ], 404);
            }
        } catch (\Exception $e) {
            Log::error('Error unfollowing kegiatan: ' . $e->getMessage(), [
                'user_id' => $user->id,
                'kegiatan_id' => $kegiatan->id_kegiatan
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat berhenti mengikuti acara. Silakan coba lagi.'
            ], 500);
        }
    }

    /**
     * Mendapatkan status apakah user sudah mengikuti kegiatan tertentu
     * 
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkFollowStatus(Kegiatan $kegiatan)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => 'not_authenticated',
                'is_following' => false
            ]);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $isFollowing = $user->kegiatans()
            ->where('kegiatan_user.id_kegiatan', $kegiatan->id_kegiatan)
            ->exists();

        return response()->json([
            'status' => 'success',
            'is_following' => $isFollowing
        ]);
    }
}
