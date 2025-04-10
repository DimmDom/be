<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\Auth\LoginController; 
use App\Http\Controllers\Auth\RegisterController;

// TODO : riwayat

// Halaman awal langsung ke login
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// Rute Login dan Register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showSiswaForm'])->name('register.siswa.form');
Route::post('/register', [RegisterController::class, 'registerSiswa'])->name('register.siswa');

// Rute untuk Admin

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/welcome', [AdminController::class, 'welcome'])->name('admin.welcome');
    // CRUD untuk siswa
    Route::get('/siswa', [AdminController::class, 'siswa'])->name('admin.siswa');
    Route::get('/siswa/create', [AdminController::class, 'createSiswa'])->name('admin.siswa.create');
    Route::post('/siswa', [AdminController::class, 'storeSiswa'])->name('admin.siswa.store');
    Route::get('/siswa/{id}/edit', [AdminController::class, 'editSiswa'])->name('admin.siswa.edit');
    Route::put('/siswa/{id}', [AdminController::class, 'updateSiswa'])->name('admin.siswa.update');
    Route::delete('/siswa/{id}', [AdminController::class, 'destroySiswa'])->name('admin.siswa.destroy');

    // CRUD untuk jadwal
    Route::get('/jadwal', [AdminController::class, 'jadwal'])->name('admin.jadwal');
    Route::get('/jadwal/create', [AdminController::class, 'createJadwal'])->name('admin.jadwal.create');
    Route::post('/jadwal', [AdminController::class, 'storeJadwal'])->name('admin.jadwal.store');
    Route::get('/jadwal/{id}/edit', [AdminController::class, 'editJadwal'])->name('admin.jadwal.edit');
    Route::put('/jadwal/{id}', [AdminController::class, 'updateJadwal'])->name('admin.jadwal.update');
    Route::delete('/jadwal/{id}', [AdminController::class, 'destroyJadwal'])->name('admin.jadwal.destroy');

    // CRUD untuk tugas
    Route::get('/tugas', [AdminController::class, 'tugas'])->name('admin.tugas');
    Route::get('/tugas/create', [AdminController::class, 'createTugas'])->name('admin.tugas.create');
    Route::post('/tugas', [AdminController::class, 'storeTugas'])->name('admin.tugas.store');
    Route::get('/tugas/{id}/edit', [AdminController::class, 'editTugas'])->name('admin.tugas.edit');
    Route::put('/tugas/{id}', [AdminController::class, 'updateTugas'])->name('admin.tugas.update');
    Route::delete('/tugas/{id}', [AdminController::class, 'destroyTugas'])->name('admin.tugas.destroy');

    // Riwayat (biasanya hanya read / detail)
    Route::get('/riwayat', [AdminController::class, 'riwayat'])->name('admin.riwayat');
    Route::get('/riwayat/{id}', [AdminController::class, 'detailRiwayat'])->name('admin.riwayat.show');
});


// Rute untuk Siswa
Route::prefix('siswa')->middleware(['auth', 'role:siswa'])->group(function () {
    // Dashboard welcome siswa
    Route::get('/dashboard', function () {
        return view('siswa.welcome');
    })->name('siswa.welcome');

    Route::get('/tugas', [SiswaController::class, 'tugas'])->name('siswa.tugas');
    Route::get('/tugas/{id}', [SiswaController::class, 'detail'])->name('siswa.tugas.detail');
    Route::post('/tugas/{id}', [SiswaController::class, 'submit'])->name('siswa.tugas.submit');
});
