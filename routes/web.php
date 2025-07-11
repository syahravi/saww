<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SantriController;
use App\Http\Controllers\Admin\CriteriaController;
use App\Http\Controllers\Admin\PenilaianController;
use App\Http\Controllers\Admin\NormalisasiController;
use App\Http\Controllers\Admin\NilaiAkhirController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;

Route::get('/nilai-santri', [HomeController::class, 'nilaiSantri'])->name('nilai.santri');
Route::get('/penilaian-pdf/{nama_santri}', [HomeController::class, 'cetakPDF'])->name('penilaian.pdf');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/top-ranking/download', [NilaiAkhirController::class, 'downloadTopRankingPDF'])->name('admin.hasil.pdf');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/saw', function () {
        return view('admin/saw');
    })->name('saw');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Index - Menampilkan daftar santri
    Route::get('/santri', [SantriController::class, 'index'])->name('santri.index');

    // Create - Form tambah santri
    Route::get('/santri/create', [SantriController::class, 'create'])->name('santri.create');

    // Store - Simpan santri baru
    Route::post('/santri', [SantriController::class, 'store'])->name('santri.store');

    // Show - Tampilkan detail santri (opsional, jika digunakan)
    Route::get('/santri/{santri}', [SantriController::class, 'show'])->name('santri.show');

    // Edit - Form edit santri
    Route::get('/santri/{santri}/edit', [SantriController::class, 'edit'])->name('santri.edit');

    // Update - Simpan perubahan santri
    Route::put('/santri/{santri}', [SantriController::class, 'update'])->name('santri.update');

    // Destroy - Hapus santri
    Route::delete('/santri/{santri}', [SantriController::class, 'destroy'])->name('santri.destroy');


    Route::get('/criteria', [CriteriaController::class, 'index'])->name('criteria.index');

    Route::get('/criteria/create', [CriteriaController::class, 'create'])->name('criteria.create');

    Route::post('/criteria', [CriteriaController::class, 'store'])->name('criteria.store');

    Route::get('/criteria/{criteria}', [CriteriaController::class, 'show'])->name('criteria.show');

    Route::get('/criteria/{criteria}/edit', [CriteriaController::class, 'edit'])->name('criteria.edit');

    Route::put('/criteria/{criteria}', [CriteriaController::class, 'update'])->name('criteria.update');

    Route::delete('/criteria/{criteria}', [CriteriaController::class, 'destroy'])->name('criteria.destroy');



    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');

    Route::get('/penilaian/create', [PenilaianController::class, 'create'])->name('penilaian.create');

    Route::post('/penilaian', [PenilaianController::class, 'store'])->name('penilaian.store');

    Route::get('/penilaian/{penilaian}', [PenilaianController::class, 'show'])->name('penilaian.show');

    Route::get('/penilaian/{penilaian}/edit', [PenilaianController::class, 'edit'])->name('penilaian.edit');

    Route::put('/penilaian/{penilaian}', [PenilaianController::class, 'update'])->name('penilaian.update');

    Route::delete('/penilaian/{penilaian}', [PenilaianController::class, 'destroy'])->name('penilaian.destroy');

    Route::get('/normalisasi', [NormalisasiController::class, 'index'])->name('normalisasi.index');

    Route::get('/nilai-akhir', [NilaiAkhirController::class, 'index'])->name('hasil.index');
    Route::get('/TopRanking', [NilaiAkhirController::class, 'getTopRanking'])->name('hasil.top_ranking');

    Route::resource('users', UserController::class);
});
