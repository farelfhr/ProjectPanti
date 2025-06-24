<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artikel>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gambar = [
            'artikel/1.jpg',
            'artikel/2.jpg',
            'artikel/3.jpg',
            'artikel/4.jpg',
            'artikel/5.jpg',
            'artikel/6.webp',
            'artikel/7.jpg',
            'artikel/berita-populer-1.jpg',
            'artikel/berita-populer-2.jpg',
            'artikel/berita-terkini.jpg',
            'artikel/panti-asuhan.jpg',
        ];

        return [
            'judul' => fake()->sentence(),
            'konten' => fake()->text(),
            'gambar' => fake()->randomElement($gambar),
            'publish_date' => now(),
            'id_penulis' => User::factory(),
            'id_kategori' => Kategori::factory(),
        ];
    }
}
