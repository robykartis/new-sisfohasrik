<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ReadonlyController;
use App\Http\Controllers\UserAkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'index'])->name('login');
// Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::get('laporan', [LaporanController::class, 'php'])->name('php');

    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::get('admin', [AdminController::class, 'index'])->name('admin');



        Route::get('users/data', [UserAkunController::class, 'user_data'])->name('users.data');
        Route::resource('users', UserAkunController::class);

        // Route::get('users', [UserAkunController::class, 'index'])->name('users.index');
        // Route::post('users/store', [UserAkunController::class, 'store'])->name('users.store');
        // Route::post('users/ashow/{id}', [UserAkunController::class, 'show'])->name('users.show');
        // Route::get('users/edit/{id}/', [UserAkunController::class, 'edit'])->name('users.edit');
        // Route::post('users/update', [UserAkunController::class, 'update'])->name('users.update');
        // Route::get('users/destroy/{id}/', [UserAkunController::class, 'destroy']);
    });


    Route::group(['middleware' => ['cek_login:operator']], function () {
        Route::get('operator', [OperatorController::class, 'index'])->name('operator');
    });


    Route::group(['middleware' => ['cek_login:readonly']], function () {
        Route::get('readonly', [ReadonlyController::class, 'index'])->name('readonly');
    });
});
