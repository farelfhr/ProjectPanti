<?php

namespace App\Models;

use illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';
    protected $primaryKey = 'id_media';

    public const TYPE_IMAGE = 'gambar';
    public const TYPE_VIDEO = 'video';

    protected $fillable = [
        'id_panti',
        'id_artikel',
        'id_story',
        'url',
        'type',
    ];
    protected $casts = [
        // 'type' => MediaType::class,
    ];

    /**
     * Get the orphanage this media might belong to.
     */
    public function panti(): BelongsTo
    {
        return $this->belongsTo(Panti::class, 'id_panti', 'id_panti');
    }

    /**
     * Get the article this media might belong to.
     */
    public function artikel(): BelongsTo
    {
        return $this->belongsTo(Artikel::class, 'id_artikel', 'id_artikel');
    }
}
