<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
Route::get('chart', [App\Http\Controllers\HomeController::class, 'chart'])->name('chart');
Route::get('statistik', [App\Http\Controllers\StatistikController::class, 'index'])->name('statistik');


//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
// Route::resource('registrasi', App\Http\Controllers\RegistrasiController::class);

Route::get('registrasi', [App\Http\Controllers\RegistrasiController::class, 'index'])->name('registrasi');
Route::get('registrasi/formulir', [App\Http\Controllers\RegistrasiController::class, 'formulir'])->name('registrasi.formulir');
Route::get('registrasi/tambah', [App\Http\Controllers\RegistrasiController::class, 'create'])->name('registrasi.tambah');
Route::post('registrasi', [App\Http\Controllers\RegistrasiController::class, 'store'])->name('registrasi.store');
Route::post('registrasi/verif', [App\Http\Controllers\RegistrasiController::class, 'verif'])->name('registrasi.verif');
Route::get('registrasi/update', [App\Http\Controllers\RegistrasiController::class, 'update'])->name('registrasi.update');
Route::get('registrasi/ubah', [App\Http\Controllers\RegistrasiController::class, 'edit'])->name('registrasi.ubah');
Route::post('/registrasi/hapus', [App\Http\Controllers\RegistrasiController::class, 'destroy'])->name('registrasi.hapus');
Route::post('/registrasi/retribusi/hapus', [App\Http\Controllers\RegistrasiController::class, 'destroyRetri'])->name('retribusi.hapus');

Route::get('herregistrasi', [App\Http\Controllers\HerregistrasiController::class, 'index'])->name('herregistrasi');
Route::get('herregistrasi/tagihan/', [App\Http\Controllers\HerregistrasiController::class, 'tagihan'])->name('herregistrasi.tagihan');
Route::post('herregistrasi', [App\Http\Controllers\HerregistrasiController::class, 'store'])->name('herregistrasi.store');
Route::get('herregistrasi/tagihan/data', [App\Http\Controllers\HerregistrasiController::class, 'getHerr'])->name('herregistrasi.get');


Route::post('pembayaran', [App\Http\Controllers\PembayaranController::class, 'store'])->name('pembayaran.store');



Route::post('file-import', [App\Http\Controllers\RegistrasiController::class, 'fileImport'])->name('registrasi.import');

Route::get('skrd/registrasi', [App\Http\Controllers\SkrdController::class, 'registrasi'])->name('skrd.registrasi');
Route::get('skrd/herregistrasi', [App\Http\Controllers\SkrdController::class, 'herregistrasi'])->name('skrd.herregistrasi');
Route::post('skrd/herregistrasi', [App\Http\Controllers\SkrdController::class, 'herregistrasi'])->name('skrd.herregistrasi');
Route::get('skrd/herregistrasi/history', [App\Http\Controllers\SkrdController::class, 'history'])->name('skrd.herregistrasi.history');

Route::get('skrd/retribusi/print', [App\Http\Controllers\SkrdController::class, 'skrdRetri'])->name('retri.print');
Route::get('skrd/herregistrasi/print', [App\Http\Controllers\SkrdController::class, 'skrdHerr'])->name('herr.print');

Route::get('makam', [App\Http\Controllers\MakamController::class, 'index'])->name('makam');
Route::post('makam/upload', [App\Http\Controllers\MakamController::class, 'fotoUpload'])->name('makam.upload');
Route::get('makam/detail', [App\Http\Controllers\MakamController::class, 'show'])->name('makam.show');
Route::get('makam/info', [App\Http\Controllers\MakamController::class, 'publik'])->name('makam.publik');


Route::get('laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan');


//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
