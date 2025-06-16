<?php

namespace App\Http\Controllers;

use App\Models\Panti;
use Illuminate\Http\Request;

class DaftarPantiController extends Controller
{
    public function index()
    {
        $panti = Panti::all();
        return view('daftar-panti', compact('panti'));
    }
} 