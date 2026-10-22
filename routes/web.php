<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DasawismaController as AdminDasawismaController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\KantorController as AdminKantorController;
use App\Http\Controllers\Admin\KelurahanController as AdminKelurahanController;
use App\Http\Controllers\Admin\PejabatController as AdminPejabatController;
use App\Http\Controllers\Admin\PkkKegiatanController as AdminPkkKegiatanController;
use App\Http\Controllers\Admin\PkkPengurusController as AdminPkkPengurusController;
use App\Http\Controllers\Admin\PkkProfilController as AdminPkkProfilController;
use App\Http\Controllers\Admin\PkkProgramController as AdminPkkProgramController;
use App\Http\Controllers\Admin\ProfilPageController as AdminProfilPageController;
use App\Http\Controllers\AlamatPemerintahanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DasawismaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\PkkController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman Publik
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profil/{slug}', [ProfilController::class, 'show'])->name('profil.show');
Route::get('/pejabat-struktural', [PejabatController::class, 'index'])->name('pejabat.index');
Route::get('/alamat-pemerintahan', [AlamatPemerintahanController::class, 'index'])->name('alamat-pemerintahan.index');

Route::get('/kelurahan', [KelurahanController::class, 'index'])->name('kelurahan.index');
Route::get('/kelurahan/{slug}', [KelurahanController::class, 'show'])->name('kelurahan.show');

Route::get('/dasawisma', [DasawismaController::class, 'index'])->name('dasawisma.index');
Route::get('/dasawisma/{slug}', [DasawismaController::class, 'show'])->name('dasawisma.show');

Route::get('/pkk', [PkkController::class, 'index'])->name('pkk.index');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

/*
|--------------------------------------------------------------------------
| Autentikasi Admin
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Panel Admin (Terproteksi)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('berita', AdminBeritaController::class)->except('show')->parameters(['berita' => 'berita']);
    Route::resource('galeri', AdminGaleriController::class)->except('show');
    Route::resource('kelurahan', AdminKelurahanController::class)->except('show');
    Route::resource('dasawisma', AdminDasawismaController::class)->except('show');
    Route::resource('pejabat', AdminPejabatController::class)->except('show');
    Route::resource('kantor', AdminKantorController::class)->except('show');

    Route::get('/profil', [AdminProfilPageController::class, 'index'])->name('profil.index');
    Route::get('/profil/{profil}/edit', [AdminProfilPageController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/{profil}', [AdminProfilPageController::class, 'update'])->name('profil.update');

    Route::get('/pkk-profil', [AdminPkkProfilController::class, 'edit'])->name('pkk-profil.edit');
    Route::put('/pkk-profil', [AdminPkkProfilController::class, 'update'])->name('pkk-profil.update');

    Route::resource('pkk-pengurus', AdminPkkPengurusController::class)->except('show')->parameters(['pkk-pengurus' => 'pkk_pengurus']);
    Route::resource('pkk-program', AdminPkkProgramController::class)->except('show');
    Route::resource('pkk-kegiatan', AdminPkkKegiatanController::class)->except('show');
});
