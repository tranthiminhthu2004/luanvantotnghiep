<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DuLich\UserGoiYController;
use App\Http\Controllers\NguoiDung\UserSoThichController;
use App\Http\Controllers\DuLich\UserDiaDiemController;
use App\Http\Controllers\DuLich\UserDiemDenController;

/*
|--------------------------------------------------------------------------
| USER - GỢI Ý ĐIỂM ĐẾN DU LỊCH
|--------------------------------------------------------------------------
*/

Route::get(
    '/diadiemdulich',
    [UserGoiYController::class, 'index']
)->name('diadiemdulich.index');

Route::post(
    '/diadiemdulich',
    [UserGoiYController::class, 'goiY']
)->name('diadiemdulich.goiy');

/*
|--------------------------------------------------------------------------
| USER - SỞ THÍCH
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get(
        '/so-thich',
        [UserSoThichController::class, 'index']
    )->name('sothich.index');

    Route::post(
        '/so-thich',
        [UserSoThichController::class, 'store']
    )->name('sothich.store');

});

/*
|--------------------------------------------------------------------------
| USER - ĐỊA ĐIỂM
|--------------------------------------------------------------------------
*/

Route::get(
    '/dia-diem/{maDiaDiem}',
    [UserDiaDiemController::class, 'show']
)->name('diadiem.show');

/*
|--------------------------------------------------------------------------
| USER - ĐIỂM ĐẾN
|--------------------------------------------------------------------------
*/

Route::get(
    '/diem-den/{maDiaDiemDuLich}',
    [UserDiemDenController::class, 'show']
)->name('diemden.show');