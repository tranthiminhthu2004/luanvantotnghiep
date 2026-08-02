<?php

namespace App\Http\Controllers\DatPhong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiPhong;
use App\Models\KhachSan;
use Carbon\Carbon;

class UserDatPhongController extends Controller
{
    
   public function index()
{
    $duLieu = session('xac_nhan_dat_phong');

    if (!$duLieu)
    {
        return redirect()->route('khachsan.index');
    }

   $khachSan = KhachSan::with([
        'hinhAnh',
        'diaDiem'
    ])
    ->where(
        'trang_thai',
        1
    )
    ->where(
        'trang_thai_duyet',
        'DaDuyet'
    )
    ->findOrFail(
        $duLieu['ma_khach_san']
    );

    $duLieu['khachSan'] = $khachSan;

    return view(
        'users.datphong.index',
        $duLieu
    );
}

    public function xacNhan(Request $request)
    {
        $request->validate(
            [
                'ma_khach_san' => 'required|exists:khach_san,ma_khach_san',

                'ngay_nhan_phong' => 'required|date_format:d/m/Y',

                'ngay_tra_phong' => 'required|date_format:d/m/Y|after:ngay_nhan_phong',

                'so_nguoi_truong_thanh' => 'required|integer|min:1',

                'so_tre_em' => 'nullable|integer|min:0',

                'so_nguoi_cao_tuoi' => 'nullable|integer|min:0',

                'phong' => 'required|array',
            ],
            [
                'ma_khach_san.required' => 'Không tìm thấy khách sạn.',

                'ma_khach_san.exists' => 'Khách sạn không tồn tại.',

                'ngay_nhan_phong.required' => 'Vui lòng chọn ngày nhận phòng.',

                'ngay_nhan_phong.date_format' => 'Ngày nhận phòng không đúng định dạng.',

                'ngay_tra_phong.required' => 'Vui lòng chọn ngày trả phòng.',

                'ngay_tra_phong.date_format' => 'Ngày trả phòng không đúng định dạng.',

                'ngay_tra_phong.after' => 'Ngày trả phòng phải sau ngày nhận phòng.',

                'so_nguoi_truong_thanh.required' => 'Vui lòng nhập số người lớn.',

                'so_nguoi_truong_thanh.min' => 'Phải có ít nhất 1 người lớn.',

                'phong.required' => 'Vui lòng chọn phòng.',
            ]
        );

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

        if ($soDem <= 0)
        {
            return back()
                ->withInput()
                ->withErrors([
                    'ngay_tra_phong' => 'Số đêm phải lớn hơn 0.'
                ]);
        }

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
                'ma_loai_phong' => $loaiPhong->ma_loai_phong,

                'ten_loai_phong' => $loaiPhong->ten_loai_phong,

                'so_luong' => $soLuong,

                'gia' => $loaiPhong->gia_co_ban,

                'so_dem' => $soDem,

                'thanh_tien' => $thanhTien,
            ];
        }

        if (count($phongsDaChon) == 0)
        {
            return back()
                ->withInput()
                ->withErrors([
                    'phong' => 'Vui lòng chọn ít nhất một loại phòng.'
                ]);
        }
        

  $tongKhachTinhSucChua =
    (int) $request->so_nguoi_truong_thanh
    +
    (int) $request->so_nguoi_cao_tuoi;

$tongSucChua = 0;

foreach ($phongsDaChon as $phong)
{
    $loaiPhong = LoaiPhong::find(
        $phong['ma_loai_phong']
    );

    if (!$loaiPhong) {
        continue;
    }

    $tongSucChua +=

        $loaiPhong->so_nguoi_toi_da

        *

        $phong['so_luong'];
}

if ($tongKhachTinhSucChua > $tongSucChua)
{
    return back()
        ->withInput()
        ->withErrors([

            'phong' =>

            "Tổng sức chứa của các phòng chỉ là {$tongSucChua} người. Vui lòng chọn thêm phòng hoặc chọn loại phòng khác."

        ]);
}

        $tongNguoi =
            (int) $request->so_nguoi_truong_thanh +
            (int) $request->so_tre_em +
            (int) $request->so_nguoi_cao_tuoi;

        $khachSan = KhachSan::with([
            'hinhAnh',
            'diaDiem'
        ])->findOrFail(
            $request->ma_khach_san
        );
session([
    'xac_nhan_dat_phong' => [

        'ma_khach_san' => $khachSan->ma_khach_san,

        'phongsDaChon' => $phongsDaChon,

        'chi_tiet_phong' => collect($phongsDaChon)
            ->map(function ($phong) {

                return [

                    'ma_loai_phong' => $phong['ma_loai_phong'],

                    'so_luong_phong' => $phong['so_luong'],

                    'gia_dat_thuc_te' => $phong['gia'],

                    'so_dem' => $phong['so_dem'],

                    'thanh_tien' => $phong['thanh_tien'],

                ];

            })
            ->values()
            ->toArray(),

        'tongTien' => $tongTien,

        'tongNguoi' => $tongNguoi,

        'soDem' => $soDem,

        // Hiển thị
        'ngayNhanPhong' => $request->ngay_nhan_phong,

        'ngayTraPhong' => $request->ngay_tra_phong,

        // DatPhongService sử dụng
        'ngay_nhan_phong' => Carbon::createFromFormat(
            'd/m/Y',
            $request->ngay_nhan_phong
        )->format('Y-m-d'),

        'ngay_tra_phong' => Carbon::createFromFormat(
            'd/m/Y',
            $request->ngay_tra_phong
        )->format('Y-m-d'),

        'soNguoiTruongThanh' => (int) $request->so_nguoi_truong_thanh,

        'soTreEm' => (int) $request->so_tre_em,

        'soNguoiCaoTuoi' => (int) $request->so_nguoi_cao_tuoi,

    ]
]);

        return redirect()->route(
            'datphong.xacnhan.index'
        );
    }
}