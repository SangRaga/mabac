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
use Barryvdh\DomPDF\Facade as PDF;


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
    return view('auth.login');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/jurnal', [App\Http\Controllers\HomeController::class, 'jurnal'])->name('jurnal');
// Route::resource('kriteria', KriteriaController::class);
Route::resource('pilihan', PilihanController::class);
Route::resource('subkriteria', SubkriteriaController::class);
Route::resource('matrix', MatrixController::class);
Route::resource('alternatif', AlternatifController::class);
Route::resource('perhitungan', PerhitunganController::class);
Route::get('hitung', [PerhitunganController::class, 'adminView'])->name('perhitungan');
Route::get('hitung/hasilAkhir', [PerhitunganController::class, 'adminHasil'])->name('hasilAkhir');
Route::get('hitung/view', [PerhitunganController::class, 'viewPDF'])->name('viewPDF');
Route::get('hitung/download', [PerhitunganController::class, 'downloadPDF'])->name('downloadPDF');
// Route::resource('hasilakhir', HasilakhirController::class);
