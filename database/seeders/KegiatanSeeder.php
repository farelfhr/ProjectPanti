<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        Kegiatan::create([
            'judul' => 'Pengabdian Masyarakat',
            'pembicara' => 'Ferdi Dwana',
            'tanggal' => now(),
            'waktu' => '09:00 - 10:30',
            'lokasi' => 'Gedung B11',
            'deskripsi_singkat' => 'Penyelenggaraan Bantuan Sembako oleh Pihak Universitas Negeri Malang.',
            'gambar' => '/images/PantiStock/1.jpg',
            'judul_modal' => 'Pengadaan Sembako',
            'deskripsi_panjang' => 'SMA Negeri 8 Kota Malang mengadakan Kegiatan Bantuan Sosial sebagai Bentuk Kepedulian.'
        ]);

        Kegiatan::create([
            'judul' => 'Pengadaan Bantuan Sosial',
            'pembicara' => 'Reyhan Akbar',
            'tanggal' => now(),
            'waktu' => '09:00 - 10:30',
            'lokasi' => 'Gedung B11',
            'deskripsi_singkat' => 'Kolaborasi untuk memberikan bantuan sosial kepada anak-anak panti asuhan.',
            'gambar' => '/images/PantiStock/2.jpg',
            'judul_modal' => 'Bantuan Pemerintah',
            'deskripsi_panjang' => 'Kegiatan ini diselenggarakan oleh pemerintah kota untuk mendukung kesejahteraan anak.'
        ]);

        Kegiatan::create([
            'judul' => 'Pemeriksaan Kesehatan Gratis',
            'pembicara' => 'Farel Fathir',
            'tanggal' => now(),
            'waktu' => '09:00 - 10:30',
            'lokasi' => 'Gedung B11',
            'deskripsi_singkat' => 'Pemeriksaan kesehatan gratis untuk anak-anak panti asuhan.',
            'gambar' => '/images/PantiStock/3.jpg',
            'judul_modal' => 'Agenda Kementerian Kesehatan',
            'deskripsi_panjang' => 'Kementerian Kesehatan menyelenggarakan pemeriksaan kesehatan gratis.'
        ]);
    }
}
