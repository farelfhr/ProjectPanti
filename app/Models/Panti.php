<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Panti extends Model
{
    //
    use HasFactory;

    protected $table = 'panti';
    protected $primaryKey = 'id_panti';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'alamat',
        'latitude',
        'longitude',
        'phone',
        'email',
        'social_media_url',
        'gambar',
        'kecamatan',
        'jumlah_anak',
        'kapasitas',
        'tahun_berdiri',
        'deskripsi',
        'qr_code',
        'whatsapp_number',
        'bank_account',
        'bank_name',
        'user_id' // Tambahkan user_id untuk relasi dengan User
    ];

    /**
     * Get the user that manages this panti.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function kebutuhan(): HasMany
    {
        return $this->hasMany(Kebutuhan::class, 'id_panti', 'id_panti');
    }

    public function media(): HasMany
    {
        // Assuming a Media item can belong to an Orphanage
        // The media migration has id_panti
        return $this->hasMany(Media::class, 'id_panti', 'id_panti');
    }

    /**
     * Get the donations received by this panti.
     */
    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class, 'panti_id', 'id_panti');
    }

    /**
     * Get the activities organized by this panti.
     */
    public function activities(): HasMany
    {
        return $this->hasMany(Kegiatan::class, 'id_panti', 'id_panti');
    }
}
