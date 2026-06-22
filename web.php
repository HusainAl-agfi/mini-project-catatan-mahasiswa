<?php

use Illuminate\Support\Facades\Route;

Route::get('/dosen', function () {
    return "Halo Dosen";
});

Route::get('/kelas', function () {
    return "Pemrograman Web Laravel";
});

Route::get('/profil', function () {
    return view('profil');
});

use App\Http\Controllers\DosenController;

Route::get('/dosen-index', [DosenController::class, 'index']);
Route::get('/dosen-profil', [DosenController::class, 'profil']);

use App\Http\Controllers\CatatanController;

// Catatan CRUD Routes
Route::get('/catatan', [CatatanController::class, 'index']);
Route::get('/catatan/create', [CatatanController::class, 'create']);
Route::post('/catatan', [CatatanController::class, 'store']);

// Tambahan Tugas 2 untuk Edit & Update Data
Route::get('/catatan/{id}/edit', [CatatanController::class, 'edit']);
Route::put('/catatan/{id}', [CatatanController::class, 'update']);

// Route untuk fitur Hapus Data
Route::delete('/catatan/{id}', [CatatanController::class, 'destroy']);
