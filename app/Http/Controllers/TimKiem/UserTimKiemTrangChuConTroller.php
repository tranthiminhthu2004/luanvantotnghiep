<?php

namespace App\Http\Controllers\TimKiem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiaDiem;
use App\Models\DiaDiemDuLich;
use App\Models\KhachSan;

class UserTimKiemTrangChuController extends Controller
{
   public function index(Request $request)
{
    $request->validate([
            'ma_dia_diem' => 'required',
            'ngay_nhan_phong' => 'required',
            'ngay_tra_phong' => 'required',
        ], [
            'ma_dia_diem.required' => 'Vui lòng chọn địa điểm.',
            'ngay_nhan_phong.required' => 'Vui lòng chọn ngày nhận phòng.',
            'ngay_tra_phong.required' => 'Vui lòng chọn ngày trả phòng.',
    ]);
    $diaDiems = DiaDiem::orderBy(
        'ten_dia_diem'
    )->get();

    $diaDiemDaChon = null;

    $diaDiemDuLichs = collect();

    $khachSans = KhachSan::whereRaw('1 = 0')
        ->paginate(6);

    if ($request->filled('ma_dia_diem')) {

        $diaDiemDaChon = DiaDiem::find(
            $request->ma_dia_diem
        );

        $diaDiemDuLichs = DiaDiemDuLich::where(
            'ma_dia_diem',
            $request->ma_dia_diem
        )
            ->with([
                'diaDiem',
                'hinhAnhs'
            ])
            ->get();

        $khachSans = KhachSan::where(
            'trang_thai',
            1
        )
            ->where(
                'ma_dia_diem',
                $request->ma_dia_diem
            )
            ->with([
                'hinhAnh',
                'diaDiem',
                'loaiPhongs'
            ])
            ->paginate(6)
            ->withQueryString();
    }

   if ($request->ajax()) {
    return view(
        'users.trangchu.ketquatrangchu',
        compact(
            'diaDiemDaChon',
            'diaDiemDuLichs',
            'khachSans'
        )
    );
}

return view(
    'users.trangchu.ketquatrangchu',
    compact(
        'diaDiems',
        'diaDiemDaChon',
        'diaDiemDuLichs',
        'khachSans'
    )
);
}
}