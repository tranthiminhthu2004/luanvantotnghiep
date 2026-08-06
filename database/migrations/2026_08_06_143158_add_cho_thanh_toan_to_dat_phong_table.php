<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE dat_phong
            MODIFY trang_thai_dat_phong
            ENUM(
                'ChoThanhToan',
                'DaXacNhan',
                'DaNhanPhong',
                'DaTraPhong',
                'DaHuy',
                'KhongDen'
            )
            NOT NULL
            DEFAULT 'ChoThanhToan'
        ");

        DB::statement("
            ALTER TABLE dat_phong
            ADD han_thanh_toan TIMESTAMP NULL
            AFTER trang_thai_dat_phong
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE dat_phong
            MODIFY trang_thai_dat_phong
            ENUM(
                'DaXacNhan',
                'DaNhanPhong',
                'DaTraPhong',
                'DaHuy',
                'KhongDen'
            )
            NOT NULL
            DEFAULT 'DaXacNhan'
        ");

        DB::statement("
            ALTER TABLE dat_phong
            DROP COLUMN han_thanh_toan
        ");
    }
};