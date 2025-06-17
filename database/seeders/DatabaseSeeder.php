<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        $this->call([KategoriSeeder::class, UserSeeder::class]);
        Artikel::factory(100)->recycle([
            Kategori::all(),
            User::all()
        ])->create();

        $this->call([
            PantiSeeder::class,
        ]);

        $this->call([KegiatanSeeder::class]);
    }
}
