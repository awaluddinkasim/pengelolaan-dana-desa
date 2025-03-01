<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APBDController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PenerimaanDanaController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PengeluaranDetailController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\UserController;

Route::get('/', [LandingPageController::class, 'index'])->name('index');
Route::get('/publikasi', [LandingPageController::class, 'publikasi'])->name('publikasi');

Route::group(['middleware' => 'guest'], function () {
    Route::view('/login', 'login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('authenticate');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'keuangan'], function () {
        Route::get('/apbd', [APBDController::class, 'index'])->name('apbd.index');
        Route::get('/apbd/create', [APBDController::class, 'create'])->name('apbd.create');
        Route::post('/apbd', [APBDController::class, 'store'])->name('apbd.store');
        Route::get('/apbd/{apbd}/edit', [APBDController::class, 'edit'])->name('apbd.edit');
        Route::put('/apbd/{apbd}', [APBDController::class, 'update'])->name('apbd.update');
        Route::delete('/apbd/{apbd}', [APBDController::class, 'destroy'])->name('apbd.destroy');

        Route::get('/penerimaan-dana', [PenerimaanDanaController::class, 'index'])->name('penerimaan-dana.index');
        Route::get('/penerimaan-dana/create', [PenerimaanDanaController::class, 'create'])->name('penerimaan-dana.create');
        Route::post('/penerimaan-dana', [PenerimaanDanaController::class, 'store'])->name('penerimaan-dana.store');
        Route::get('/penerimaan-dana/{penerimaan_dana}', [PenerimaanDanaController::class, 'show'])->name('penerimaan-dana.show');
        Route::get('/penerimaan-dana/{penerimaan_dana}/edit', [PenerimaanDanaController::class, 'edit'])->name('penerimaan-dana.edit');
        Route::put('/penerimaan-dana/{penerimaan_dana}', [PenerimaanDanaController::class, 'update'])->name('penerimaan-dana.update');
        Route::delete('/penerimaan-dana/{penerimaan_dana}', [PenerimaanDanaController::class, 'destroy'])->name('penerimaan-dana.destroy');

        Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
        Route::get('/pengeluaran/create', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
        Route::post('/pengeluaran', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
        Route::delete('/pengeluaran/{pengeluaran}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');

        Route::get('/pengeluaran/{pengeluaran}', [PengeluaranDetailController::class, 'index'])->name('pengeluaran-detail.index');
        Route::post('/pengaluaran/{pengeluaran}/detail', [PengeluaranDetailController::class, 'store'])->name('pengeluaran-detail.store');
        Route::delete('/pengeluaran/{pengeluaran}/detail/{pengeluaran_detail}', [PengeluaranDetailController::class, 'destroy'])->name('pengeluaran-detail.destroy');
    });

    Route::get('/publikasi', [PublikasiController::class, 'index'])->name('publikasi.index');
    Route::post('/publikasi', [PublikasiController::class, 'store'])->name('publikasi.store');
    Route::delete('/publikasi/{publikasi}', [PublikasiController::class, 'destroy'])->name('publikasi.destroy');

    Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna.index');
    Route::get('/pengguna/create', [UserController::class, 'create'])->name('pengguna.create');
    Route::post('/pengguna', [UserController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/{user}/edit', [UserController::class, 'edit'])->name('pengguna.edit');
    Route::put('/pengguna/{user}', [UserController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/{user}', [UserController::class, 'destroy'])->name('pengguna.destroy');

    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::put('/account/profile', [AccountController::class, 'updateProfile'])->name('account.update-profile');
    Route::put('/account/password', [AccountController::class, 'updatePassword'])->name('account.update-password');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
