<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'judul',
        'pembicara',
        'tanggal',
        'waktu',
        'lokasi',
        'deskripsi_singkat',
        'gambar',
        'judul_modal',
        'deskripsi_panjang',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
