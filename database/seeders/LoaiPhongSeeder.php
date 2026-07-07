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

            $danhSachLoaiPhong = [

                [
                    'ten_loai_phong' => 'Standard',
                    'so_nguoi_toi_da' => 2,
                    'dien_tich' => 22,
                    'so_giuong' => 1,
                    'gia_co_ban' => 800000,
                    'mo_ta' => 'Phòng Standard phù hợp cho 2 khách, đầy đủ tiện nghi cơ bản.',
                    'trang_thai' => 1,
                ],

                [
                    'ten_loai_phong' => 'Superior',
                    'so_nguoi_toi_da' => 2,
                    'dien_tich' => 28,
                    'so_giuong' => 1,
                    'gia_co_ban' => 1000000,
                    'mo_ta' => 'Phòng Superior rộng rãi, nội thất hiện đại, cửa sổ lớn.',
                    'trang_thai' => 1,
                ],

                [
                    'ten_loai_phong' => 'Deluxe',
                    'so_nguoi_toi_da' => 3,
                    'dien_tich' => 35,
                    'so_giuong' => 2,
                    'gia_co_ban' => 1200000,
                    'mo_ta' => 'Phòng Deluxe sang trọng, thích hợp cho gia đình nhỏ.',
                    'trang_thai' => 1,
                ],

                [
                    'ten_loai_phong' => 'Premium',
                    'so_nguoi_toi_da' => 4,
                    'dien_tich' => 45,
                    'so_giuong' => 2,
                    'gia_co_ban' => 1800000,
                    'mo_ta' => 'Phòng Premium cao cấp, không gian rộng rãi và đầy đủ tiện nghi.',
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

        $this->command->info('Đã thêm loại phòng cho các khách sạn chưa có loại phòng.');
    }
}