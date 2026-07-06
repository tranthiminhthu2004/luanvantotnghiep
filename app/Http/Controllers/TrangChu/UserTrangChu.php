<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiaDiem;
use App\Models\KhachSan;
use App\Models\DiaDiemDuLich;
use App\Models\NhuCauDuLich;

class UserTrangChu extends Controller
{
    public function index(Request $request)
    {
        if (
            auth()->check() &&
            auth()->user()->ma_vai_tro == 1
        ) {
            return redirect()->route('dashboard');
        }

        $diaDiems = DiaDiem::orderBy('ten_dia_diem')->get();

        $nhuCaus = NhuCauDuLich::orderBy('ten_nhu_cau')->get();

        $khachSansTimKiem = collect();

        $diaDiemDuLichsTimKiem = collect();

        $daTimKiem = $request->filled('ma_dia_diem');

        if ($daTimKiem) {
            $khachSansTimKiem = KhachSan::where('trang_thai', 1)
                ->where('ma_dia_diem', $request->ma_dia_diem)
                ->with([
                    'hinhAnh',
                    'diaDiem',
                    'loaiPhongs'
                ])
                ->get();

            $diaDiemDuLichsTimKiem = DiaDiemDuLich::where(
                'ma_dia_diem',
                $request->ma_dia_diem
            )
                ->with([
                    'hinhAnhs',
                    'diaDiem'
                ])
                ->get();
        }
        
        $khachSansNoiBat = KhachSan::where('trang_thai', 1)
    ->with([
        'hinhAnh',
        'diaDiem',
        'loaiPhongs'
    ])
    ->orderByDesc('so_sao_khach_san')
    ->limit(4)
    ->get();
    
        return view(
            'users.index',
            compact(
                'diaDiems',
                'nhuCaus',
                'khachSansTimKiem',
                'diaDiemDuLichsTimKiem',
                'daTimKiem',
                'khachSansNoiBat'
            )
        );
    }
}