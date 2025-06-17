<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KerjasamaController extends Controller
{
    public function index(){
        // Ambil semua data kegiatan, faq, urutkan dari yang terbaru
        $kegiatan = Kegiatan::latest()->get();
        $faqs = Faq::latest()->get(); 

        // Kirim data ke view
        return view('kerjasama', compact('kegiatan', 'faqs'));
    }
}
