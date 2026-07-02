<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\KhachSan\UserKhachSanController;

use App\Http\Controllers\NguoiDung\AdminNguoiDungController;
use App\Http\Controllers\NguoiDung\UserHoSoController;

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

use App\Http\Controllers\ThanhToan\UserThanhToanController;
use App\Http\Controllers\NguoiDung\UserLichSuDatPhongController;

use App\Models\DatPhong;
use App\Mail\DatPhongThanhCongMail;

Route::get('/test-email', function () {

    $datPhong = DatPhong::with([
        'khachSan',
        'thanhToan',
        'chiTietDatPhong.loaiPhong'
    ])->first();

    return new DatPhongThanhCongMail($datPhong);

});
/*
TRANG CHỦ
*/

Route::get('/', function ()
{
    if (
        auth()->check() &&
        auth()->user()->ma_vai_tro == 1
    )
    {
        return redirect()->route('dashboard');
    }

    return view('users.index');

})->name('users.index');

/*
ĐĂNG NHẬP GOOGLE
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
DASHBOARD ADMIN
*/

Route::get('/dashboard', function ()
{
    if (
        !auth()->check() ||
        auth()->user()->ma_vai_tro != 1
    )
    {
        abort(403);
    }

    return view('admin.dashboard');

})->middleware('auth')
  ->name('dashboard');

/*
HỒ SƠ NGƯỜI DÙNG
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

Route::post(
    '/logout',
    [AuthenticatedSessionController::class, 'destroy']
)->name('logout');

/*
USER - KHÁCH SẠN
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
ADMIN - KHÁCH SẠN
*/

Route::middleware('auth')->group(function ()
{
    Route::get(
        '/admin/khachsan',
        [AdminKhachSanController::class, 'index']
    )->name('admin.khachsan.index');
});

// Quản lý khách sạn

Route::get(
    '/admin/khachsan/create',
    [AdminKhachSanController::class, 'create']
)->name('admin.khachsan.create');

Route::post(
    '/admin/khachsan/store',
    [AdminKhachSanController::class, 'store']
)->name('admin.khachsan.store');

Route::get(
    '/admin/khachsan/{id}/edit',
    [AdminKhachSanController::class, 'edit']
)->name('admin.khachsan.edit');

Route::put(
    '/admin/khachsan/{id}',
    [AdminKhachSanController::class, 'update']
)->name('admin.khachsan.update');

Route::delete(
    '/admin/khachsan/{id}',
    [AdminKhachSanController::class, 'destroy']
)->name('admin.khachsan.destroy');

Route::get(
    '/admin/khachsan/{id}',
    [AdminKhachSanController::class, 'show']
)->name('admin.khachsan.show');

// Quản lý tiện nghi khách sạn

Route::get(
    '/admin/khachsan/{id}/tiennghi',
    [AdminKhachSanTienNghiController::class, 'edit']
)->name('admin.khachsan.tiennghi');

Route::put(
    '/admin/khachsan/{id}/tiennghi',
    [AdminKhachSanTienNghiController::class, 'update']
)->name('admin.khachsan.tiennghi.update');

// Quản lý hình ảnh khách sạn

Route::get(
    '/admin/khachsan/{id}/hinhanh',
    [AdminHinhAnhKhachSanController::class, 'index']
)->name('admin.hinhanh.index');

Route::post(
    '/admin/khachsan/{id}/hinhanh',
    [AdminHinhAnhKhachSanController::class, 'store']
)->name('admin.hinhanh.store');

Route::delete(
    '/admin/hinhanh/{id}',
    [AdminHinhAnhKhachSanController::class, 'destroy']
)->name('admin.hinhanh.destroy');

Route::put(
    '/hinhanh/{id}',
    [AdminHinhAnhKhachSanController::class, 'update']
)->name('admin.hinhanh.update');

/*
 ADMIN - LOẠI PHÒNG
*/

// Quản lý loại phòng

Route::get(
    '/admin/loaiphong',
    [AdminLoaiPhongController::class, 'index']
)->name('admin.loaiphong.index');

Route::get(
    '/admin/loaiphong/create',
    [AdminLoaiPhongController::class, 'create']
)->name('admin.loaiphong.create');

Route::post(
    '/admin/loaiphong/store',
    [AdminLoaiPhongController::class, 'store']
)->name('admin.loaiphong.store');

Route::get(
    '/admin/loaiphong/{id}/edit',
    [AdminLoaiPhongController::class, 'edit']
)->name('admin.loaiphong.edit');

Route::put(
    '/admin/loaiphong/{id}',
    [AdminLoaiPhongController::class, 'update']
)->name('admin.loaiphong.update');

Route::delete(
    '/admin/loaiphong/{id}',
    [AdminLoaiPhongController::class, 'destroy']
)->name('admin.loaiphong.destroy');

Route::get(
    '/admin/loaiphong/{id}',
    [AdminLoaiPhongController::class, 'show']
)->name('admin.loaiphong.show');

// Quản lý tiện nghi loại phòng

Route::get(
    '/admin/loaiphong/{id}/tiennghi',
    [AdminLoaiPhongTienNghiController::class, 'edit']
)->name('admin.loaiphong.tiennghi');

Route::put(
    '/admin/loaiphong/{id}/tiennghi',
    [AdminLoaiPhongTienNghiController::class, 'update']
)->name('admin.loaiphong.tiennghi.update');

// Quản lý hình ảnh loại phòng

Route::get(
    '/admin/loaiphong/{id}/hinhanh',
    [AdminHinhAnhLoaiPhongController::class, 'index']
)->name('admin.loaiphong.hinhanh.index');

Route::post(
    '/admin/loaiphong/{id}/hinhanh',
    [AdminHinhAnhLoaiPhongController::class, 'store']
)->name('admin.loaiphong.hinhanh.store');

Route::delete(
    '/admin/loaiphong/hinhanh/{id}',
    [AdminHinhAnhLoaiPhongController::class, 'destroy']
)->name('admin.loaiphong.hinhanh.destroy');

Route::put(
    '/loaiphong/hinhanh/{id}',
    [AdminLoaiPhongController::class, 'updateHinhAnh']
)->name('admin.loaiphong.hinhanh.update');

/*
 ADMIN - PHÒNG
*/

Route::get(
    '/admin/phong',
    [AdminPhongController::class, 'index']
)->name('admin.phong.index');

Route::get(
    '/admin/phong/create',
    [AdminPhongController::class, 'create']
)->name('admin.phong.create');

Route::post(
    '/admin/phong/store',
    [AdminPhongController::class, 'store']
)->name('admin.phong.store');

Route::get(
    '/admin/phong/{id}/edit',
    [AdminPhongController::class, 'edit']
)->name('admin.phong.edit');

Route::put(
    '/admin/phong/{id}',
    [AdminPhongController::class, 'update']
)->name('admin.phong.update');

Route::delete(
    '/admin/phong/{id}',
    [AdminPhongController::class, 'destroy']
)->name('admin.phong.destroy');

Route::get(
    '/admin/phong/{id}',
    [AdminPhongController::class, 'show']
)->name('admin.phong.show');

/*
ADMIN - TIỆN NGHI
*/

Route::get(
    '/admin/tiennghi',
    [AdminTienNghiController::class, 'index']
)->name('admin.tiennghi.index');

Route::get(
    '/admin/tiennghi/create',
    [AdminTienNghiController::class, 'create']
)->name('admin.tiennghi.create');

Route::post(
    '/admin/tiennghi',
    [AdminTienNghiController::class, 'store']
)->name('admin.tiennghi.store');

Route::get(
    '/admin/tiennghi/{tiennghi}',
    [AdminTienNghiController::class, 'show']
)->name('admin.tiennghi.show');

Route::get(
    '/admin/tiennghi/{tiennghi}/edit',
    [AdminTienNghiController::class, 'edit']
)->name('admin.tiennghi.edit');

Route::put(
    '/admin/tiennghi/{tiennghi}',
    [AdminTienNghiController::class, 'update']
)->name('admin.tiennghi.update');

Route::delete(
    '/admin/tiennghi/{tiennghi}',
    [AdminTienNghiController::class, 'destroy']
)->name('admin.tiennghi.destroy');

/*
ADMIN - ĐỊA ĐIỂM
*/


Route::get(
    '/admin/diadiem',
    [AdminDiaDiemController::class, 'index']
)->name('admin.diadiem.index');

Route::get(
    '/admin/diadiem/create',
    [AdminDiaDiemController::class, 'create']
)->name('admin.diadiem.create');

Route::post(
    '/admin/diadiem',
    [AdminDiaDiemController::class, 'store']
)->name('admin.diadiem.store');

Route::get(
    '/admin/diadiem/{diadiem}',
    [AdminDiaDiemController::class, 'show']
)->name('admin.diadiem.show');

Route::get(
    '/admin/diadiem/{diadiem}/edit',
    [AdminDiaDiemController::class, 'edit']
)->name('admin.diadiem.edit');

Route::put(
    '/admin/diadiem/{diadiem}',
    [AdminDiaDiemController::class, 'update']
)->name('admin.diadiem.update');

Route::delete(
    '/admin/diadiem/{diadiem}',
    [AdminDiaDiemController::class, 'destroy']
)->name('admin.diadiem.destroy');

/*
ADMIN - NGƯỜI DÙNG
*/

Route::get(
    '/admin/nguoi-dung',
    [AdminNguoiDungController::class, 'index']
)->name('admin.nguoidung.index');

Route::get(
    '/admin/nguoi-dung/create',
    [AdminNguoiDungController::class, 'create']
)->name('admin.nguoidung.create');

Route::post(
    '/admin/nguoi-dung/store',
    [AdminNguoiDungController::class, 'store']
)->name('admin.nguoidung.store');

Route::get(
    '/admin/nguoi-dung/{id}',
    [AdminNguoiDungController::class, 'show']
)->name('admin.nguoidung.show');

Route::get(
    '/admin/nguoi-dung/{id}/edit',
    [AdminNguoiDungController::class, 'edit']
)->name('admin.nguoidung.edit');

Route::put(
    '/admin/nguoi-dung/{id}',
    [AdminNguoiDungController::class, 'update']
)->name('admin.nguoidung.update');

Route::delete(
    '/admin/nguoi-dung/{id}',
    [AdminNguoiDungController::class, 'destroy']
)->name('admin.nguoidung.destroy');

/*
USER - ĐẶT PHÒNG
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
USER - THANH TOÁN
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
    '/dat-phong/thanh-cong',
    [UserThanhToanController::class, 'thanhCong']
)->name('datphong.thanhcong');

Route::get(
    '/vnpay-return', 
    [UserThanhToanController::class, 'vnpayReturn'])
    ->name('vnpay.return');

/*
ADMIN - ĐẶT PHÒNG
*/

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
    '/admin/datphong/kiem-tra-phong',
    [AdminDatPhongController::class, 'kiemTraPhong']
)->name('admin.datphong.kiemTraPhong');

Route::put(
    '/admin/datphong/{id}/trangthai',
    [AdminDatPhongController::class, 'capNhatTrangThai']
)->name('admin.datphong.trangthai');

/*
USER - ĐỊA ĐIỂM DU LỊCH
*/

Route::get(
    '/diadiemdulich',
    function ()
    {
        return view('users.diadiemdulich.index');
    }
)->name('diadiemdulich.index');

/*
USER - CHI TIẾT KHÁCH SẠN
*/
Route::get(
    '/khach-san/{id}',
    [UserKhachSanController::class, 'show']
)->name('users.chitietkhachsan');

/*
User người dung
*/
Route::get(
    '/ho-so',
    [UserHoSoController::class, 'index']
)->middleware('auth')->name('hoso.index');
Route::get(
    '/ho-so/chinh-sua',
    [UserHoSoController::class, 'edit']
)->middleware('auth')->name('hoso.edit');

Route::put(
    '/ho-so/cap-nhat',
    [UserHoSoController::class, 'update']
)->middleware('auth')->name('hoso.update');

/*
Lịch sử đặt phòng 
*/
Route::get(
    '/lich-su-dat-phong',
    [UserLichSuDatPhongController::class, 'index']
)->middleware('auth')->name('lichsudatphong.index');

Route::get(
    '/lich-su-dat-phong/{maDonDatPhong}',
    [UserLichSuDatPhongController::class, 'show']
)->middleware('auth')->name('lichsudatphong.show');



require __DIR__ . '/auth.php';