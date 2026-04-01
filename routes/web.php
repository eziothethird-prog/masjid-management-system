<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;

// ✅ PUBLIC
Route::get('/', [HomeController::class, 'index']);
Route::get('/kegiatan/{id}', [KegiatanController::class, 'show'])->name('kegiatan.show');
Route::get('/kegiatan', [KegiatanController::class, 'publicIndex'])->name('kegiatan.public');
Route::get('/galeri', [KegiatanController::class, 'galeri'])->name('galeri');
Route::get('/jadwal', [HomeController::class, 'jadwal'])->name('jadwal');
Route::view('/tentang', 'tentang');
Route::view('/donasi', 'donasi');
Route::view('/kontak', 'kontak');

// dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ ADMIN
Route::middleware('auth')->group(function () {
    Route::resource('/admin/kegiatan', KegiatanController::class)->names('kegiatan');
});

require __DIR__.'/auth.php';