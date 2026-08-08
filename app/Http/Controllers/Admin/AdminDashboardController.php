<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KhachSan;
use App\Models\NguoiDung;
use App\Models\DatPhong;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | KIỂM TRA QUYỀN ADMIN
        |--------------------------------------------------------------------------
        */

        if (
            !auth()->check() ||
            auth()->user()->ma_vai_tro != 1
        ) {
            abort(403);
        }


        /*
        |--------------------------------------------------------------------------
        | 1. THỐNG KÊ TỔNG QUAN
        |--------------------------------------------------------------------------
        */

        $tongKhachSan = KhachSan::count();

        $tongNguoiDung = NguoiDung::count();

        $tongDatPhong = DatPhong::count();

        $tongDoiTac = KhachSan::whereNotNull(
            'ma_nguoi_dung'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | 2. ĐẶT PHÒNG THEO THÁNG
        |--------------------------------------------------------------------------
        */

        $nam = now()->year;

        $duLieuDatPhongTheoThang = DatPhong::select(
                DB::raw('MONTH(ngay_dat) as thang'),
                DB::raw('COUNT(*) as tong')
            )
            ->whereYear(
                'ngay_dat',
                $nam
            )
            ->groupBy(
                DB::raw('MONTH(ngay_dat)')
            )
            ->orderBy(
                DB::raw('MONTH(ngay_dat)')
            )
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Tạo đủ 12 tháng
        |--------------------------------------------------------------------------
        */

        $datPhongTheoThang = [];

        for (
            $thang = 1;
            $thang <= 12;
            $thang++
        ) {

            $duLieu =
                $duLieuDatPhongTheoThang
                    ->firstWhere(
                        'thang',
                        $thang
                    );

            $datPhongTheoThang[] =
                $duLieu
                    ? (int) $duLieu->tong
                    : 0;
        }


        /*
        |--------------------------------------------------------------------------
        | 3. ĐẶT PHÒNG THEO TRẠNG THÁI
        |--------------------------------------------------------------------------
        */

        /*
         * Lấy số lượng theo từng trạng thái
         */
        $datPhongTheoTrangThai = [

            // Chờ thanh toán
            DatPhong::where(
                'trang_thai_dat_phong',
                'ChoThanhToan'
            )->count(),

            // Đã xác nhận
            DatPhong::where(
                'trang_thai_dat_phong',
                'DaXacNhan'
            )->count(),

            // Đã nhận phòng
            DatPhong::where(
                'trang_thai_dat_phong',
                'DaNhanPhong'
            )->count(),

            // Đã trả phòng
            DatPhong::where(
                'trang_thai_dat_phong',
                'DaTraPhong'
            )->count(),

            // Đã hủy
            DatPhong::where(
                'trang_thai_dat_phong',
                'DaHuy'
            )->count(),

            // Không đến
            DatPhong::where(
                'trang_thai_dat_phong',
                'KhongDen'
            )->count(),

        ];


        /*
        |--------------------------------------------------------------------------
        | 4. TRẢ DỮ LIỆU SANG DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.dashboard',
            compact(
                'tongKhachSan',
                'tongNguoiDung',
                'tongDatPhong',
                'tongDoiTac',
                'datPhongTheoThang',
                'datPhongTheoTrangThai'
            )
        );
    }
}