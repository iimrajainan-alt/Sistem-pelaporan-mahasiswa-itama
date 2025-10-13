<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return "Sistem Pelaporan Masalah - Teknik informatika";
});
Route::get('/daftar', function () {
    return "Daftar masalah";
});
Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/cari', [LaporanController::class, 'search']);
Route::get('/rincian', [LaporanController::class, 'detail']);