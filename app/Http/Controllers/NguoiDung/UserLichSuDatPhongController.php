<?php

namespace App\Http\Controllers\NguoiDung;

use App\Http\Controllers\Controller;
use App\Models\DatPhong;
use Illuminate\Support\Facades\Auth;
use App\Services\DatPhongService;
use Illuminate\Http\Request;

class UserLichSuDatPhongController extends Controller
{
    protected $datPhongService;

    public function __construct(DatPhongService $datPhongService)
    {
    $this->datPhongService = $datPhongService;
    }

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
    public function huy($maDonDatPhong)
{
    try {

        $datPhong = DatPhong::where(
                'ma_nguoi_dung',
                Auth::user()->ma_nguoi_dung
            )
            ->where(
                'ma_don_dat_phong',
                $maDonDatPhong
            )
            ->firstOrFail();

        $this->datPhongService->huyDatPhong(
            $datPhong->ma_don_dat_phong
        );

        return redirect()
            ->route('lichsudatphong.show', $maDonDatPhong)
            ->with(
                'success',
                'Hủy đặt phòng thành công.'
            );

    } catch (\Exception $e) {

        return back()->with(
            'error',
            $e->getMessage()
        );

    }
}
}