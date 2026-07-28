<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KhachSan\UserKhachSanController;

/*
|--------------------------------------------------------------------------
| USER - KHÁCH SẠN
|--------------------------------------------------------------------------
*/

Route::get(
    '/khachsan',
    [UserKhachSanController::class, 'index']
)->name('khachsan.index');

Route::get(
    '/khachsan/tim-kiem',
    [UserKhachSanController::class, 'timKiem']
)->name('khachsan.timkiem');

Route::get(
    '/khachsan/{id}',
    [UserKhachSanController::class, 'show']
)->name('khachsan.show');

/*
|--------------------------------------------------------------------------
| USER - CHI TIẾT KHÁCH SẠN
|--------------------------------------------------------------------------
*/

Route::get(
    '/khach-san/{id}',
    [UserKhachSanController::class, 'show']
)->name('users.chitietkhachsan');