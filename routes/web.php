<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;


Route::resource('laporan', LaporanController::class)->parameters([
    'laporan' => 'laporan'
]);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('dosen', DosenController::class);
Route::get('/', function () {
    return "Sistem Pelaporan Masalah - Teknik informatika";
});
Route::get('/daftar', function () {
    return "Daftar masalah";
});


