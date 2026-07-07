<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Phong;
use App\Models\LoaiPhong;
use Illuminate\Support\Facades\DB;

class PhongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tắt kiểm tra khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Xóa toàn bộ phòng
        Phong::query()->delete();

        // Reset Auto Increment
        DB::statement('ALTER TABLE phong AUTO_INCREMENT = 1;');

        // Bật lại khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $loaiPhongs = LoaiPhong::all();

        foreach ($loaiPhongs as $loaiPhong) {

            switch ($loaiPhong->ten_loai_phong) {

                case 'Standard':
                    $tang = 1;
                    $batDau = 101;
                    break;

                case 'Superior':
                    $tang = 2;
                    $batDau = 201;
                    break;

                case 'Deluxe':
                    $tang = 3;
                    $batDau = 301;
                    break;

                case 'Premium':
                    $tang = 4;
                    $batDau = 401;
                    break;

                default:
                    continue 2;
            }

            // Tạo 5 phòng
            for ($i = 0; $i < 5; $i++) {

                Phong::create([

                    'ma_loai_phong' => $loaiPhong->ma_loai_phong,

                    'so_phong' => $batDau + $i,

                    'tang' => $tang,

                    'trang_thai_phong' => 'DangHoatDong',

                ]);
            }
        }

        $this->command->info('Đã tạo 400 phòng thành công!');
    }
}