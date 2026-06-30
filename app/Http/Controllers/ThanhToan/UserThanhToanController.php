<?php

namespace App\Http\Controllers\ThanhToan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DatPhong;
use App\Models\ChiTietDatPhong;
use App\Models\ThanhToan;
use App\Models\KhachSan;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class UserThanhToanController extends Controller
{
    public function index(Request $request)
{
    $request->validate(
        [
            'ho_ten' => 'required|max:100',

            'so_dien_thoai' => 'required|regex:/^[0-9]{10}$/',

            'email' => 'required|email',

            'ghi_chu' => 'nullable|max:500',
        ],
        [
            'ho_ten.required' => 'Vui lòng nhập họ và tên.',

            'ho_ten.max' => 'Họ và tên không được quá 100 ký tự.',

            'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại.',

            'so_dien_thoai.regex' => 'Số điện thoại không hợp lệ.',

            'email.required' => 'Vui lòng nhập email.',

            'email.email' => 'Email không đúng định dạng.',

            'ghi_chu.max' => 'Ghi chú tối đa 500 ký tự.',
        ]
    );

    $duLieu = session('xac_nhan_dat_phong');

    if (!$duLieu)
    {
        return redirect()->route('khachsan.index');
    }

    $khachSan = KhachSan::with([
        'hinhAnh',
        'diaDiem'
    ])->findOrFail(
        $duLieu['ma_khach_san']
    );

    $duLieu['khachSan'] = $khachSan;

    $duLieu['ho_ten'] = $request->ho_ten;

    $duLieu['so_dien_thoai'] = $request->so_dien_thoai;

    $duLieu['email'] = $request->email;

    $duLieu['ghi_chu'] = $request->ghi_chu;

    return view(
        'users.thanhtoan.index',
        $duLieu
    );
}
// Lưu đơn đặt phòng
public function store(Request $request)
{
    $duLieu = session('xac_nhan_dat_phong');

    if (!$duLieu)
    {
        return redirect()->route('khachsan.index');
    }

    DB::beginTransaction();

    try
    {
        $hoTen = trim($request->ho_ten);

        $tachTen = explode(' ', $hoTen);

        $ten = array_pop($tachTen);

        $hoVaTenDem = implode(' ', $tachTen);

       $datPhong = DatPhong::create([
    'ma_dat_phong' => '',

    'ma_nguoi_dung' => auth()->id(),

    'ma_khach_san' => $duLieu['ma_khach_san'],

    'ho_va_ten_dem_khach' => $hoVaTenDem,

    'ten_khach' => $ten,

    'email_khach' => $request->email,

    'so_dien_thoai_khach' => $request->so_dien_thoai,

    'ngay_nhan_phong' => Carbon::createFromFormat(
        'd/m/Y',
        $duLieu['ngayNhanPhong']
    )->format('Y-m-d'),

    'ngay_tra_phong' => Carbon::createFromFormat(
        'd/m/Y',
        $duLieu['ngayTraPhong']
    )->format('Y-m-d'),

    'so_nguoi_truong_thanh' => $duLieu['soNguoiTruongThanh'],

    'so_tre_em' => $duLieu['soTreEm'],

    'so_nguoi_cao_tuoi' => $duLieu['soNguoiCaoTuoi'],

    'tong_tien' => $duLieu['tongTien'],

    'trang_thai_dat_phong' => 'ChoXacNhan',

    'ghi_chu' => $request->ghi_chu,

    'ngay_dat' => now(),
]);

$datPhong->update([
    'ma_dat_phong' => 'DP' . str_pad(
        $datPhong->ma_don_dat_phong,
        6,
        '0',
        STR_PAD_LEFT
    )
]);

// Lưu chi tiết đặt phòng
foreach ($duLieu['phongsDaChon'] as $phong)
{
    ChiTietDatPhong::create(
    [
        'ma_don_dat_phong' => $datPhong->ma_don_dat_phong,

        'ma_loai_phong' => $phong['ma_loai_phong'],

        'so_luong_phong' => $phong['so_luong'],

        'gia_dat_thuc_te' => $phong['gia'],

        'so_dem' => $phong['so_dem'],

        'thanh_tien' => $phong['thanh_tien'],
    ]);
}
// Lưu thông tin thanh toán
ThanhToan::create(
[
    'ma_don_dat_phong' => $datPhong->ma_don_dat_phong,

    'so_tien' => $duLieu['tongTien'],

    'phuong_thuc_thanh_toan' => 'TienMat',

    'trang_thai_thanh_toan' => 'ChuaThanhToan',

    'ma_giao_dich' => null,

    'ngay_thanh_toan' => null,
]);

// Hoàn tất Transaction
DB::commit();

// Lưu mã đơn vừa tạo
session([
    'ma_don_dat_phong' => $datPhong->ma_don_dat_phong
]);

// Xóa dữ liệu xác nhận đặt phòng
session()->forget('xac_nhan_dat_phong');

return redirect()->route(
    'datphong.thanhcong'
);
}
catch (\Exception $e)
{
    DB::rollBack();

    return back()
        ->withInput()
        ->with(
            'error',
            'Đặt phòng thất bại.'
        );
}
}
public function thanhCong()
{
    $maDonDatPhong = session(
        'ma_don_dat_phong'
    );

    if (!$maDonDatPhong)
    {
        return redirect()->route(
            'users.index'
        );
    }

    $datPhong = DatPhong::with([
        'khachSan'
    ])->findOrFail(
        $maDonDatPhong
    );

    return view(
        'users.thanhtoan.thongbaothanhcong',
        compact('datPhong')
    );
}
}