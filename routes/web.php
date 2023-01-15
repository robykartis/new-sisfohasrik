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
use App\Http\Controllers\PenyebabController;
use App\Http\Controllers\ReadonlyController;
use App\Http\Controllers\TemuanController;
use App\Http\Controllers\UserAkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('layouts.app');
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
        Route::resource('kodetemuan', KodeTemuanController::class);
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
        Route::get('obrik/hapus/{id}', [ObrikController::class, 'deleteobrik'])->name('deleteobrik');
        // Klarifikasi Laporan Hasil Pemeriksaan
        Route::resource('jenispemeriksaan', JenisPemeriksaanController::class);
        // Lhp
        Route::resource('lhp', LhpController::class);
        Route::get('lhp/hapus/{id}', [LhpController::class, 'deletelhp'])->name('deletelhp');
        // Temuan
        Route::resource('temuan', TemuanController::class);
        Route::get('lhp/{id}/temuan/create', [TemuanController::class, 'create'])->name('temuan.create');
        Route::get('lhp/{id}/temuan/edit', [TemuanController::class, 'edit'])->name('temuan.edit');
        Route::get('lhp/{id}/temuan/show', [TemuanController::class, 'show'])->name('temuan.show');
        Route::get('lhp/{id}/temuan/delete', [TemuanController::class, 'destroy'])->name('temuan.destroy');
        // Penyebab
        Route::get('temuan/{id}/penyebab', [PenyebabController::class, 'index'])->name('penyebab.index');
        Route::get('temuan/{id}/penyebab/edit', [PenyebabController::class, 'edit'])->name('penyebab.edit');
        Route::get('temuan/{id}/penyebab/show', [PenyebabController::class, 'show'])->name('penyebab.show');
    });


    Route::group(['middleware' => ['cek_login:operator']], function () {
        Route::get('operator', [OperatorController::class, 'index'])->name('operator');
    });


    Route::group(['middleware' => ['cek_login:readonly']], function () {
        Route::get('readonly', [ReadonlyController::class, 'index'])->name('readonly');
    });
});
