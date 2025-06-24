<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Panti;
use App\Models\Kontak;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
       $jumlahArtikel = Artikel::count();
        $jumlahPanti = Panti::count();
        $jumlahPesan = Kontak::count();
        $jumlahUser = User::count();
        $totalPanti = Panti::count();
        $totalArtikel = Artikel::count();
        $totalPesanBaru = Kontak::count();

        $recentPanti = Panti::latest()->take(5)->get()->map(function($item) {
            $item->type = 'panti_baru';
            return $item;
        });

        $recentArtikel = Artikel::latest()->take(5)->get()->map(function($item) {
            $item->type = 'artikel_baru';
            return $item;
        });
        
        $recentKontak = Kontak::latest()->take(5)->get()->map(function($item) {
            $item->type = 'pesan_baru';
            return $item;
        });
        
        $recentActivities = $recentPanti->concat($recentArtikel)->concat($recentKontak)->sortByDesc('created_at')->take(5);

        return view('admin.dashboard', [
            'totalPanti' => $totalPanti,
            'totalArtikel' => $totalArtikel,
            'recentActivities' => $recentActivities,
        ]);

        return view('admin.dashboard', compact('jumlahArtikel', 'jumlahPanti', 'jumlahPesan', 'jumlahUser'));
    }
}
