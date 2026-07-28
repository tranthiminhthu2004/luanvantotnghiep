<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DatPhong\UserDatPhongController;
use App\Http\Controllers\NguoiDung\UserLichSuDatPhongController;
use App\Http\Controllers\DatPhong\TraCuuDatPhongController;

/*
|--------------------------------------------------------------------------
| USER - ĐẶT PHÒNG
|--------------------------------------------------------------------------
*/

Route::get(
    '/dat-phong/xac-nhan',
    [UserDatPhongController::class, 'index']
)->name('datphong.xacnhan.index');

Route::post(
    '/dat-phong/xac-nhan',
    [UserDatPhongController::class, 'xacNhan']
)->name('datphong.xacnhan');

/*
|--------------------------------------------------------------------------
| LỊCH SỬ ĐẶT PHÒNG
|--------------------------------------------------------------------------
*/

Route::get(
    '/lich-su-dat-phong',
    [UserLichSuDatPhongController::class, 'index']
)->middleware('auth')->name('lichsudatphong.index');

Route::get(
    '/lich-su-dat-phong/{maDonDatPhong}',
    [UserLichSuDatPhongController::class, 'show']
)->middleware('auth')->name('lichsudatphong.show');

Route::post(
    '/lich-su-dat-phong/{maDonDatPhong}/huy',
    [UserLichSuDatPhongController::class, 'huy']
)->middleware('auth')->name('lichsudatphong.huy');

/*
|--------------------------------------------------------------------------
| TRA CỨU ĐẶT PHÒNG
|--------------------------------------------------------------------------
*/

Route::prefix('tra-cuu-dat-phong')->group(function () {

    /**
     * Hiển thị trang tra cứu.
     */
    Route::get(
        '/',
        [TraCuuDatPhongController::class, 'index']
    )->name('users.tracuudatphong.index');

    /**
     * Xử lý tra cứu.
     */
    Route::post(
        '/',
        [TraCuuDatPhongController::class, 'traCuu']
    )->name('tracuudatphong.tracuu');

    Route::post(
        '/{maDonDatPhong}/huy',
        [TraCuuDatPhongController::class, 'huy']
    )->name('tracuudatphong.huy');

});