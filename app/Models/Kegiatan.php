<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\User;

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
        'id_panti',
        'status'
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

    /**
     * Check if activity is approved
     */
    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    /**
     * Check if activity is pending
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * Check if activity is rejected
     */
    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    /**
     * Get status badge class
     */
    public function getStatusBadgeClassAttribute(): string
    {
        return match ($this->status) {
            'approved' => 'bg-green-100 text-green-800',
            'pending' => 'bg-yellow-100 text-yellow-800',
            'rejected' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800'
        };
    }

    /**
     * Check if activity is upcoming
     */
    public function isUpcoming(): bool
    {
        return $this->tanggal > now();
    }

    /**
     * Check if activity is past
     */
    public function isPast(): bool
    {
        return $this->tanggal < now();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'kegiatan_user',
            'id_user',
            'id_kegiatan',
            'id',
            'id_kegiatan'
        );
    }
}
