<?php

namespace App\Services;

use App\Models\DatPhong;
use App\Models\ChiTietDatPhong;
use App\Models\LoaiPhong;
use App\Models\LichPhong;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DatPhongService
{
    protected $phongService;

    public function __construct( PhongService $phongService)
    {
        $this->phongService = $phongService;
    }

   public function taoDonDatPhong(array $duLieu)
{
    DB::beginTransaction();

    try {

        if (
            empty($duLieu['chi_tiet_phong'])
        )
        {
            throw new \Exception(
                'Không có phòng được chọn.'
            );
        }
foreach ($duLieu['chi_tiet_phong'] as $chiTiet)
{

    if (
        ($chiTiet['so_luong_phong'] ?? 0) <= 0
    )
    {

        throw new \Exception(
            'Số lượng phòng không hợp lệ.'
        );

    }

    $loaiPhong = LoaiPhong::find(
        $chiTiet['ma_loai_phong']
    );

    if (!$loaiPhong)
    {

        throw new \Exception(
            'Loại phòng không tồn tại.'
        );

    }

}
        $tongTien = collect(
            $duLieu['chi_tiet_phong']
        )->sum('thanh_tien');

            $danhSachPhong = [];

            foreach ($duLieu['chi_tiet_phong'] as $chiTiet)
            {

                $phongTrong = $this->phongService
                    ->timPhongTrong(

                        $chiTiet['ma_loai_phong'],

                        $duLieu['ngay_nhan_phong'],

                        $duLieu['ngay_tra_phong'],

                        $chiTiet['so_luong_phong']

                    );

                if (
                    $phongTrong->count()
                    <
                    $chiTiet['so_luong_phong']
                )
                {

                    $loaiPhong = LoaiPhong::find(
                        $chiTiet['ma_loai_phong']
                    );

                    throw new \Exception(

                        'Loại phòng "' .

                        ($loaiPhong?->ten_loai_phong ?? '')

                        . '" không còn đủ số lượng.'

                    );
                }

                $danhSachPhong[
                    $chiTiet['ma_loai_phong']
                ] = $phongTrong;

            }

          
            $datPhong = DatPhong::create([

                'ma_dat_phong' => '',

                'ma_nguoi_dung' =>
                    $duLieu['ma_nguoi_dung'] ?? null,

                'ma_khach_san' =>
                    $duLieu['ma_khach_san'],

                'ho_va_ten_dem_khach' =>
                    $duLieu['ho_va_ten_dem_khach'] ?? null,

                'ten_khach' =>
                    $duLieu['ten_khach'],

                'email_khach' =>
                    $duLieu['email_khach'],

                'so_dien_thoai_khach' =>
                    $duLieu['so_dien_thoai_khach'],

                'ngay_nhan_phong' =>
                    $duLieu['ngay_nhan_phong'],

                'ngay_tra_phong' =>
                    $duLieu['ngay_tra_phong'],

                'so_nguoi_truong_thanh' =>
                    $duLieu['so_nguoi_truong_thanh'],

                'so_tre_em' =>
                    $duLieu['so_tre_em'] ?? 0,

                'so_nguoi_cao_tuoi' =>
                    $duLieu['so_nguoi_cao_tuoi'] ?? 0 ,

                'tong_tien' =>
                    $tongTien,

                'trang_thai_dat_phong' =>
                    'ChoThanhToan',

                'ghi_chu' =>
                    $duLieu['ghi_chu']??null,
                    
                'han_thanh_toan' =>
                    now()->addHours(24),

                'ngay_dat' =>
                    now()

            ]);

            $datPhong->update([

                'ma_dat_phong' =>

                    'DP' .

                    str_pad(

                        $datPhong->ma_don_dat_phong,

                        6,

                        '0',

                        STR_PAD_LEFT

                    )

            ]);


            foreach (
                $duLieu['chi_tiet_phong']
                as
                $chiTiet
            )
            {

                ChiTietDatPhong::create([

                    'ma_don_dat_phong' =>

                        $datPhong->ma_don_dat_phong,

                    'ma_loai_phong' =>

                        $chiTiet['ma_loai_phong'],

                    'so_luong_phong' =>

                        $chiTiet['so_luong_phong'],

                    'gia_dat_thuc_te' =>

                        $chiTiet['gia_dat_thuc_te'],

                    'so_dem' =>

                        $chiTiet['so_dem'],

                    'thanh_tien' =>

                        $chiTiet['thanh_tien']

                ]);

            }

            foreach (
                $duLieu['chi_tiet_phong']
                as
                $chiTiet
            )
            {

                foreach (
                    $danhSachPhong[
                        $chiTiet['ma_loai_phong']
                    ]
                    as
                    $phong
                )
                {

                    $ngay = Carbon::parse(
                        $duLieu['ngay_nhan_phong']
                    );

                    while (
                        $ngay->lt(
                            Carbon::parse(
                                $duLieu['ngay_tra_phong']
                            )
                        )
                    )
                    {

                        LichPhong::create([

    'ma_don_dat_phong'
        => $datPhong->ma_don_dat_phong,

    'ma_phong'
        => $phong->ma_phong,

    'ngay'
        => $ngay->format('Y-m-d'),

    'trang_thai'
        => 'DaDat'

]);

    $ngay->addDay();

                    }

                }

            }

            DB::commit();

            return $datPhong;

        }
        catch (\Exception $e)
        {

            DB::rollBack();

            throw $e;

        }           
        
    }
public function xacNhanThanhToan($maDonDatPhong)
{
    DB::beginTransaction();

    try {

        $datPhong = DatPhong::findOrFail($maDonDatPhong);

        if ($datPhong->trang_thai_dat_phong != 'ChoThanhToan') {

            throw new \Exception(
                'Đơn đặt phòng không ở trạng thái chờ thanh toán.'
            );

        }

        if (
            $datPhong->han_thanh_toan &&
            now()->gt($datPhong->han_thanh_toan)
        ) {

            throw new \Exception(
                'Đơn đặt phòng đã hết hạn thanh toán.'
            );

        }

        $datPhong->trang_thai_dat_phong = 'DaXacNhan';
        $datPhong->han_thanh_toan = null;
        $datPhong->save();

        DB::commit();

        return $datPhong;

    } catch (\Exception $e) {

        DB::rollBack();

        throw $e;

    }
}
   public function huyDatPhong($maDonDatPhong)
{
    DB::beginTransaction();

    try {

        $datPhong = DatPhong::findOrFail($maDonDatPhong);

        if (!in_array($datPhong->trang_thai_dat_phong, [
            'ChoThanhToan',
            'DaXacNhan'
        ])) {

            throw new \Exception(
                'Đơn đặt phòng không thể hủy.'
            );

        }

        $datPhong->update([

            'trang_thai_dat_phong' => 'DaHuy',

            'han_thanh_toan' => null

        ]);

        LichPhong::where(
            'ma_don_dat_phong',
            $maDonDatPhong
        )->delete();

        DB::commit();

        return $datPhong;

    }
    catch (\Exception $e)
    {

        DB::rollBack();

        throw $e;

    }
}
}