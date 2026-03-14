<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Tambah route lain sesuai kebutuhan:
// Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
// Route::get('/akademik', [AkademikController::class, 'index'])->name('akademik');
// Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');