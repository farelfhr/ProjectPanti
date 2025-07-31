<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';

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
        'id_panti', // Tambahkan id_panti untuk relasi
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Get the panti that organized this activity.
     */
    public function panti(): BelongsTo
    {
        return $this->belongsTo(Panti::class, 'id_panti', 'id_panti');
    }

    /**
     * Get the nama_kegiatan attribute (alias for judul).
     */
    public function getNamaKegiatanAttribute(): string
    {
        return $this->judul;
    }

    /**
     * Get the tanggal_kegiatan attribute (alias for tanggal).
     */
    public function getTanggalKegiatanAttribute(): string
    {
        return $this->tanggal;
    }

    /**
     * Get the deskripsi attribute (alias for deskripsi_singkat).
     */
    public function getDeskripsiAttribute(): string
    {
        return $this->deskripsi_singkat;
    }
}
