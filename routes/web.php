<?php

use App\Models\Panti;
use App\Models\Artikel;
use App\Models\Kegiatan;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PantiController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ArtikelController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\DaftarPantiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PantiController as AdminPantiController;
use App\Http\Controllers\KegiatanController as PublicKegiatanController;

use App\Http\Controllers\Admin\KontakController as AdminKontakController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController;

use App\Http\Controllers\Admin\KegiatanController as AdminKegiatanController;
use App\Http\Controllers\Admin\KebutuhanController as AdminKebutuhanController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController; // Tambahkan ini

Route::get('/', function () {
    $orphanages = Panti::latest()->take(3)->get();
    $news = Artikel::latest()->take(3)->get();
    $jumlahPanti = \App\Models\Panti::count();
    $jumlahAnak = \App\Models\Panti::sum('jumlah_anak');
    $jumlahProgram = Kegiatan::count();
    return view('beranda', compact('orphanages', 'news', 'jumlahPanti', 'jumlahAnak', 'jumlahProgram'));
})->name('home');

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/kerjasama', [KerjasamaController::class, 'index'])->name('kerjasama');

// Route untuk dashboard panti
Route::middleware(['auth', 'panti'])->prefix('panti')->name('panti.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\PantiDashboardController::class, 'index'])->name('dashboard');
    Route::get('/setup', [App\Http\Controllers\PantiDashboardController::class, 'setup'])->name('setup');
    Route::post('/setup', [App\Http\Controllers\PantiDashboardController::class, 'storeSetup'])->name('setup.store');
    Route::post('/kebutuhan', [App\Http\Controllers\PantiDashboardController::class, 'storeKebutuhan'])->name('kebutuhan.store');
    Route::put('/kebutuhan/{kebutuhan}', [App\Http\Controllers\PantiDashboardController::class, 'updateKebutuhan'])->name('kebutuhan.update');
    Route::delete('/kebutuhan/{kebutuhan}', [App\Http\Controllers\PantiDashboardController::class, 'deleteKebutuhan'])->name('kebutuhan.delete');
    Route::get('/donations', [App\Http\Controllers\PantiDashboardController::class, 'donationsHistory'])->name('donations.history');
    Route::get('/activities', [App\Http\Controllers\PantiDashboardController::class, 'activitiesHistory'])->name('activities.history');
    Route::post('/donations/{donation}/confirm', [App\Http\Controllers\PantiDashboardController::class, 'confirmDonation'])->name('donations.confirm');
    Route::post('/donations/{donation}/reject', [App\Http\Controllers\PantiDashboardController::class, 'rejectDonation'])->name('donations.reject');
    Route::get('/donations/export', [App\Http\Controllers\PantiDashboardController::class, 'exportDonations'])->name('donations.export');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/kegiatan/{kegiatan}/follow', [KegiatanController::class, 'follow'])->name('kegiatan.follow');
    Route::delete('/kegiatan/{kegiatan}/unfollow', [KegiatanController::class, 'unfollow'])->name('kegiatan.unfollow');
    Route::get('/kegiatan/{kegiatan}/follow-status', [KegiatanController::class, 'checkFollowStatus'])->name('kegiatan.follow-status');

    // Bookmark routes
    Route::prefix('bookmark')->name('bookmark.')->group(function () {
        Route::post('/panti/{panti}/toggle', [App\Http\Controllers\BookmarkController::class, 'togglePanti'])->name('panti.toggle');
        Route::post('/artikel/{artikel}/toggle', [App\Http\Controllers\BookmarkController::class, 'toggleArtikel'])->name('artikel.toggle');
        Route::delete('/{bookmark}', [App\Http\Controllers\BookmarkController::class, 'destroy'])->name('destroy');
        Route::get('/', [App\Http\Controllers\BookmarkController::class, 'index'])->name('index');
        Route::get('/panti/{panti}/check', [App\Http\Controllers\BookmarkController::class, 'checkPantiBookmark'])->name('panti.check');
        Route::get('/artikel/{artikel}/check', [App\Http\Controllers\BookmarkController::class, 'checkArtikelBookmark'])->name('artikel.check');
    });
});

Route::get('/berita', [ArtikelController::class, 'index'])->name('berita.index');
Route::get('/berita/{artikel}', [ArtikelController::class, 'show'])->name('berita.show');
Route::get('/kategori/{deskripsi}', [ArtikelController::class, 'kategori']);

// API endpoint artikel dinamis
Route::get('/api/artikel', [ArtikelController::class, 'apiIndex']);

Route::get('/daftar-panti', [DaftarPantiController::class, 'index'])->name('daftar-panti');
Route::get('/panti/{id}', [PantiController::class, 'show'])->name('panti.show');

Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
Route::get('/kerjasama', [KerjasamaController::class, 'index'])->name('kerjasama');
Route::view('/tentang', 'tentang')->name('tentang');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rute untuk manajemen artikel oleh admin
    Route::resource('artikel', AdminArtikelController::class);

    //Panti
    Route::resource('panti', AdminPantiController::class);
    Route::post('/panti/{panti}/approve', [AdminPantiController::class, 'approve'])->name('panti.approve');
    Route::post('/panti/{panti}/reject', [AdminPantiController::class, 'reject'])->name('panti.reject');

    //Kategori
    Route::resource('kategori', AdminKategoriController::class);

    //Kebutuhan
    Route::resource('kebutuhan', AdminKebutuhanController::class);

    //Kontak
    Route::resource('kontak', AdminKontakController::class);

    //User
    Route::resource('users', AdminUserController::class);

    //Kegiatan
    Route::resource('kegiatan', AdminKegiatanController::class);
    Route::post('/kegiatan/{kegiatan}/approve', [AdminKegiatanController::class, 'approve'])->name('kegiatan.approve');
    Route::post('/kegiatan/{kegiatan}/reject', [AdminKegiatanController::class, 'reject'])->name('kegiatan.reject');

    //Faq
    Route::resource('faqs', AdminFaqController::class);
});

Route::get('/api/pantiasuhan', [App\Http\Controllers\PantiController::class, 'getPantiData']);
Route::get('/api/panti-stats', [App\Http\Controllers\PantiController::class, 'getStats']);

// Temporary route to inspect panti data
Route::get('/debug-panti-data', function () {
    return response()->json(App\Models\Panti::select('id_panti', 'nama', 'latitude', 'longitude')->get());
});

Route::get('/api/kegiatan', [PublicKegiatanController::class, 'index']);

require __DIR__ . '/auth.php';
