<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KhachSan;
use App\Models\LoaiPhong;

class LoaiPhongSeeder extends Seeder
{
    public function run(): void
    {
        $khachSans = KhachSan::all();

        foreach ($khachSans as $khachSan) {

            // Nếu khách sạn đã có loại phòng thì bỏ qua
            if ($khachSan->loaiPhongs()->exists()) {
                continue;
            }

            // Giá phòng theo số sao khách sạn
            switch ($khachSan->so_sao_khach_san) {

                case 1:
                    $giaStandard = 400000;
                    $giaFamily = 700000;
                    break;

                case 2:
                    $giaStandard = 600000;
                    $giaFamily = 900000;
                    break;

                case 3:
                    $giaStandard = 900000;
                    $giaFamily = 1400000;
                    break;

                case 4:
                    $giaStandard = 1300000;
                    $giaFamily = 1900000;
                    break;

                case 5:
                    $giaStandard = 1800000;
                    $giaFamily = 2800000;
                    break;

                default:
                    $giaStandard = 800000;
                    $giaFamily = 1500000;
                    break;
            }

            $danhSachLoaiPhong = [

                [
                    'ten_loai_phong' => 'Standard',
                    'so_nguoi_toi_da' => 2,
                    'dien_tich' => 22,
                    'so_giuong' => 1,
                    'gia_co_ban' => $giaStandard,
                    'mo_ta' => 'Phòng Standard phù hợp cho 2 khách, đầy đủ tiện nghi cơ bản.',
                    'trang_thai' => 1,
                ],

                [
                    'ten_loai_phong' => 'Family',
                    'so_nguoi_toi_da' => 4,
                    'dien_tich' => 40,
                    'so_giuong' => 2,
                    'gia_co_ban' => $giaFamily,
                    'mo_ta' => 'Phòng Family rộng rãi, phù hợp cho gia đình hoặc nhóm bạn.',
                    'trang_thai' => 1,
                ],

            ];

            foreach ($danhSachLoaiPhong as $loaiPhong) {

                LoaiPhong::create([
                    'ma_khach_san' => $khachSan->ma_khach_san,
                    'ten_loai_phong' => $loaiPhong['ten_loai_phong'],
                    'so_nguoi_toi_da' => $loaiPhong['so_nguoi_toi_da'],
                    'dien_tich' => $loaiPhong['dien_tich'],
                    'so_giuong' => $loaiPhong['so_giuong'],
                    'gia_co_ban' => $loaiPhong['gia_co_ban'],
                    'mo_ta' => $loaiPhong['mo_ta'],
                    'trang_thai' => $loaiPhong['trang_thai'],
                ]);

            }
        }

        $this->command->info('Đã thêm 2 loại phòng (Standard, Family) cho các khách sạn chưa có loại phòng.');
    }
}