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

        $this->call([
            KategoriSeeder::class,
            KegiatanSeeder::class,
            PantiSeeder::class,
            UserSeeder::class,
            FaqSeeder::class,
        ]);

        $kategoriList = \App\Models\Kategori::all();
        $userList = \App\Models\User::all();
        foreach ($kategoriList as $kategori) {
            \App\Models\Artikel::factory(2)->create([
                'id_kategori' => $kategori->id_kategori,
                'id_penulis' => $userList->random()->id,
            ]);
        }
    }
}
