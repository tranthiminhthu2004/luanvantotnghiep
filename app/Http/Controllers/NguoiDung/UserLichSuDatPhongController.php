<?php

namespace App\Http\Controllers\NguoiDung;

use App\Http\Controllers\Controller;
use App\Models\DatPhong;
use Illuminate\Support\Facades\Auth;

class UserLichSuDatPhongController extends Controller
{
    public function index()
    {
        $datPhongs =DatPhong::with([
    'khachSan.hinhAnh',
    'chiTietDatPhong.loaiPhong'
])
        ->where(
            'ma_nguoi_dung',
            Auth::id()
        )
        ->orderByDesc('ngay_dat')
        ->paginate(6);

        return view(
            'users.lichsudatphong.index',
            compact('datPhongs')
        );
    }

    public function show($maDonDatPhong)
    {
        $datPhong = DatPhong::with([
    'khachSan.hinhAnh',
    'chiTietDatPhong.loaiPhong',
            'thanhToan'
        ])
        ->where(
            'ma_nguoi_dung',
            Auth::id()
        )
        ->findOrFail($maDonDatPhong);

        return view(
            'users.lichsudatphong.show',
            compact('datPhong')
        );
    }
}