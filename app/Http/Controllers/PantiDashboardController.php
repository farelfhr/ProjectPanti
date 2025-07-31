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
    public function index()
    {
        $user = Auth::user();
        $panti = $user->getPanti();

        // Jika data panti belum ada, redirect ke setup
        if (!$panti) {
            return redirect()->route('panti.setup')->with('warning', 'Silakan lengkapi data panti Anda.');
        }

        // Jika status pending, tampilkan warning di dashboard
        if ($panti->isPending()) {
            session()->flash('warning', 'Data panti Anda sedang menunggu persetujuan admin.');
        }
        if ($panti->isRejected()) {
            session()->flash('error', 'Data panti Anda ditolak. Silakan perbaiki dan kirim ulang.');
        }

        // Statistik donasi untuk panti ini
        $donations = $panti->donations()
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
        
        // Data untuk chart donasi per bulan
        $donationChartData = $this->getDonationChartData($panti);
        
        return view('panti.dashboard', compact(
            'user',
            'panti',
            'donations',
            'totalDonations',
            'urgentNeeds',
            'activities',
            'donationChartData'
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
        $panti = $user->getPanti();
        return view('panti.setup', compact('user', 'panti'));
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
                'status' => 'pending', // Reset status to pending for admin review
            ]);
        } else {
            // Create panti record
            $pantiData = [
                'user_id' => $user->id,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'kecamatan' => $request->kecamatan,
                'phone' => $request->phone,
                'jumlah_anak' => $request->jumlah_anak,
                'kapasitas' => $request->kapasitas,
                'tahun_berdiri' => $request->tahun_berdiri,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambarPath,
                'status' => 'pending',
            ];
            
            // Only add email if it's provided
            if ($request->filled('email')) {
                $pantiData['email'] = $request->email;
            }
            
            Panti::create($pantiData);
        }

        return redirect()->route('panti.dashboard')->with('success', 'Data panti berhasil disimpan!');
    }

    /**
     * Show donation history with filters
     */
    public function donationsHistory(Request $request): View
    {
        $user = Auth::user();
        $panti = $user->getPanti();
        
        if (!$panti) {
            return redirect()->route('panti.setup');
        }

        $query = $panti->donations()->with('user');

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by date range
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $donations = $query->latest()->paginate(15);
        
        // Chart data
        $donationChartData = $this->getDonationChartData($panti);

        return view('panti.donations-history', compact('donations', 'donationChartData'));
    }

    /**
     * Get donation chart data for the last 12 months
     */
    private function getDonationChartData(Panti $panti): array
    {
        $months = [];
        $cashData = [];
        $nonCashData = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthName = $date->format('M Y');
            $months[] = $monthName;

            // Cash donations
            $cashTotal = $panti->donations()
                ->where('type', 'tunai')
                ->where('status', 'completed')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->sum('amount');
            $cashData[] = $cashTotal;

            // Non-cash donations count
            $nonCashCount = $panti->donations()
                ->where('type', 'non-tunai')
                ->where('status', 'completed')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
            $nonCashData[] = $nonCashCount;
        }

        return [
            'months' => $months,
            'cash' => $cashData,
            'nonCash' => $nonCashData
        ];
    }

    /**
     * Show activities history
     */
    public function activitiesHistory(): View
    {
        $user = Auth::user();
        $panti = $user->getPanti();
        
        if (!$panti) {
            return redirect()->route('panti.setup');
        }

        $activities = $panti->activities()
                           ->latest()
                           ->paginate(15);

        return view('panti.activities-history', compact('activities'));
    }

    /**
     * Confirm a donation
     */
    public function confirmDonation(Donation $donation)
    {
        $user = Auth::user();
        $panti = $user->getPanti();
        
        // Ensure the donation belongs to this panti
        if ($donation->panti_id !== $panti->id_panti) {
            abort(403, 'Unauthorized action.');
        }

        $donation->update(['status' => 'completed']);

        return redirect()->back()->with('success', 'Donasi berhasil dikonfirmasi.');
    }

    /**
     * Reject a donation
     */
    public function rejectDonation(Donation $donation)
    {
        $user = Auth::user();
        $panti = $user->getPanti();
        
        // Ensure the donation belongs to this panti
        if ($donation->panti_id !== $panti->id_panti) {
            abort(403, 'Unauthorized action.');
        }

        $donation->update(['status' => 'cancelled']);

        return redirect()->back()->with('success', 'Donasi berhasil ditolak.');
    }

    /**
     * Export donations to CSV
     */
    public function exportDonations(Request $request)
    {
        $user = Auth::user();
        $panti = $user->getPanti();
        
        if (!$panti) {
            return redirect()->route('panti.setup');
        }

        $query = $panti->donations()->with('user');

        // Apply filters
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $donations = $query->latest()->get();

        $filename = 'donasi_panti_' . str_replace(' ', '_', $panti->nama) . '_' . date('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($donations) {
            $file = fopen('php://output', 'w');
            
            // Add BOM for UTF-8
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Headers
            fputcsv($file, [
                'Tanggal',
                'Nama Donatur',
                'Jenis Donasi',
                'Jumlah/Item',
                'Status',
                'Catatan',
                'Email Donatur'
            ]);

            // Data
            foreach ($donations as $donation) {
                fputcsv($file, [
                    $donation->created_at->format('d/m/Y H:i'),
                    $donation->user->name ?? 'Anonim',
                    ucfirst($donation->type),
                    $donation->type == 'tunai' 
                        ? 'Rp ' . number_format($donation->amount, 0, ',', '.')
                        : ($donation->donation_items ?? 'Item'),
                    ucfirst($donation->status),
                    $donation->notes ?? '-',
                    $donation->user->email ?? '-'
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
