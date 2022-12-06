<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\FaskesController;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'],function () {
    Route::group(['middleware' => ['role:dikes'], 'prefix' => 'dikes'], function() {
        Route::resource('faskes', FaskesController::class);
        Route::resource('pasien', PasienController::class);
        Route::resource('obat', ObatController::class);
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'dikes'])->name('dikes.home');
    });
    Route::group(['middleware' => ['role:faskes'], 'prefix' => 'faskes'], function() {
        Route::get('/home', [HomeController::class, 'faskes'])->name('faskes.home');
    });
    Route::group(['middleware' => ['role:pasien'], 'prefix' => 'pasien'], function() {
        Route::get('/home', [HomeController::class, 'pasien'])->name('pasien.home');
    });
});
