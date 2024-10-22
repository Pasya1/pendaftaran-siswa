<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\SiteController;

Route::get('/', function () {
    return view('home');
});

Route::get('/pendaftaran', [SiteController::class, 'showPendaftaran'])->name('pendaftaran'); // Mengarahkan ke showPendaftaran

Route::get('/data', function () {
    return view('data');
});
Route::get('/contoh', function () {
    return view('contoh');
});
Route::post('/pendaftaran/store', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'show'])->name('data');

Route::get('/', [SiteController::class, 'showSite']);
