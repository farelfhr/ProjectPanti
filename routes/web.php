<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PantiController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\PantiController as AdminPantiController;
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController;
use App\Http\Controllers\Admin\KebutuhanController as AdminKebutuhanController;
use App\Http\Controllers\Admin\KontakController as AdminKontakController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/berita', function () {
//     return view('berita', ['berita' => [
//         [
//             'id' => '1',
//             'gambar' => '/images/PantiStock/1.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam minus aperiam vero optio. Quasi hic voluptates dolor ratione eveniet, iure nisi earum. Adipisci, aliquid omnis. Minima esse id fuga aut?'
//         ],
//         [
//             'id' => '2',
//             'gambar' => '/images/PantiStock/2.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo nulla doloremque ratione sit vel eaque atque repudiandae perspiciatis voluptates, explicabo id soluta tempora praesentium facilis nostrum ullam pariatur temporibus? Omnis?'
//         ],
//         [
//             'id' => '3',
//             'gambar' => '/images/PantiStock/3.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit eaque dolores delectus quidem autem tempore officia asperiores qui culpa non, animi, soluta, aspernatur facilis aliquid praesentium distinctio iure provident quae!'
//         ],
//         [
//             'id' => '4',
//             'gambar' => '/images/PantiStock/4.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore sapiente quibusdam, aperiam eveniet commodi nisi iste eum rem fugiat odio, adipisci quae, facere suscipit iure a consequuntur possimus. Iste, porro?'
//         ],
//         [
//             'id' => '5',
//             'gambar' => '/images/PantiStock/5.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias ex quibusdam, quaerat repellat impedit neque quo. Animi dolores quis veniam. Ipsum sapiente, consequatur enim nam quaerat vero corrupti modi nulla!'
//         ],
//         [
//             'id' => '6',
//             'gambar' => '/images/PantiStock/6.webp',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus quas, accusantium quo suscipit deleniti voluptatum, ab assumenda doloribus asperiores optio accusamus harum ducimus similique voluptas. Ratione dicta enim similique odit.'
//         ],
//                 [
//             'id' => '7',
//             'gambar' => '/images/PantiStock/berita-terkini.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam minus aperiam vero optio. Quasi hic voluptates dolor ratione eveniet, iure nisi earum. Adipisci, aliquid omnis. Minima esse id fuga aut?'
//         ],
//         [
//             'id' => '8',
//             'gambar' => '/images/PantiStock/berita-populer-1.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati culpa sapiente veniam saepe deleniti fugiat nam ea, quasi ex fugit, doloremque ad rem vero labore dolorum voluptatibus inventore vel debitis?'
//         ],
//         [
//             'id' => '9',
//             'gambar' => '/images/PantiStock/berita-populer-2.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus nihil animi eveniet, rerum possimus repudiandae incidunt blanditiis amet asperiores distinctio, commodi architecto voluptatum dolor officia necessitatibus, doloremque exercitationem odio et.'
//         ],
//     ]]);
// });

// Route::get('/berita/{id}', function ($id) {
//     $berita = [
//         [
//             'id' => '1',
//             'gambar' => '/images/PantiStock/1.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam minus aperiam vero optio. Quasi hic voluptates dolor ratione eveniet, iure nisi earum. Adipisci, aliquid omnis. Minima esse id fuga aut?'
//         ],
//         [
//             'id' => '2',
//             'gambar' => '/images/PantiStock/2.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo nulla doloremque ratione sit vel eaque atque repudiandae perspiciatis voluptates, explicabo id soluta tempora praesentium facilis nostrum ullam pariatur temporibus? Omnis?'
//         ],
//         [
//             'id' => '3',
//             'gambar' => '/images/PantiStock/3.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit eaque dolores delectus quidem autem tempore officia asperiores qui culpa non, animi, soluta, aspernatur facilis aliquid praesentium distinctio iure provident quae!'
//         ],
//         [
//             'id' => '4',
//             'gambar' => '/images/PantiStock/4.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore sapiente quibusdam, aperiam eveniet commodi nisi iste eum rem fugiat odio, adipisci quae, facere suscipit iure a consequuntur possimus. Iste, porro?'
//         ],
//         [
//             'id' => '5',
//             'gambar' => '/images/PantiStock/5.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias ex quibusdam, quaerat repellat impedit neque quo. Animi dolores quis veniam. Ipsum sapiente, consequatur enim nam quaerat vero corrupti modi nulla!'
//         ],
//         [
//             'id' => '6',
//             'gambar' => '/images/PantiStock/6.webp',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus quas, accusantium quo suscipit deleniti voluptatum, ab assumenda doloribus asperiores optio accusamus harum ducimus similique voluptas. Ratione dicta enim similique odit.'
//         ],
//         [
//             'id' => '7',
//             'gambar' => '/images/PantiStock/berita-terkini.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam minus aperiam vero optio. Quasi hic voluptates dolor ratione eveniet, iure nisi earum. Adipisci, aliquid omnis. Minima esse id fuga aut?'
//         ],
//         [
//             'id' => '8',
//             'gambar' => '/images/PantiStock/berita-populer-1.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati culpa sapiente veniam saepe deleniti fugiat nam ea, quasi ex fugit, doloremque ad rem vero labore dolorum voluptatibus inventore vel debitis?'
//         ],
//         [
//             'id' => '9',
//             'gambar' => '/images/PantiStock/berita-populer-2.jpg',
//             'judul' => 'Judul Berita/Artikel',
//             'tanggal' => '11 Juni, 2025 |',
//             'penulis' => 'Penulis',
//             'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus nihil animi eveniet, rerum possimus repudiandae incidunt blanditiis amet asperiores distinctio, commodi architecto voluptatum dolor officia necessitatibus, doloremque exercitationem odio et.'
//         ],
//     ];

//     $beritas = Arr::first($berita, function ($beritas) use ($id) {
//         return $beritas['id'] == $id;
//     });

//     return view('beritas', ['judul' => 'Single Post', 'beritas' => $beritas]);
// });

Route::get('/berita', [ArtikelController::class, 'index'])->name('berita.index');
Route::get('/berita/{artikel}', [ArtikelController::class, 'show'])->name('berita.show');

Route::get('/daftar-panti', [PantiController::class, 'index'])->name('daftar-panti');
Route::get('/panti/{panti}', [PantiController::class, 'show'])->name('panti.show');

Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
Route::view('/kerjasama', 'kerjasama')->name('kerjasama');
Route::view('/tentang', 'tentang')->name('tentang');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rute untuk manajemen artikel oleh admin
    Route::resource('artikel', AdminArtikelController::class);

    //Panti
    Route::resource('panti', AdminPantiController::class);

    //Kategori
    Route::resource('kategori', AdminKategoriController::class);

    //Kebutuhan
    Route::resource('kebutuhan', AdminKebutuhanController::class);

    //Kontak
    Route::resource('kontak', AdminKontakController::class);

    //User
    Route::resource('users', AdminUserController::class);
});

require __DIR__ . '/auth.php';
