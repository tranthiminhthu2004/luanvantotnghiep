<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrangChu\UserTrangChu;
use App\Http\Controllers\TimKiem\UserTimKiemTrangChuController;

/*
|--------------------------------------------------------------------------
| TRANG CHỦ
|--------------------------------------------------------------------------
*/

Route::get(
    '/',
    [UserTrangChu::class, 'index']
)->name('users.index');

/*
|--------------------------------------------------------------------------
| TÌM KIẾM TỪ TRANG CHỦ
|--------------------------------------------------------------------------
*/

Route::get(
    '/tim-kiem-trang-chu',
    [UserTimKiemTrangChuController::class, 'index']
)->name('timkiem.trangchu');