<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DoiTac\UserDoiTacController;
use App\Http\Controllers\DoiTac\KhachSanController;
use App\Http\Controllers\DoiTac\DatPhongController;
use App\Http\Controllers\DoiTac\PartnerHoSoController;
/*
|--------------------------------------------------------------------------
| ĐỐI TÁC
|--------------------------------------------------------------------------
*/

Route::get(
    '/doi-tac',
    [UserDoiTacController::class, 'index']
)->name('doitac.index');

/*
|--------------------------------------------------------------------------
| ROUTE ĐỐI TÁC (GIỮ NGUYÊN THEO SOURCE)
|--------------------------------------------------------------------------
*/

Route::get(
    '/khachsan/{id}/edit',
    [KhachSanController::class, 'edit']
)->name('doitac.khachsan.edit');

Route::patch(
    '/khachsan/{id}',
    [KhachSanController::class, 'update']
)->name('doitac.khachsan.update');

/*
|--------------------------------------------------------------------------
| KHU VỰC ĐỐI TÁC
|--------------------------------------------------------------------------
*/

Route::prefix('doitac')
    ->middleware([
        'auth',
        'partner'
    ])
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            function () {

                return view('doitac.dashboard');

            }
        )->name('doitac.dashboard');

        /*
        |--------------------------------------------------------------------------
        | KHÁCH SẠN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/khachsan',
            [KhachSanController::class, 'index']
        )->name('doitac.khachsan.index');

        Route::get(
            '/khachsan/create/form1',
            [KhachSanController::class, 'form1']
        )->name('doitac.khachsan.create.form1');

        Route::post(
            '/khachsan/create/form1',
            [KhachSanController::class, 'luuForm1']
        )->name('doitac.khachsan.create.form1.store');

        Route::get(
            '/khachsan/create/form2',
            [KhachSanController::class, 'form2']
        )->name('doitac.khachsan.create.form2');

        Route::post(
            '/khachsan/create/form2',
            [KhachSanController::class, 'luuForm2']
        )->name('doitac.khachsan.create.form2.store');

        Route::get(
            '/khachsan/create/form3',
            [KhachSanController::class, 'form3']
        )->name('doitac.khachsan.create.form3');

        Route::post(
            '/khachsan/create/form3',
            [KhachSanController::class, 'luuForm3']
        )->name('doitac.khachsan.create.form3.store');

        Route::get(
            '/khachsan/create/form4',
            [KhachSanController::class, 'form4']
        )->name('doitac.khachsan.create.form4');

        Route::post(
            '/khachsan/create/form4',
            [KhachSanController::class, 'luuForm4']
        )->name('doitac.khachsan.create.form4.store');

        Route::delete(
            '/khachsan/{ma_khach_san}',
            [KhachSanController::class, 'destroy']
        )->name('doitac.khachsan.destroy');

        Route::get(
            '/khach-san/{maKhachSan}',
            [KhachSanController::class, 'show']
        )->name('doitac.khachsan.show');

        Route::get(
            '/khach-san/{maKhachSan}/edit',
            [KhachSanController::class, 'edit']
        )->name('doitac.khachsan.edit');

        Route::put('/khach-san/{maKhachSan}', [KhachSanController::class, 'update']
        )->name('doitac.khachsan.update');
        
        Route::get(
    '/ho-so',
    [PartnerHoSoController::class,'index']
)->name('doitac.hoso.index');

Route::get(
    '/ho-so/chinh-sua',
    [PartnerHoSoController::class,'edit']
)->name('doitac.hoso.edit');

Route::put(
    '/ho-so',
    [PartnerHoSoController::class,'update']
)->name('doitac.hoso.update');

    });