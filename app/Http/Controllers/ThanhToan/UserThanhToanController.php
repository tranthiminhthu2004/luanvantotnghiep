<?php

namespace App\Http\Controllers\ThanhToan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DatPhong;
use App\Models\ThanhToan;
use App\Models\KhachSan;

use App\Services\VNPayService;
use App\Services\DatPhongService;

use Illuminate\Support\Facades\Mail;
use App\Mail\DatPhongThanhCongMail;

class UserThanhToanController extends Controller
{
    protected $vnpayService;

    protected $datPhongService;

    public function __construct(
        VNPayService $vnpayService,
        DatPhongService $datPhongService
    )
    {
        $this->vnpayService = $vnpayService;

        $this->datPhongService = $datPhongService;
    }

    /**
     * Hiển thị trang thanh toán
     */
    public function index(Request $request)
    {
        $request->validate(
            [
                'ho_ten' => 'required|max:100',

                'so_dien_thoai' => 'required|regex:/^[0-9]{10}$/',

                'email' => 'required|email',

                'ghi_chu' => 'nullable|max:500',
            ],
            [
                'ho_ten.required' => 'Vui lòng nhập họ và tên.',

                'ho_ten.max' => 'Họ và tên không được quá 100 ký tự.',

                'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại.',

                'so_dien_thoai.regex' => 'Số điện thoại không hợp lệ.',

                'email.required' => 'Vui lòng nhập email.',

                'email.email' => 'Email không đúng định dạng.',

                'ghi_chu.max' => 'Ghi chú tối đa 500 ký tự.',
            ]
        );

        $duLieu = session('xac_nhan_dat_phong');

        if (!$duLieu)
        {
            return redirect()->route(
                'khachsan.index'
            );
        }

        $khachSan = KhachSan::with([
            'hinhAnh',
            'diaDiem'
        ])->findOrFail(
            $duLieu['ma_khach_san']
        );

        $duLieu['khachSan'] = $khachSan;

        $duLieu['ho_ten'] = $request->ho_ten;

        $duLieu['so_dien_thoai'] = $request->so_dien_thoai;

        $duLieu['email'] = $request->email;

        $duLieu['ghi_chu'] = $request->ghi_chu;

        return view(
            'users.thanhtoan.index',
            $duLieu
        );
    }

    public function store(Request $request)
    {
        $duLieu = session(
            'xac_nhan_dat_phong'
        );

        if (!$duLieu)
        {
            return redirect()->route(
                'khachsan.index'
            );
        }

        $loaiThanhToan =
            $request->phuong_thuc_thanh_toan;

        $soTienThanhToan =
            $duLieu['tongTien'];

        $moTa =
            'Thanh toán toàn bộ đặt phòng';

        if ($loaiThanhToan == 'DatCoc')
        {
            $soTienThanhToan = round(
                $duLieu['tongTien'] * 0.3
            );

            $moTa =
                'Đặt cọc 30% đặt phòng';
        }

        session([

            'du_lieu_vnpay' => [

                'duLieu' => $duLieu,

                'thongTinKhach' =>
                    $request->all(),

                'loaiThanhToan' =>
                    $loaiThanhToan

            ]

        ]);

        $url = $this->vnpayService
            ->createPaymentUrl(

                uniqid('DP'),

                $soTienThanhToan,

                $moTa

            );

        return redirect()->away($url);
    }
 
    public function thanhCong()
    {
        $maDonDatPhong = session(
            'ma_don_dat_phong'
        );

        if (!$maDonDatPhong)
        {
            return redirect()->route(
                'users.index'
            );
        }

        $datPhong = DatPhong::with([

            'khachSan',

            'chiTietDatPhong.loaiPhong',

            'thanhToans'

        ])->findOrFail(
            $maDonDatPhong
        );

        return view(
            'users.thanhtoan.thongbaothanhcong',
            compact('datPhong')
        );
    }

   public function vnpayReturn(Request $request)
{
    if (
        !$this->vnpayService->verifyResponse(
            $request->all()
        )
    ) {
        return redirect()
            ->route('khachsan.index')
            ->with(
                'error',
                'Chữ ký VNPay không hợp lệ.'
            );
    }

    if ($request->vnp_ResponseCode != '00') {
        return redirect()
            ->route('khachsan.index')
            ->with(
                'error',
                'Thanh toán thất bại.'
            );
    }

    $duLieuVNPay = session('du_lieu_vnpay');

    if (!$duLieuVNPay) {
        return redirect()
            ->route('khachsan.index')
            ->with(
                'error',
                'Phiên thanh toán đã hết hạn.'
            );
    }

    try {

        $loaiThanhToan =
            $duLieuVNPay['loaiThanhToan'];

        if ($loaiThanhToan == 'DatCoc') {

            $soTienThanhToan = round(
                $duLieuVNPay['duLieu']['tongTien'] * 0.3
            );

        } else {

            $soTienThanhToan =
                $duLieuVNPay['duLieu']['tongTien'];

        }

        $hoTen = trim(
            $duLieuVNPay['thongTinKhach']['ho_ten']
        );

        $tachTen = explode(' ', $hoTen);

        $ten = array_pop($tachTen);

        $hoVaTenDem = implode(' ', $tachTen);

        $duLieuService = [

            'ma_nguoi_dung' =>
                auth()->check()
                    ? auth()->user()->ma_nguoi_dung
                    : null,

            'ma_khach_san' =>
                $duLieuVNPay['duLieu']['ma_khach_san'],

            'ho_va_ten_dem_khach' =>
                $hoVaTenDem,

            'ten_khach' =>
                $ten,

            'email_khach' =>
                $duLieuVNPay['thongTinKhach']['email'],

            'so_dien_thoai_khach' =>
                $duLieuVNPay['thongTinKhach']['so_dien_thoai'],

            'ngay_nhan_phong' =>
                $duLieuVNPay['duLieu']['ngay_nhan_phong'],

            'ngay_tra_phong' =>
                $duLieuVNPay['duLieu']['ngay_tra_phong'],

            'so_nguoi_truong_thanh' =>
                $duLieuVNPay['duLieu']['soNguoiTruongThanh'],

            'so_tre_em' =>
                $duLieuVNPay['duLieu']['soTreEm'],

            'so_nguoi_cao_tuoi' =>
                $duLieuVNPay['duLieu']['soNguoiCaoTuoi'],

            'ghi_chu' =>
                $duLieuVNPay['thongTinKhach']['ghi_chu'] ?? null,

            'chi_tiet_phong' =>
                $duLieuVNPay['duLieu']['chi_tiet_phong']

        ];

$datPhong = $this->datPhongService
    ->taoDonDatPhong($duLieuService);
        $datPhong = $this->datPhongService
            ->taoDonDatPhong($duLieuService);

        ThanhToan::create([

            'ma_don_dat_phong' =>
                $datPhong->ma_don_dat_phong,

            'loai_thanh_toan' =>
                $loaiThanhToan,

            'so_tien' =>
                $soTienThanhToan,

            'phuong_thuc_thanh_toan' =>
                'VNPay',

            'trang_thai_thanh_toan' =>
                'ThanhCong',

            'ma_giao_dich' =>
                $request->vnp_TransactionNo,

            'ngay_thanh_toan' =>
                now()

        ]);

        $datPhong->load([

            'khachSan',

            'chiTietDatPhong.loaiPhong',

            'thanhToans'

        ]);

        Mail::to(
            $datPhong->email_khach
        )->send(
            new DatPhongThanhCongMail($datPhong)
        );


        session([
            'ma_don_dat_phong' =>
                $datPhong->ma_don_dat_phong
        ]);

        session()->forget('du_lieu_vnpay');
        session()->forget('xac_nhan_dat_phong');

        return redirect()->route(
            'datphong.thanhcong'
        );

    } catch (\Throwable $e) {

        dd(
            $e->getMessage(),
            $e->getFile(),
            $e->getLine()
        );
    }
}
}