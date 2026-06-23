<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\ProfilController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');

    // Admin only routes
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('dosen', DosenController::class);
        Route::resource('mahasiswa', MahasiswaController::class);
        Route::resource('matakuliah', MatakuliahController::class);
        Route::resource('jadwal', JadwalController::class);
    });

    // Mahasiswa only routes
    Route::middleware(['role:mahasiswa'])->group(function () {
    Route::resource('krs', KrsController::class)->only(['index', 'create', 'store', 'destroy']);
    Route::get('krs/export-pdf', [KrsController::class, 'exportPdf'])->name('krs.export-pdf');
    });
    
    Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
});