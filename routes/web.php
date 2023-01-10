<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidangTemuanController;
use App\Http\Controllers\HasilLhpController;
use App\Http\Controllers\JenisPemeriksaanController;
use App\Http\Controllers\KlarifikasiObrikController;
use App\Http\Controllers\KodePenyebabController;
use App\Http\Controllers\KodeRekomendasiController;
use App\Http\Controllers\KodeTemuanController;
use App\Http\Controllers\KodeTlhpController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LhpController;
use App\Http\Controllers\ObrikController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PendaftaranObrikController;
use App\Http\Controllers\ReadonlyController;
use App\Http\Controllers\UserAkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('layouts.login');
// });


Route::get('/', [AuthController::class, 'index'])->name('login');
// Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::get('laporan', [LaporanController::class, 'php'])->name('php');

    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::get('admin', [AdminController::class, 'index'])->name('admin');

        // User Management
        Route::resource('users', UserAkunController::class);
        Route::get('users/hapus/{id}', [UserAkunController::class, 'deleteuser'])->name('deleteuser');

        // Kode Bidang Temuan
        Route::resource('bidangtemuan', BidangTemuanController::class);
        // Kode Temuan
        Route::resource('kode/temuan', KodeTemuanController::class);
        // Kode Rekomendasi
        Route::resource('koderekomendasi', KodeRekomendasiController::class);
        // Kode Penyebab
        Route::resource('kodepenyebab', KodePenyebabController::class);
        // Kode Penyebab
        Route::resource('kodetlhp', KodeTlhpController::class);
        // Klarifikasi Obrik
        Route::resource('klarifikasiobrik', KlarifikasiObrikController::class);
        // Klarifikasi Obrik
        Route::resource('pendaftaranobrik', ObrikController::class);
        // Klarifikasi Laporan Hasil Pemeriksaan
        Route::resource('jenispemeriksaan', JenisPemeriksaanController::class);
        // Lhp
        Route::resource('lhp', LhpController::class);
    });


    Route::group(['middleware' => ['cek_login:operator']], function () {
        Route::get('operator', [OperatorController::class, 'index'])->name('operator');
    });


    Route::group(['middleware' => ['cek_login:readonly']], function () {
        Route::get('readonly', [ReadonlyController::class, 'index'])->name('readonly');
    });
});
