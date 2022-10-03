<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GuruController,
    MapelController,
    SiswaController,
    KelasController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('layout.app');
});

// guru
Route::get('/guru/data', [GuruController::class, 'data'])->name('guru.data');
Route::resource('/guru', GuruController::class);

// route mapel
Route::get('/mapel/data', [MapelController::class, 'data'])->name('mapel.data');
Route::resource('/mapel', MapelController::class);

// kelas
Route::resource('/kelas', KelasController::class);

// siswa
Route::resource('/siswa', SiswaController::class);

