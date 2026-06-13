<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| HALAMAN BLOG PENGUNJUNG
|--------------------------------------------------------------------------
*/

Route::get('/', [BlogController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/artikel/{id}', [BlogController::class, 'detail'])
    ->name('blog.detail');

Route::get('/blog/kategori/{id}', [BlogController::class, 'kategori'])
    ->name('blog.kategori');

Route::get('/tentang', [BlogController::class, 'tentang'])
    ->name('blog.tentang');
    
/* 
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'index'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'proses'])
        ->name('login.proses');
});

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| ADMIN CMS
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('artikel', ArtikelController::class)
        ->except(['show']);

    Route::resource('penulis', PenulisController::class)
        ->except(['show']);

    Route::resource('kategori', KategoriArtikelController::class)
        ->except(['show']);
});