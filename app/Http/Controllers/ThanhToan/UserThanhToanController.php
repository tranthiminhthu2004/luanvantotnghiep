<?php

namespace App\Http\Controllers\ThanhToan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DatPhong;
use App\Models\ThanhToan;
use App\Models\KhachSan;

use App\Services\VNPayService;
use App\Services\DatPhongService;

use Illuminate\Support\Facades\DB;

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
    $request->validate([
    'phuong_thuc_thanh_toan' =>
        'required|in:DatCoc,ThanhToanToanBo',
    ],[
    'phuong_thuc_thanh_toan.required' =>
        'Vui lòng chọn phương thức thanh toán.',

    'phuong_thuc_thanh_toan.in' =>
        'Phương thức thanh toán không hợp lệ.',
    ]);

    $duLieu = session('xac_nhan_dat_phong');

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

    $hoTen = trim(
        $request->ho_ten
    );

    $tachTen = explode(
        ' ',
        $hoTen
    );

    $ten = array_pop(
        $tachTen
    );

    $hoVaTenDem = implode(
        ' ',
        $tachTen
    );

    $duLieuService = [

        'ma_nguoi_dung' =>

            auth()->check()
                ? auth()->user()->ma_nguoi_dung
                : null,

        'ma_khach_san' =>

            $duLieu['ma_khach_san'],

        'ho_va_ten_dem_khach' =>

            $hoVaTenDem,

        'ten_khach' =>

            $ten,

        'email_khach' =>

            $request->email,

        'so_dien_thoai_khach' =>

            $request->so_dien_thoai,

        'ngay_nhan_phong' =>

            $duLieu['ngay_nhan_phong'],

        'ngay_tra_phong' =>

            $duLieu['ngay_tra_phong'],

        'so_nguoi_truong_thanh' =>

            $duLieu['soNguoiTruongThanh'],

        'so_tre_em' =>

            $duLieu['soTreEm'],

        'so_nguoi_cao_tuoi' =>

            $duLieu['soNguoiCaoTuoi'],

        'ghi_chu' =>

            $request->ghi_chu,

        'chi_tiet_phong' =>

            $duLieu['chi_tiet_phong']

    ];

    $datPhong =
        $this->datPhongService
            ->taoDonDatPhong(
                $duLieuService
            );
            
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

        'ChoXuLy'

]);

    session([

    'ma_don_dat_phong' =>

        $datPhong->ma_don_dat_phong,

    'du_lieu_vnpay' => [

        'loaiThanhToan' => $loaiThanhToan,

        'soTienThanhToan' => $soTienThanhToan,

        'ma_dat_phong' =>  $datPhong->ma_dat_phong

    ]

]);

    $url =
        $this->vnpayService
            ->createPaymentUrl(

                $datPhong->ma_dat_phong,

                $soTienThanhToan,

                $moTa

            );

    return redirect()->away($url);
}
 
    public function thanhCong($maDonDatPhong)
    {
        $datPhong = DatPhong::with([

            'khachSan',

            'chiTietDatPhong.loaiPhong',

            'thanhToans'

        ])->findOrFail($maDonDatPhong);

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

  // Thanh toán chưa thành công
if ($request->vnp_ResponseCode != '00') {

    return redirect()
        ->route('lichsudatphong.index')
        ->with(
            'warning',
            'Thanh toán chưa thành công. Đơn đặt phòng vẫn được giữ trong 24 giờ, bạn có thể thanh toán lại trước khi hết hạn.'
        );
}

    $maDatPhong = $request->vnp_TxnRef;

    $datPhongRecord = DatPhong::where('ma_dat_phong', $maDatPhong)->first();

    if (!$datPhongRecord) {
        return redirect()
            ->route('lichsudatphong.index')
            ->with('error', 'Không tìm thấy đơn đặt phòng.');
    }

    $maDonDatPhong = $datPhongRecord->ma_don_dat_phong;

   try {

    DB::beginTransaction();

    $thanhToan = ThanhToan::where(
        'ma_don_dat_phong',
        $maDonDatPhong
    )->where('trang_thai_thanh_toan', 'ChoXuLy')
     ->latest('ma_thanh_toan')
     ->firstOrFail();

    $thanhToan->update([
        'trang_thai_thanh_toan' => 'ThanhCong',
        'ma_giao_dich' => $request->vnp_TransactionNo,
        'ngay_thanh_toan' => now()
    ]);

    $datPhong = $this->datPhongService
        ->xacNhanThanhToan($maDonDatPhong);

    DB::commit();

    // Gửi mail 
    try {
        \Mail::to($datPhong->email_khach)
            ->send(new \App\Mail\DatPhongThanhCongMail($datPhong));
    } catch (\Throwable $mailEx) {
        \Log::error('Gửi mail xác nhận thất bại: ' . $mailEx->getMessage());
    }

    session()->forget('du_lieu_vnpay');
    session()->forget('xac_nhan_dat_phong');
    session()->forget('ma_don_dat_phong');

    return redirect()
        ->route('datphong.thanhcong', ['maDonDatPhong' => $maDonDatPhong]);

} catch (\Throwable $e) {

    DB::rollBack();

    return redirect()
        ->route('lichsudatphong.index')
        ->with(
            'error',
            $e->getMessage()
        );
}
}
}