<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontak';
    protected $primaryKey = 'id_kontak';

    const UPDATED_AT = null;

    public const KATEGORI_KRITIK = 'kritik';
    public const KATEGORI_SARAN = 'saran';
    public const KATEGORI_LAINNYA = 'lainnya';

    protected $fillable = [
        'id_user',
        'nama_pengirim',
        'email_pengirim',
        'telepon_pengirim',
        'subjek',
        'konten',
        'kategori',
    ];

    
    protected $casts = [
        // 'kategori' => ContactCategory::class, // Baris ini dihapus atau dikomentari
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
