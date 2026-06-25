<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\KhachSan\UserKhachSanController;
use App\Http\Controllers\NguoiDung\AdminNguoiDungController;
use App\Http\Controllers\KhachSan\UserChiTietKhachSanController;
use App\Http\Controllers\KhachSan\AdminKhachSanController;
use App\Http\Controllers\KhachSan\AdminHinhAnhKhachSanController;
use App\Http\Controllers\KhachSan\AdminLoaiPhongController;
use App\Http\Controllers\KhachSan\AdminHinhAnhLoaiPhongController;
use App\Http\Controllers\KhachSan\AdminPhongController;
use App\Http\Controllers\KhachSan\AdminTienNghiController;
use App\Http\Controllers\KhachSan\AdminKhachSanTienNghiController;
use App\Http\Controllers\KhachSan\AdminLoaiPhongTienNghiController;
use App\Http\Controllers\KhachSan\AdminDiaDiemController;
use App\Http\Controllers\DatPhong\AdminDatPhongController;
use App\Http\Controllers\DatPhong\UserDatPhongController;
/*
|--------------------------------------------------------------------------
| Trang chủ
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    if (
        auth()->check() &&
        auth()->user()->ma_vai_tro == 1
    ) {
        return redirect()->route('dashboard');
    }

    return view('users.index');

})->name('users.index');

/*
|--------------------------------------------------------------------------
| Google Login
|--------------------------------------------------------------------------
*/

Route::get('/google-login', [GoogleController::class, 'redirect'])
    ->name('google.login');

Route::get('/google-callback', [GoogleController::class, 'callback'])
    ->name('google.callback');

/*
|--------------------------------------------------------------------------
| Dashboard Admin
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if (
        !auth()->check()
        || auth()->user()->ma_vai_tro != 1
    ) {
        abort(403);
    }

    return view('admin.dashboard');

})->middleware('auth')
  ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Logout

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');


//USER - KHÁCH SẠN

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

//ADMIN - KHÁCH SẠN

Route::middleware('auth')->group(function () {

    Route::get(
        '/admin/khachsan',
        [AdminKhachSanController::class, 'index']
    )->name('admin.khachsan.index');

});

Route::get(
    '/admin/khachsan/create',
    [AdminKhachSanController::class,'create']
)->name('admin.khachsan.create');

Route::post(
    '/admin/khachsan/store',
    [AdminKhachSanController::class,'store']
)->name('admin.khachsan.store');

Route::get(
    '/admin/khachsan/{id}/edit',
    [AdminKhachSanController::class,'edit']
)->name('admin.khachsan.edit');

Route::put(
    '/admin/khachsan/{id}',
    [AdminKhachSanController::class,'update']
)->name('admin.khachsan.update');

Route::delete(
    '/admin/khachsan/{id}',
    [AdminKhachSanController::class,'destroy']
)->name('admin.khachsan.destroy');

Route::get(
    '/admin/khachsan/{id}',
    [AdminKhachSanController::class,'show']
)->name('admin.khachsan.show');

Route::get(
    '/admin/khachsan/{id}/tiennghi',
    [AdminKhachSanTienNghiController::class, 'edit']
)->name('admin.khachsan.tiennghi');

Route::put(
    '/admin/khachsan/{id}/tiennghi',
    [AdminKhachSanTienNghiController::class, 'update']
)->name('admin.khachsan.tiennghi.update');

//Quản lý hình ảnh khách san
Route::get(
    '/admin/khachsan/{id}/hinhanh',
    [AdminHinhAnhKhachSanController::class,'index']
)->name('admin.hinhanh.index');

Route::post(
    '/admin/khachsan/{id}/hinhanh',
    [AdminHinhAnhKhachSanController::class,'store']
)->name('admin.hinhanh.store');

Route::delete(
    '/admin/hinhanh/{id}',
    [AdminHinhAnhKhachSanController::class,'destroy']
)->name('admin.hinhanh.destroy');

Route::put(
    '/hinhanh/{id}',
    [AdminHinhAnhKhachSanController::class,'update']
)->name('admin.hinhanh.update');
//Loai Phòng 
Route::get(
    '/admin/loaiphong',
    [AdminLoaiPhongController::class,'index']
)->name('admin.loaiphong.index');

Route::get(
    '/admin/loaiphong/create',
    [AdminLoaiPhongController::class,'create']
)->name('admin.loaiphong.create');

Route::post(
    '/admin/loaiphong/store',
    [AdminLoaiPhongController::class,'store']
)->name('admin.loaiphong.store');

Route::get(
    '/admin/loaiphong/{id}/edit',
    [AdminLoaiPhongController::class,'edit']
)->name('admin.loaiphong.edit');

Route::put(
    '/admin/loaiphong/{id}',
    [AdminLoaiPhongController::class,'update']
)->name('admin.loaiphong.update');

Route::delete(
    '/admin/loaiphong/{id}',
    [AdminLoaiPhongController::class,'destroy']
)->name('admin.loaiphong.destroy');

Route::get(
    '/admin/loaiphong/{id}',
    [AdminLoaiPhongController::class,'show']
)->name('admin.loaiphong.show');

Route::get(
    '/admin/loaiphong/{id}/tiennghi',
    [AdminLoaiPhongTienNghiController::class,'edit']
)->name('admin.loaiphong.tiennghi');

Route::put(
    '/admin/loaiphong/{id}/tiennghi',
    [AdminLoaiPhongTienNghiController::class,'update']
)->name('admin.loaiphong.tiennghi.update');

//QUẢN LÝ HÌNH ẢNH LOẠI PHÒNG 
Route::get(
    '/admin/loaiphong/{id}/hinhanh',
    [AdminHinhAnhLoaiPhongController::class,'index']
)->name('admin.loaiphong.hinhanh.index');

Route::post(
    '/admin/loaiphong/{id}/hinhanh',
    [AdminHinhAnhLoaiPhongController::class,'store']
)->name('admin.loaiphong.hinhanh.store');

Route::delete(
    '/admin/loaiphong/hinhanh/{id}',
    [AdminHinhAnhLoaiPhongController::class,'destroy']
)->name('admin.loaiphong.hinhanh.destroy');

Route::put(
    '/loaiphong/hinhanh/{id}',
    [AdminLoaiPhongController::class,'updateHinhAnh']
)->name('admin.loaiphong.hinhanh.update');

//Quản lý phòng

Route::get(
    '/admin/phong',
    [AdminPhongController::class,'index']
)->name('admin.phong.index');

Route::get(
    '/admin/phong/create',
    [AdminPhongController::class,'create']
)->name('admin.phong.create');

Route::post(
    '/admin/phong/store',
    [AdminPhongController::class,'store']
)->name('admin.phong.store');

Route::get(
    '/admin/phong/{id}/edit',
    [AdminPhongController::class,'edit']
)->name('admin.phong.edit');

Route::put(
    '/admin/phong/{id}',
    [AdminPhongController::class,'update']
)->name('admin.phong.update');

Route::delete(
    '/admin/phong/{id}',
    [AdminPhongController::class,'destroy']
)->name('admin.phong.destroy');

Route::get(
    '/admin/phong/{id}',
    [AdminPhongController::class,'show']
)->name('admin.phong.show');

// tiện nghi
Route::resource(
    'admin/tiennghi',
    AdminTienNghiController::class
)->names('admin.tiennghi');

//Địa điểm 
Route::resource(
    'admin/diadiem',
    AdminDiaDiemController::class
)->names('admin.diadiem');
//Quản lý người dùng 

Route::get(
    '/admin/nguoi-dung',
    [AdminNguoiDungController::class,'index']
)->name('admin.nguoidung.index');

Route::get(
    '/admin/nguoi-dung/create',
    [AdminNguoiDungController::class,'create']
)->name('admin.nguoidung.create');

Route::post(
    '/admin/nguoi-dung/store',
    [AdminNguoiDungController::class,'store']
)->name('admin.nguoidung.store');

Route::get(
    '/admin/nguoi-dung/{id}',
    [AdminNguoiDungController::class,'show']
)->name('admin.nguoidung.show');

Route::get(
    '/admin/nguoi-dung/{id}/edit',
    [AdminNguoiDungController::class,'edit']
)->name('admin.nguoidung.edit');

Route::put(
    '/admin/nguoi-dung/{id}',
    [AdminNguoiDungController::class,'update']
)->name('admin.nguoidung.update');

Route::delete(
    '/admin/nguoi-dung/{id}',
    [AdminNguoiDungController::class,'destroy']
)->name('admin.nguoidung.destroy');
// đặt phòng 
Route::post(
    '/dat-phong/xac-nhan',
    [UserDatPhongController::class,'xacNhan']
)->name('datphong.xacnhan');

Route::post(
    '/dat-phong/luu',
    [DatPhongController::class,'store']
)->name('datphong.store');

Route::get(
    '/admin/datphong',
    [AdminDatPhongController::class, 'index']
)->name('admin.datphong.index');

Route::get(
    '/admin/datphong/create',
    [AdminDatPhongController::class, 'create']
)->name('admin.datphong.create');

Route::post(
    '/admin/datphong',
    [AdminDatPhongController::class, 'store']
)->name('admin.datphong.store');

Route::get(
    '/admin/datphong/{id}',
    [AdminDatPhongController::class, 'show']
)->name('admin.datphong.show');

Route::get(
    '/admin/datphong/{id}/edit',
    [AdminDatPhongController::class, 'edit']
)->name('admin.datphong.edit');

Route::put(
    '/admin/datphong/{id}',
    [AdminDatPhongController::class, 'update']
)->name('admin.datphong.update');

Route::delete(
    '/admin/datphong/{id}',
    [AdminDatPhongController::class, 'destroy']
)->name('admin.datphong.destroy');

Route::post(
    '/kiem-tra-phong',
    [AdminDatPhongController::class, 'kiemTraPhong']
)->name('admin.datphong.kiemTraPhong');

Route::put(
    '/admin/datphong/{id}/trangthai',
    [AdminDatPhongController::class, 'capNhatTrangThai']
)->name('admin.datphong.trangthai');
//USER - ĐỊA ĐIỂM DU LỊCH

Route::get('/diadiemdulich', function () {

    return view('users.diadiemdulich.index');

})->name('diadiemdulich.index');

// USER - CHI TIẾT KHÁCH SẠN


Route::get('/chitietkhachsan', function () {

    return view('users.chitietkhachsan.index');

})->name('chitietkhachsan.index');

Route::get(
    '/khach-san/{id}/album',
    [KhachSanController::class,'album']
)->name('khachsan.album');

//Useser loại phòng

Route::get(
    '/khach-san/{id}',
    [ChiTietKhachSanController::class, 'show']
)->name('users.chitietkhachsan');
require __DIR__.'/auth.php';