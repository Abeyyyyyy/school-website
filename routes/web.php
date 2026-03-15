<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\PesanController;
use App\Http\Controllers\Admin\StudentController;


// ===== ADMIN =====
Route::prefix('admin')->name('admin.')->group(function () {

    // Login
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');


    // Protected
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Pengumuman CRUD
        Route::resource('pengumuman', PengumumanController::class);

        // Pesan
        Route::get('/pesan', [PesanController::class, 'index'])->name('pesan.index');
        Route::patch('/pesan/{pesan}/baca', [PesanController::class, 'tandaiBaca'])->name('pesan.baca');
        Route::delete('/pesan/{pesan}', [PesanController::class, 'destroy'])->name('pesan.destroy');

        // Data Student
        Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    });
});


// ===== LANDING =====
Route::get('/', [LandingController::class, 'home'])->name('home');
Route::get('/jurusan', [LandingController::class, 'jurusan'])->name('jurusan');
Route::get('/ekstrakulikuler', [LandingController::class, 'ekstrakulikuler'])->name('ekstrakulikuler');
Route::get('/testimoni', [LandingController::class, 'testimoni'])->name('testimoni');

// ===== AUTH =====
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===== DASHBOARD (protected) =====
Route::middleware('auth:student')->prefix('dashboard')->name('dashboard.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/profil', [DashboardController::class, 'profil'])->name('profil');
    Route::get('/pengumuman', [DashboardController::class, 'pengumuman'])->name('pengumuman');
    Route::get('/kesiswaan', [DashboardController::class, 'kesiswaan'])->name('kesiswaan');
    Route::get('/ppdb', [DashboardController::class, 'ppdb'])->name('ppdb');
    Route::get('/ppdb/bobot-nilai', [DashboardController::class, 'bobotNilai'])->name('ppdb.bobot-nilai');
    Route::get('/elearning', [DashboardController::class, 'elearning'])->name('elearning');
    Route::get('/layanan', [DashboardController::class, 'layanan'])->name('layanan');
    Route::get('/kontak', [DashboardController::class, 'kontak'])->name('kontak');         
    Route::post('/kontak', [DashboardController::class, 'kontakStore'])->name('kontak.store'); 

    // Akademik sub-routes
    Route::prefix('akademik')->name('akademik.')->group(function () {
        Route::get('/kurikulum', [AkademikController::class, 'kurikulum'])->name('kurikulum');
        Route::get('/jadwal', [AkademikController::class, 'jadwal'])->name('jadwal');
        Route::get('/ekstrakulikuler', [AkademikController::class, 'ekstrakulikuler'])->name('ekstrakulikuler');
        Route::get('/info-ujian', [AkademikController::class, 'infoUjian'])->name('info-ujian');
        Route::get('/mata-pelajaran', [AkademikController::class, 'mataPelajaran'])->name('mata-pelajaran');
    });
});