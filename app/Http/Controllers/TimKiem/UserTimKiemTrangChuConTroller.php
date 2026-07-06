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

    return view(
        'users.timkiem.ketquatrangchu',
        compact(
            'diaDiems',
            'diaDiemDaChon',
            'diaDiemDuLichs',
            'khachSans'
        )
    );
}
}