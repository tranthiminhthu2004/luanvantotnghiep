<?php

namespace App\Http\Controllers\NguoiDung;

use App\Http\Controllers\Controller;
use App\Models\DatPhong;
use Illuminate\Support\Facades\Auth;
use App\Services\DatPhongService;
use Illuminate\Http\Request;
use App\Services\VNPayService;
use App\Models\ThanhToan;

class UserLichSuDatPhongController extends Controller
{
    protected $datPhongService;
    
    protected $vnpayService;

   public function __construct( DatPhongService $datPhongService, VNPayService $vnpayService )
   {
    $this->datPhongService = $datPhongService;

    $this->vnpayService = $vnpayService;
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
public function thanhToanLai(
    Request $request,
    $maDonDatPhong
)
{
    $datPhong = DatPhong::where(
            'ma_nguoi_dung',
            Auth::user()->ma_nguoi_dung
        )
        ->where(
            'ma_don_dat_phong',
            $maDonDatPhong
        )
        ->firstOrFail();

    if (
        $datPhong->trang_thai_dat_phong
        != 'ChoThanhToan'
    ) {

        return back()->with(
            'error',
            'Đơn này không thể thanh toán.'
        );

    }

    if ( now()->gt( $datPhong->han_thanh_toan))
        {

        return back()->with(
            'error',
            'Đơn đặt phòng đã hết hạn thanh toán.'
        );

    }

    // Lấy loại thanh toán từ request, mặc định là ThanhToanToanBo
    $loaiThanhToan = in_array(
        $request->loai_thanh_toan,
        ['DatCoc', 'ThanhToanToanBo']
    ) ? $request->loai_thanh_toan : 'ThanhToanToanBo';

    $soTien =
        $datPhong->tong_tien;

    $moTa =
        'Thanh toán toàn bộ đặt phòng';

    if (
        $loaiThanhToan
        == 'DatCoc'
    ) {

        $soTien = round(
            $soTien * 0.3
        );

        $moTa =
            'Đặt cọc 30% đặt phòng';

    }

    // Tạo bản ghi ThanhToan mới để vnpayReturn cập nhật đúng
    ThanhToan::create([
        'ma_don_dat_phong'   => $datPhong->ma_don_dat_phong,
        'loai_thanh_toan'    => $loaiThanhToan,
        'so_tien'            => $soTien,
        'phuong_thuc_thanh_toan' => 'VNPay',
        'trang_thai_thanh_toan'  => 'ChoXuLy',
    ]);

    session([

        'ma_don_dat_phong' =>

            $datPhong->ma_don_dat_phong,

        'du_lieu_vnpay' => [

            'loaiThanhToan' =>

                $loaiThanhToan,

            'soTienThanhToan' =>

                $soTien,

            'ma_dat_phong' =>

                $datPhong->ma_dat_phong

        ]

    ]);

    $url =
        $this->vnpayService
            ->createPaymentUrl(

                $datPhong->ma_dat_phong,

                $soTien,

                $moTa

            );

    return redirect()->away(
        $url
    );
}
}