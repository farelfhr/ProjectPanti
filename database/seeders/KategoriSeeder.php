<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  
        Kategori::create ([
            'nama' => 'Cerita Inspiratif',
            'deskripsi' => 'cerita-inspiratif'
        ]);

        Kategori::create ([
            'nama' => 'Kebutuhan Panti',
            'deskripsi' => 'kebutuhan-panti'
        ]);

        Kategori::create ([
            'nama' => 'Kegiatan Sosial',
            'deskripsi' => 'kegiatan-sosial'
        ]);

        Kategori::create ([
            'nama' => 'Tips Berdonasi',
            'deskripsi' => 'tips-berdonasi'
        ]);
    }
}
