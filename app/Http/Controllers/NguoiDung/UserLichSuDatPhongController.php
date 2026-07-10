<?php

namespace App\Http\Controllers\NguoiDung;

use App\Http\Controllers\Controller;
use App\Models\DatPhong;
use Illuminate\Support\Facades\Auth;

class UserLichSuDatPhongController extends Controller
{
    public function index()
    {
        $maNguoiDung = Auth::user()->ma_nguoi_dung;

        $datPhongs = DatPhong::with([
            'khachSan.hinhAnh',
            'chiTietDatPhong.loaiPhong'
        ])
        ->where(
            'ma_nguoi_dung',
            $maNguoiDung
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
        $maNguoiDung = Auth::user()->ma_nguoi_dung;

        $datPhong = DatPhong::with([
            'khachSan.hinhAnh',
            'chiTietDatPhong.loaiPhong',
            'thanhToans'
        ])
        ->where(
            'ma_nguoi_dung',
            $maNguoiDung
        )
        ->where(
            'ma_don_dat_phong',
            $maDonDatPhong
        )
        ->firstOrFail();

        return view(
            'users.lichsudatphong.show',
            compact('datPhong')
        );
    }
}