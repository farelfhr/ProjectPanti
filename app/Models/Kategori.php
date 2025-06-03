<?php

namespace App\Models;

use illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    // Migration 2025_06_03_070942_create_kategori_table.php uses $table->timestamps();

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    /**
     * Get the articles in this category.
     */
    public function artikel(): HasMany
    {
        return $this->hasMany(Artikel::class, 'id_kategori', 'id_kategori');
    }
}
