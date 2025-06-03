<?php

namespace App\Models;

use illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\BelongsTo;

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
