<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Panti;
use App\Models\Kontak;
use App\Models\User;
use App\Models\ActivityLog;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $jumlahArtikel = Artikel::count();
        $jumlahPanti = Panti::count();
        $jumlahPesan = Kontak::count();
        $jumlahUser = User::count();

        // Panti dan kegiatan yang menunggu persetujuan
        $pendingPanti = Panti::where('status', 'pending')->count();
        $pendingKegiatan = Kegiatan::where('status', 'pending')->count();
        
        // Daftar panti pending
        $pantiPendingList = Panti::where('status', 'pending')
                                ->with('user')
                                ->latest()
                                ->take(5)
                                ->get();
        
        // Daftar kegiatan pending
        $kegiatanPendingList = Kegiatan::where('status', 'pending')
                                      ->with('panti')
                                      ->latest()
                                      ->take(5)
                                      ->get();

        $recentActivities = ActivityLog::latest()->limit(10)->get();

        return view('admin.dashboard', compact(
            'jumlahArtikel', 
            'jumlahPanti', 
            'jumlahPesan', 
            'jumlahUser', 
            'pendingPanti',
            'pendingKegiatan',
            'pantiPendingList',
            'kegiatanPendingList',
            'recentActivities'
        ));
    }
}
