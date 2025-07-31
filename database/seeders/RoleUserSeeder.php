<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Panti;
use App\Models\Donation;
use App\Models\Bookmark;
use App\Models\Artikel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@titikkebaikan.com'],
            [
                'name' => 'Admin Titik Kebaikan',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'is_admin' => true,
            ]
        );

        // Create regular user
        $user = User::firstOrCreate(
            ['email' => 'john@example.com'],
            [
                'name' => 'John Doe',
                'password' => Hash::make('password'),
                'role' => 'user',
                'is_admin' => false,
            ]
        );

        // Create panti user
        $pantiUser = User::firstOrCreate(
            ['email' => 'panti@example.com'],
            [
                'name' => 'Pengurus Panti Asuhan',
                'password' => Hash::make('password'),
                'role' => 'panti',
                'is_admin' => false,
            ]
        );

        // Create panti data for panti user
        $panti = Panti::firstOrCreate(
            ['user_id' => $pantiUser->id],
            [
                'nama' => 'Panti Asuhan Kasih',
                'alamat' => 'Jl. Soekarno Hatta No. 123, Malang',
                'kecamatan' => 'Klojen',
                'phone' => '081234567890',
                'jumlah_anak' => 25,
                'kapasitas' => 30,
                'tahun_berdiri' => 2010,
                'email' => 'panti.kasih@example.com',
                'deskripsi' => 'Panti asuhan yang mengasuh anak-anak yatim piatu dan kurang mampu.',
                'latitude' => -7.983908,
                'longitude' => 112.621391,
            ]
        );

        // Create some donations for the regular user
        Donation::firstOrCreate([
            'user_id' => $user->id,
            'panti_id' => $panti->id_panti,
            'amount' => 100000,
            'type' => 'tunai',
            'status' => 'completed',
            'notes' => 'Donasi untuk kebutuhan makanan',
        ]);

        Donation::firstOrCreate([
            'user_id' => $user->id,
            'panti_id' => $panti->id_panti,
            'amount' => null,
            'type' => 'non-tunai',
            'status' => 'completed',
            'donation_items' => 'Buku pelajaran, alat tulis',
            'notes' => 'Donasi buku dan alat tulis',
        ]);

        // Create some bookmarks for the regular user
        Bookmark::firstOrCreate([
            'user_id' => $user->id,
            'bookmarkable_type' => 'App\Models\Panti',
            'bookmarkable_id' => $panti->id_panti,
        ]);

        // Create some articles for bookmarking
        $artikel = Artikel::firstOrCreate([
            'judul' => 'Pentingnya Pendidikan untuk Anak Panti Asuhan',
        ], [
            'konten' => 'Artikel tentang pentingnya pendidikan untuk anak-anak panti asuhan...',
            'id_penulis' => $admin->id,
            'id_kategori' => 1,
            'gambar' => '/images/PantiStock/berita-populer-1.jpg',
            'publish_date' => now(),
        ]);

        // Only create bookmark if artikel exists and has valid ID
        if ($artikel && $artikel->id) {
            Bookmark::firstOrCreate([
                'user_id' => $user->id,
                'bookmarkable_type' => 'App\Models\Artikel',
                'bookmarkable_id' => $artikel->id,
            ]);
        }

        $this->command->info('Role users created successfully!');
        $this->command->info('Admin: admin@titikkebaikan.com / admin123');
        $this->command->info('User: john@example.com / password');
        $this->command->info('Panti: panti@example.com / password');
    }
}
