<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PantiController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DaftarPantiController;

use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\PantiController as AdminPantiController;
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController;
use App\Http\Controllers\Admin\KebutuhanController as AdminKebutuhanController;
use App\Http\Controllers\Admin\KontakController as AdminKontakController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Models\Panti;
use App\Models\Artikel;

Route::get('/', function () {
    $orphanages = Panti::latest()->take(3)->get();
    $news = Artikel::latest()->take(3)->get();
    return view('beranda', compact('orphanages', 'news'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/berita', [ArtikelController::class, 'index'])->name('berita.index');
Route::get('/berita/{artikel}', [ArtikelController::class, 'show'])->name('berita.show');
Route::get('/kategori/{deskripsi}', [ArtikelController::class, 'kategori']);

Route::get('/daftar-panti', [DaftarPantiController::class, 'index'])->name('daftar-panti');
Route::get('/panti/{id}', [PantiController::class, 'show'])->name('panti.show');

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
