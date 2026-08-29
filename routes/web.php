<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;

Route::get('/', [FrontEndController::class, 'dashboard'])->name('dashboard');
Route::get('/penduduk', [FrontEndController::class, 'penduduk'])->name('penduduk');
Route::get('/kelahiran', [FrontEndController::class, 'kelahiran'])->name('kelahiran');
Route::get('/kematian', [FrontEndController::class, 'kematian'])->name('kematian');
Route::get('/fasilitas', [FrontEndController::class, 'fasilitas'])->name('fasilitas');