<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';

    protected $fillable = [
        'judul',
        'konten',
        'gambar',
        'publish_date',
        'id_penulis',
        'id_kategori',
    ];

    protected $casts = [
        'publish_date' => 'date',
    ];

    /**
     * Get the author of the article.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_penulis'); // Merujuk ke model User default Laravel
    }

    /**
     * Get the category of the article.
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    /**
     * Get the media associated with the article.
     */
    public function media(): HasMany
    {
        return $this->hasMany(Media::class, 'id_artikel', 'id_artikel');
    }
}
