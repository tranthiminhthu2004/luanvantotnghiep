<?php

namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use App\Models\KhachSan;
use App\Models\DiaDiem;
use Illuminate\Http\Request;

class UserKhachSanController extends Controller
{
public function index(Request $request)
{
     
    $query = KhachSan::where(
        'trang_thai',
        1
    );

    if($request->filled('ma_dia_diem'))
    {
        $query->where(
            'ma_dia_diem',
            $request->ma_dia_diem
        );
    }

    $khachSans = $query
        ->with([
            'hinhAnh',
            'diaDiem'
        ])
        ->paginate(5)
        ->withQueryString();

    $diaDiems = DiaDiem::orderBy(
        'ten_dia_diem'
    )->get();

    return view(
        'users.khachsan.index',
        compact(
            'khachSans',
            'diaDiems'
        )
    );
}
  public function show(Request $request, $id)
{
    $khachSan = KhachSan::with([
        'loaiPhongs.hinhAnh',
        'loaiPhongs.phongs'
    ])->findOrFail($id);

    $tongNguoi =
        (int)$request->so_nguoi_truong_thanh +
        (int)$request->so_tre_em +
        (int)$request->so_nguoi_cao_tuoi;

    $soPhong =
        (int)$request->so_luong_phong;

    $sucChuaCanThiet =
        ceil(
            $tongNguoi /
            max($soPhong, 1)
        );

    // Danh sách phòng được đề xuất
    $loaiPhongsDeXuat = $khachSan
        ->loaiPhongs()
        ->where(
            'so_nguoi_toi_da',
            '>=',
            $sucChuaCanThiet
        )
        ->with([
            'hinhAnh',
            'phongs'
        ])
        ->get();
    $loaiPhongsKhac = $khachSan
    ->loaiPhongs()
    ->where(
        'so_nguoi_toi_da',
        '<',
        $sucChuaCanThiet
    )
    ->with([
        'hinhAnh',
        'phongs'
    ])
    ->get();

    return view(
        'users.chitietkhachsan.index',
        compact(
            'khachSan',
            'loaiPhongsDeXuat',
            'tongNguoi',
            'soPhong',
            'sucChuaCanThiet',
            'loaiPhongsKhac'
        )
    );
}
   public function timKiem(Request $request)
{
     
    $query = KhachSan::where(
        'trang_thai',
        1
    );

    if($request->filled('ma_dia_diem'))
    {
        $query->where(
            'ma_dia_diem',
            $request->ma_dia_diem
        );
    }

    $khachSans = $query
        ->with([
            'hinhAnh',
            'diaDiem'
        ])
        ->paginate(10)
        ->withQueryString();

    $diaDiems = DiaDiem::orderBy(
        'ten_dia_diem'
    )->get();

    return view(
        'users.khachsan.ketqua',
        compact(
            'khachSans',
            'diaDiems'
        )
    );
}
}