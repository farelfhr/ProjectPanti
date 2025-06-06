<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kebutuhan extends Model
{
    use HasFactory;

    protected $table = 'kebutuhan';
    protected $primaryKey = 'id_kebutuhan';

    // Migration 2025_06_03_070455_create_kebutuhan_table.php only has created_at
    const UPDATED_AT = null;

    protected $fillable = [
        'id_panti',
        'tipe',
        'deskripsi',
        'urgency_level',
    ];

    /**
     * Get the orphanage that owns the need.
     */
    public function panti(): BelongsTo
    {
        return $this->belongsTo(Panti::class, 'id_panti', 'id_panti');
    }
}
