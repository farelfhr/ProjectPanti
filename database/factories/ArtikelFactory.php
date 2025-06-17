<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'images/PantiStock/1.jpg',
            'images/PantiStock/2.jpg',
            'images/PantiStock/3.jpg',
            'images/PantiStock/4.jpg',
            'images/PantiStock/5.jpg',
            'images/PantiStock/6.webp',
            'images/PantiStock/7.jpg',
            'images/PantiStock/berita-populer-1.jpg',
            'images/PantiStock/berita-populer-2.jpg',
            'images/PantiStock/berita-terkini.jpg',
            'images/PantiStock/panti-asuhan.jpg',
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
