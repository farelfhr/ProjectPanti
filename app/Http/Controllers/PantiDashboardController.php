<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Kebutuhan;
use App\Models\Kegiatan;
use App\Models\Panti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PantiDashboardController extends Controller
{
    /**
     * Display the panti dashboard.
     */
    public function index(): View
    {
        $user = Auth::user();
        
        // Cek apakah user memiliki data panti
        if (!$user->hasPanti()) {
            // Jika user panti belum memiliki data panti, redirect ke halaman setup
            return view('panti.setup', compact('user'));
        }
        
        $panti = $user->getPanti();
        
        // Statistik donasi non-tunai untuk panti ini
        $donations = $panti->donations()
                          ->where('type', 'non-tunai')
                          ->with('user')
                          ->latest()
                          ->take(10)
                          ->get();
        
        $totalDonations = $panti->donations()
                               ->where('status', 'completed')
                               ->count();
        
        // Kebutuhan mendesak
        $urgentNeeds = $panti->kebutuhan()
                            ->latest()
                            ->take(5)
                            ->get();
        
        // Kegiatan yang diselenggarakan panti
        $activities = $panti->activities()
                           ->latest()
                           ->take(5)
                           ->get();
        
        return view('panti.dashboard', compact(
            'user',
            'panti',
            'donations',
            'totalDonations',
            'urgentNeeds',
            'activities'
        ));
    }

    /**
     * Store a new kebutuhan (need) for the panti.
     */
    public function storeKebutuhan(Request $request)
    {
        $request->validate([
            'nama_kebutuhan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jumlah_dibutuhkan' => 'required|integer|min:1',
            'prioritas' => 'required|in:rendah,sedang,tinggi,mendesak',
        ]);

        $user = Auth::user();
        $panti = $user->getPanti();

        if (!$panti) {
            return redirect()->route('panti.dashboard')->with('error', 'Data panti tidak ditemukan!');
        }

        Kebutuhan::create([
            'id_panti' => $panti->id_panti,
            'nama_kebutuhan' => $request->nama_kebutuhan,
            'deskripsi' => $request->deskripsi,
            'jumlah_dibutuhkan' => $request->jumlah_dibutuhkan,
            'jumlah_terpenuhi' => 0,
            'prioritas' => $request->prioritas,
            'status' => 'aktif',
        ]);

        return redirect()->route('panti.dashboard')->with('success', 'Kebutuhan berhasil ditambahkan!');
    }

    /**
     * Update a kebutuhan.
     */
    public function updateKebutuhan(Request $request, Kebutuhan $kebutuhan)
    {
        $request->validate([
            'nama_kebutuhan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jumlah_dibutuhkan' => 'required|integer|min:1',
            'prioritas' => 'required|in:rendah,sedang,tinggi,mendesak',
        ]);

        $user = Auth::user();
        $panti = $user->getPanti();

        // Pastikan kebutuhan milik panti yang sedang login
        if ($kebutuhan->id_panti !== $panti->id_panti) {
            abort(403, 'Unauthorized action.');
        }

        $kebutuhan->update([
            'nama_kebutuhan' => $request->nama_kebutuhan,
            'deskripsi' => $request->deskripsi,
            'jumlah_dibutuhkan' => $request->jumlah_dibutuhkan,
            'prioritas' => $request->prioritas,
        ]);

        return redirect()->route('panti.dashboard')->with('success', 'Kebutuhan berhasil diperbarui!');
    }

    /**
     * Delete a kebutuhan.
     */
    public function deleteKebutuhan(Kebutuhan $kebutuhan)
    {
        $user = Auth::user();
        $panti = $user->getPanti();

        // Pastikan kebutuhan milik panti yang sedang login
        if ($kebutuhan->id_panti !== $panti->id_panti) {
            abort(403, 'Unauthorized action.');
        }

        $kebutuhan->delete();
        return redirect()->route('panti.dashboard')->with('success', 'Kebutuhan berhasil dihapus!');
    }

    /**
     * Show the panti setup form.
     */
    public function setup(): View
    {
        $user = Auth::user();
        return view('panti.setup', compact('user'));
    }

    /**
     * Store the panti setup data.
     */
    public function storeSetup(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kecamatan' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'jumlah_anak' => 'required|integer|min:1',
            'kapasitas' => 'required|integer|min:1',
            'tahun_berdiri' => 'nullable|integer|min:1900|max:' . date('Y'),
            'email' => 'nullable|email|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $panti = $user->getPanti();

        // Handle file upload
        $gambarPath = $panti->gambar ?? null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('panti', 'public');
        }

        // Update panti data if exists, otherwise create new
        if ($panti) {
            $panti->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'kecamatan' => $request->kecamatan,
                'phone' => $request->phone,
                'jumlah_anak' => $request->jumlah_anak,
                'kapasitas' => $request->kapasitas,
                'tahun_berdiri' => $request->tahun_berdiri,
                'email' => $request->email,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambarPath,
            ]);
        } else {
            // Create panti record
            Panti::create([
                'user_id' => $user->id,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'kecamatan' => $request->kecamatan,
                'phone' => $request->phone,
                'jumlah_anak' => $request->jumlah_anak,
                'kapasitas' => $request->kapasitas,
                'tahun_berdiri' => $request->tahun_berdiri,
                'email' => $request->email,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambarPath,
            ]);
        }

        return redirect()->route('panti.dashboard')->with('success', 'Data panti berhasil disimpan!');
    }
}
