<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ThanhToan\UserThanhToanController;

/*
|--------------------------------------------------------------------------
| USER - THANH TOÁN
|--------------------------------------------------------------------------
*/

Route::post(
    '/thanh-toan',
    [UserThanhToanController::class, 'index']
)->name('thanhtoan.index');

Route::post(
    '/thanh-toan/store',
    [UserThanhToanController::class, 'store']
)->name('thanhtoan.store');

Route::get(
    '/dat-phong/thanh-cong/{maDonDatPhong}',
    [UserThanhToanController::class, 'thanhCong']
)->name('datphong.thanhcong');

Route::get(
    '/vnpay-return',
    [UserThanhToanController::class, 'vnpayReturn']
)->name('vnpay.return');