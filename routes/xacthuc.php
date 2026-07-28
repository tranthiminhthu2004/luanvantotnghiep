<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\NguoiDung\UserHoSoController;

/*
|--------------------------------------------------------------------------
| ĐĂNG NHẬP GOOGLE
|--------------------------------------------------------------------------
*/

Route::get(
    '/google-login',
    [GoogleController::class, 'redirect']
)->name('google.login');

Route::get(
    '/google-callback',
    [GoogleController::class, 'callback']
)->name('google.callback');

/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/

Route::get(
    '/dashboard',
    function ()
    {
        if (
            !auth()->check() ||
            auth()->user()->ma_vai_tro != 1
        )
        {
            abort(403);
        }

        return view('admin.dashboard');

    }
)->middleware('auth')
 ->name('dashboard');

/*
|--------------------------------------------------------------------------
| HỒ SƠ NGƯỜI DÙNG (Laravel Breeze)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function ()
{
    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');
});
Route::middleware('auth')->group(function () {

    Route::get(
        '/ho-so',
        [UserHoSoController::class, 'index']
    )->name('hoso.index');

    Route::get(
        '/ho-so/chinh-sua',
        [UserHoSoController::class, 'edit']
    )->name('hoso.edit');

    Route::put(
        '/ho-so',
        [UserHoSoController::class, 'update']
    )->name('hoso.update');

});

/*
|--------------------------------------------------------------------------
| ĐĂNG XUẤT
|--------------------------------------------------------------------------
*/

Route::post(
    '/logout',
    [AuthenticatedSessionController::class, 'destroy']
)->name('logout');