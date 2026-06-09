<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.welcome');
})->name('users.home');

Route::get('/google-login', [GoogleController::class, 'redirect'])
    ->name('google.login');

Route::get('/google-callback', [GoogleController::class, 'callback'])
    ->name('google.callback');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});
Route::get('/khachsan', function () {
    return view('users.khachsan.khachsan');
})->name('khachsan.khachsan');
Route::get('/chitietkhachsan', function () {
    return view('users.chitietkhachsan.chitiet');
})->name('chitietkhachsan.chitiet');
Route::get('/diadiemdulich', function () {
    return view('users.diadiemdulich.diadem');
})->name('diadiemdulich.diadem');
require __DIR__.'/auth.php';