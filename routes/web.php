<?php

use Illuminate\Support\Facades\Route;

// =========================
// CONTROLLER PUBLIC
// =========================

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\kontakController;
use App\Http\Controllers\profileController;

// =========================
// CONTROLLER ADMIN
// =========================

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PesanController;
use App\Http\Controllers\Admin\ProfileSekolahController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;

// =========================
// MODEL
// =========================

use App\Models\Jurusan;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Produk;


// ======================================================
// PUBLIC - BERANDA
// ======================================================

Route::get('/', function () {

    $jurusans = Jurusan::all();

    $artikels = Artikel::orderBy(
        'tanggal_publikasi',
        'desc'
    )->get();

    $galeris = Galeri::latest()->get();

    $produks = Produk::latest()->get();

    return view('welcome', compact(
        'jurusans',
        'artikels',
        'galeris',
        'produks'
    ));

})->name('home');


// ======================================================
// PUBLIC - PROFILE
// ======================================================

Route::get('/profile', [profileController::class, 'index'])
    ->name('profile.index');


// ======================================================
// PUBLIC - KONTAK
// ======================================================

Route::get('/kontak', [kontakController::class, 'index'])
    ->name('kontak.index');

Route::post('/kontak', [kontakController::class, 'store'])
    ->name('kontak.store');


// ======================================================
// PUBLIC - GALERI
// ======================================================

Route::get('/galeri', [GaleriController::class, 'index'])
    ->name('galeri.index');


// ======================================================
// PUBLIC - PRODUK
// ======================================================

Route::get('/produk', [produkController::class, 'index'])
    ->name('produk.index');


// ======================================================
// PUBLIC - ARTIKEL
// ======================================================

Route::get('/artikel', [ArtikelController::class, 'index'])
    ->name('artikel.index');

Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])
    ->name('artikel.show');


// ======================================================
// PUBLIC - JURUSAN
// ======================================================

Route::get('/jurusan', [JurusanController::class, 'index'])
    ->name('jurusan.index');

Route::get('/jurusan/{slug}', [JurusanController::class, 'show'])
    ->name('jurusan.show');


// ======================================================
// ADMIN - LOGIN
// ======================================================

Route::get('/admin/login', [AuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->name('admin.logout');


// ======================================================
// ADMIN - SEMUA HALAMAN
// ======================================================

Route::middleware('auth')->prefix('admin')->group(function () {


    // ==================================================
    // DASHBOARD
    // ==================================================

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');


    // ==================================================
    // ADMIN KONTAK
    // ==================================================

    Route::get('/kontak', [kontakController::class, 'edit'])
        ->name('admin.kontak');

    Route::put('/kontak', [kontakController::class, 'update'])
        ->name('admin.kontak.update');


    // ==================================================
    // PESAN
    // ==================================================

    Route::get('/pesan', [PesanController::class, 'index'])
        ->name('admin.pesan');

    Route::get('/pesan/{id}', [PesanController::class, 'show'])
        ->name('admin.pesan.show');

    Route::post('/pesan/{id}/dibaca', [PesanController::class, 'dibaca'])
        ->name('admin.pesan.dibaca');


    // ==================================================
    // KELOLA PROFILE SEKOLAH
    // ==================================================

    Route::get('/profile', [ProfileSekolahController::class, 'index'])
        ->name('admin.profile');

    Route::put('/profile', [ProfileSekolahController::class, 'update'])
        ->name('admin.profile.update');


Route::get('/artikel', [AdminArtikelController::class, 'index'])
    ->name('admin.artikel.index');

Route::get('/artikel/create', [AdminArtikelController::class, 'create'])
    ->name('admin.artikel.create');

Route::post('/artikel', [AdminArtikelController::class, 'store'])
    ->name('admin.artikel.store');

Route::get('/artikel/{artikel}/edit', [AdminArtikelController::class, 'edit'])
    ->name('admin.artikel.edit');

Route::put('/artikel/{artikel}', [AdminArtikelController::class, 'update'])
    ->name('admin.artikel.update');

Route::delete('/artikel/{artikel}', [AdminArtikelController::class, 'destroy'])
    ->name('admin.artikel.destroy');
    // PRODUK
    Route::get('/produk', [AdminProdukController::class, 'index'])
        ->name('admin.produk.index');

    Route::get('/produk/create', [AdminProdukController::class, 'create'])
        ->name('admin.produk.create');

    Route::post('/produk', [AdminProdukController::class, 'store'])
        ->name('admin.produk.store');

    Route::get('/produk/{produk}/edit', [AdminProdukController::class, 'edit'])
        ->name('admin.produk.edit');

    Route::put('/produk/{produk}', [AdminProdukController::class, 'update'])
        ->name('admin.produk.update');

    Route::delete('/produk/{produk}', [AdminProdukController::class, 'destroy'])
        ->name('admin.produk.destroy');


        Route::get('/galeri', [AdminGaleriController::class, 'index'])->name('admin.galeri.index');
        Route::get('/galeri/create', [AdminGaleriController::class, 'create'])->name('admin.galeri.create');
        Route::post('/galeri', [AdminGaleriController::class, 'store'])->name('admin.galeri.store');
        Route::get('/galeri/{galeri}/edit', [AdminGaleriController::class, 'edit'])->name('admin.galeri.edit');
        Route::put('/galeri/{galeri}', [AdminGaleriController::class, 'update'])->name('admin.galeri.update');
        Route::delete('/galeri/{galeri}', [AdminGaleriController::class, 'destroy'])->name('admin.galeri.destroy');
});
