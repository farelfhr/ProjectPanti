<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    // Endpoint API: /api/kegiatan
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return response()->json($kegiatan);
    }
} 