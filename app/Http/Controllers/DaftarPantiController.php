<?php

namespace App\Http\Controllers;

use App\Models\Panti;
use Illuminate\Http\Request;

class DaftarPantiController extends Controller
{
    public function index(Request $request)
    {
        $query = Panti::latest();

        if ($request->has('search') && $request->input('search') != '') {
            $searchTerm = $request->input('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('nama', 'like', '%' . $searchTerm . '%')
                  ->orWhere('alamat', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($request->has('kecamatan') && $request->input('kecamatan') != 'semua') {
            $kecamatan = $request->input('kecamatan');
            $query->where('kecamatan', $kecamatan);
        }

        $panti = $query->get();

        if ($request->ajax()) {
            return response()->json([
                'panti' => $panti,
                'html' => view('components.panti-grid', compact('panti'))->render()
            ]);
        }

        return view('daftar-panti', compact('panti'));
    }
} 