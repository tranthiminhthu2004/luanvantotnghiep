<?php

namespace App\Http\Controllers\DatPhong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiPhong;
use App\Models\KhachSan;
use Carbon\Carbon;

class UserDatPhongController extends Controller
{
    public function xacNhan(Request $request)
    {
        $phongsDaChon = [];

        $tongTien = 0;

        $soDem = Carbon::createFromFormat(
            'd/m/Y',
            $request->ngay_nhan_phong
        )->diffInDays(
            Carbon::createFromFormat(
                'd/m/Y',
                $request->ngay_tra_phong
            )
        );

        foreach ($request->phong as $maLoaiPhong => $soLuong)
        {
            if ($soLuong <= 0)
            {
                continue;
            }

            $loaiPhong = LoaiPhong::findOrFail(
                $maLoaiPhong
            );

            $thanhTien =
                $loaiPhong->gia_co_ban *
                $soLuong *
                $soDem;

            $tongTien += $thanhTien;

            $phongsDaChon[] =
            [
                'ma_loai_phong' =>
                    $loaiPhong->ma_loai_phong,

                'ten' =>
                    $loaiPhong->ten_loai_phong,

                'so_luong' =>
                    $soLuong,

                'gia' =>
                    $loaiPhong->gia_co_ban,

                'so_dem' =>
                    $soDem,

                'thanh_tien' =>
                    $thanhTien,
            ];
        }

        $tongNguoi =
            (int)$request->so_nguoi_truong_thanh +
            (int)$request->so_tre_em +
            (int)$request->so_nguoi_cao_tuoi;

        $khachSan = KhachSan::with([
            'hinhAnh',
            'diaDiem'
        ])->findOrFail(
            $request->ma_khach_san
        );

        return view(
            'users.datphong.index',
            [
                'khachSan'      => $khachSan,
                'phongsDaChon'  => $phongsDaChon,
                'tongTien'      => $tongTien,
                'tongNguoi'     => $tongNguoi,
                'soDem'         => $soDem,
                'ngayNhanPhong' => $request->ngay_nhan_phong,
                'ngayTraPhong'  => $request->ngay_tra_phong,
            ]
        );
    }
}