<?php

namespace App\Http\Controllers\ThanhToan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DatPhong;
use App\Models\ChiTietDatPhong;
use App\Models\ThanhToan;
use App\Models\KhachSan;
use App\Services\VNPayService;
use App\Services\PhongService;
use App\Models\LichPhong;
use Illuminate\Support\Facades\Mail;
use App\Mail\DatPhongThanhCongMail;
use App\Models\LoaiPhong;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class UserThanhToanController extends Controller
{
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
        return redirect()->route('khachsan.index');
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
    $duLieu = session('xac_nhan_dat_phong');

    if (!$duLieu) {
        return redirect()->route('khachsan.index');
    }

    $loaiThanhToan = $request->phuong_thuc_thanh_toan;

    // Mặc định thanh toán toàn bộ
    $soTienThanhToan = $duLieu['tongTien'];

    $moTa = 'Thanh toán toàn bộ đặt phòng';

    // Nếu chọn đặt cọc
    if ($loaiThanhToan == 'DatCoc') {

        $soTienThanhToan = round($duLieu['tongTien'] * 0.3);

        $moTa = 'Đặt cọc 30% đặt phòng';
    }

    // Lưu dữ liệu để xử lý sau khi VNPay trả về
    session([
        'du_lieu_vnpay' => [
            'duLieu' => $duLieu,
            'thongTinKhach' => $request->all(),
            'loaiThanhToan' => $loaiThanhToan,
        ]
    ]);

    $url = $this->vnpayService->createPaymentUrl(
        uniqid('DP'),
        $soTienThanhToan,
        $moTa
    );

    return redirect()->away($url);
}

private function luuDonDatPhong(
    array $duLieu,
    array $thongTinKhach,
    string $phuongThucThanhToan,
    string $loaiThanhToan,
    float $soTienThanhToan,
    string $trangThaiThanhToan,
    string $trangThaiDatPhong = 'DaXacNhan',
    ?string $maGiaoDich = null,
    ?string $ngayThanhToan = null
)
{
    DB::beginTransaction();

    try {

        $ngayNhanPhong = Carbon::createFromFormat(
            'd/m/Y',
            $duLieu['ngayNhanPhong']
        )->format('Y-m-d');

        $ngayTraPhong = Carbon::createFromFormat(
            'd/m/Y',
            $duLieu['ngayTraPhong']
        )->format('Y-m-d');

       
        $danhSachPhong = [];

        foreach ($duLieu['phongsDaChon'] as $phong) {

            $phongTrong = $this->phongService->timPhongTrong(
                $phong['ma_loai_phong'],
                $ngayNhanPhong,
                $ngayTraPhong,
                $phong['so_luong']
            );

            if ($phongTrong->count() < $phong['so_luong']) {
                $loaiPhong = \App\Models\LoaiPhong::find($phong['ma_loai_phong']);

throw new \Exception(
    'Loại phòng "' .
    ($loaiPhong?->ten_loai_phong ?? 'Không xác định') .
    '" không còn đủ số lượng.'
);
            }

            $danhSachPhong[$phong['ma_loai_phong']] = $phongTrong;
        }

      
        $hoTen = trim($thongTinKhach['ho_ten']);

        $tachTen = explode(' ', $hoTen);

        $ten = array_pop($tachTen);

        $hoVaTenDem = implode(' ', $tachTen);

       
        $datPhong = DatPhong::create([

            'ma_dat_phong' => '',

            'ma_nguoi_dung' => auth()->check()? auth()->id(): null,

            'ma_khach_san' => $duLieu['ma_khach_san'],

            'ho_va_ten_dem_khach' => $hoVaTenDem,

            'ten_khach' => $ten,

            'email_khach' => $thongTinKhach['email'],

            'so_dien_thoai_khach' => $thongTinKhach['so_dien_thoai'],

            'ngay_nhan_phong' => $ngayNhanPhong,

            'ngay_tra_phong' => $ngayTraPhong,

            'so_nguoi_truong_thanh' => $duLieu['soNguoiTruongThanh'],

            'so_tre_em' => $duLieu['soTreEm'],

            'so_nguoi_cao_tuoi' => $duLieu['soNguoiCaoTuoi'],

            'tong_tien' => $duLieu['tongTien'],

            'trang_thai_dat_phong' => $trangThaiDatPhong,

            'ghi_chu' => $thongTinKhach['ghi_chu'] ?? null,

            'ngay_dat' => now(),

        ]);

        $datPhong->update([

            'ma_dat_phong' => 'DP' . str_pad(
                $datPhong->ma_don_dat_phong,
                6,
                '0',
                STR_PAD_LEFT
            )

        ]);

        foreach ($duLieu['phongsDaChon'] as $phong) {

            ChiTietDatPhong::create([

                'ma_don_dat_phong' => $datPhong->ma_don_dat_phong,

                'ma_loai_phong' => $phong['ma_loai_phong'],

                'so_luong_phong' => $phong['so_luong'],

                'gia_dat_thuc_te' => $phong['gia'],

                'so_dem' => $phong['so_dem'],

                'thanh_tien' => $phong['thanh_tien'],

            ]);

            foreach ($danhSachPhong[$phong['ma_loai_phong']] as $phongDuocChon) {

                $ngay = Carbon::parse($ngayNhanPhong);

                while ($ngay->lt(Carbon::parse($ngayTraPhong))) {

                    LichPhong::create([

                        'ma_phong' => $phongDuocChon->ma_phong,

                        'ngay' => $ngay->format('Y-m-d'),

                        'trang_thai' => 'DaDat',

                    ]);

                    $ngay->addDay();
                }
            }
        }
ThanhToan::create([

    'ma_don_dat_phong' => $datPhong->ma_don_dat_phong,

    'loai_thanh_toan' => $loaiThanhToan,

    'so_tien' => $soTienThanhToan,

    'phuong_thuc_thanh_toan' => $phuongThucThanhToan,

    'trang_thai_thanh_toan' => $trangThaiThanhToan,

    'ma_giao_dich' => $maGiaoDich,

    'ngay_thanh_toan' => $ngayThanhToan,

]);

       DB::commit();

    $datPhong->load([
    'khachSan',
    'chiTietDatPhong.loaiPhong',
    'thanhToans'
]);


     Mail::to($datPhong->email_khach)
    ->send(new DatPhongThanhCongMail($datPhong));

return $datPhong;
    } catch (\Exception $e) {

        DB::rollBack();

        throw $e;
    }
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

protected $vnpayService;
protected $phongService;

public function __construct(
    VNPayService $vnpayService,
    PhongService $phongService
)
{
    $this->vnpayService = $vnpayService;
    $this->phongService = $phongService;
}
public function vnpayReturn(Request $request)
{
    // Kiểm tra chữ ký
    if (!$this->vnpayService->verifyResponse($request->all())) {
        dd('Sai chữ ký', $request->all());
    }

    // Kiểm tra kết quả thanh toán
    if ($request->vnp_ResponseCode != '00') {
        dd('Thanh toán thất bại', $request->all());
    }

    // Lấy dữ liệu đã lưu trước khi chuyển sang VNPay
    $duLieuVNPay = session('du_lieu_vnpay');

    if (!$duLieuVNPay) {
        dd('Mất session du_lieu_vnpay');
    }

    try {

        $loaiThanhToan = $duLieuVNPay['loaiThanhToan'];

        if ($loaiThanhToan == 'DatCoc') {

            $soTienThanhToan = round(
                $duLieuVNPay['duLieu']['tongTien'] * 0.3
            );

        } else {

            $soTienThanhToan =
                $duLieuVNPay['duLieu']['tongTien'];

        }

        $datPhong = $this->luuDonDatPhong(

            $duLieuVNPay['duLieu'],

            $duLieuVNPay['thongTinKhach'],

            'VNPay',

            $loaiThanhToan,

            $soTienThanhToan,

            'ThanhCong',

            'DaXacNhan',

            $request->vnp_TransactionNo,

            now()

        );

        session([
            'ma_don_dat_phong' => $datPhong->ma_don_dat_phong
        ]);

        session()->forget('du_lieu_vnpay');
        session()->forget('xac_nhan_dat_phong');

        return redirect()->route('datphong.thanhcong');

    } catch (\Throwable $e) {

        dd(
            'Lỗi khi lưu đơn đặt phòng',
            $e->getMessage(),
            $e->getFile(),
            $e->getLine()
        );

    }
}
}