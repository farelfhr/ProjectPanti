<?php

namespace App\Models;

use illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\HasMany;

class Panti extends Model
{
    //
    use HasFactory;

    protected $table = 'panti';
    protected $primaryKey = 'id_panti';

    const UPDATED_AT = null;
    protected $fillable = [
        'nama',
        'alamat',
        'phone',
        'email',
        'social_media_url',
    ];

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
}
