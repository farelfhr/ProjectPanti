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
        
        return view('admin.dashboard', compact('jumlahArtikel', 'jumlahPanti', 'jumlahPesan', 'jumlahUser'));
    }
}
