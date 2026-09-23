<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;

Route::redirect('/', '/buku');
Route::resource('buku', BukuController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('peminjaman', PeminjamanController::class)->except(['edit',	'update']);
Route::patch('/peminjaman/{peminjaman}/kembalikan', [PeminjamanController::class,	'kembalikan'])->name('peminjaman.kembalikan');
