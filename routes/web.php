<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\FaskesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('dikes/home');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('obat/cari/{nama}', [ObatController::class, 'cari'])->name('cari.pasien');
    Route::group(['middleware' => ['role:dikes'], 'prefix' => 'dikes'], function () {
        Route::resource('faskes', FaskesController::class);
        Route::resource('pasien', PasienController::class);
        Route::post('pasien/manajemen-user', [PasienController::class, 'manajemen']);
        Route::resource('obat', ObatController::class);
        Route::post('obat/ambil-obat', [ObatController::class, 'ambilObat']);
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'dikes'])->name('dikes.home');
    });
    Route::group(['middleware' => ['role:faskes'], 'prefix' => 'faskes'], function () {
        Route::get('home', [HomeController::class, 'faskes'])->name('faskes.home');
        Route::get('konsultasi', [KonsultasiController::class, 'index'])->name('faskes.konsultasi');
        Route::get('konsultasi/getChatById/{id}', [KonsultasiController::class, 'getChat']);
        Route::get('konsultasi/getClusterById/{id}', [KonsultasiController::class, 'getClusterById']);
        Route::get('konsultasi/getUserById/{id}', [KonsultasiController::class, 'getUserById']);
        Route::post('konsultasi/kirim', [KonsultasiController::class, 'postChat']);
    });
    Route::group(['middleware' => ['role:pasien'], 'prefix' => 'pasien'], function () {
        Route::get('home', [HomeController::class, 'pasien'])->name('pasien.home');
    });
});
