<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\HasilakhirController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MatrixController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\PilihanController;
use App\Http\Controllers\SubkriteriaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');
Route::resource('kriteria', KriteriaController::class);
Route::resource('pilihan', PilihanController::class);
Route::resource('subkriteria', SubkriteriaController::class);
Route::resource('matrix', MatrixController::class);
Route::resource('alternatif', AlternatifController::class);
Route::resource('perhitungan', PerhitunganController::class);
Route::resource('hasilakhir', HasilakhirController::class);
