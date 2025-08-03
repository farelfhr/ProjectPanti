<?php

namespace App\Http\Controllers;

use App\Models\Panti;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $panti = Panti::latest()->take(5)->get();
        $artikel = Artikel::latest()->take(5)->get();

        $kegiatan_diikuti = [];
        if (Auth::check()) {
            $user = Auth::user();

            /** @var \App\Models\User $user */
            $kegiatan_diikuti = $user->kegiatans()->orderBy('tanggal', 'asc')->get();

            return view('dashboard', [
                'panti' => $panti,
                'artikel' => $artikel,
                'kegiatan_diikuti' => $kegiatan_diikuti,
            ]);
        }

        return view('home');
    }
}
