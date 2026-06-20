<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE dat_phong
            MODIFY trang_thai_dat_phong ENUM(
                'ChoXacNhan',
                'DaXacNhan',
                'DaNhanPhong',
                'DaTraPhong',
                'DaHuy',
                'KhongDenNhanPhong'
            )
            DEFAULT 'ChoXacNhan'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE dat_phong
            MODIFY trang_thai_dat_phong ENUM(
                'ChoXacNhan',
                'DaXacNhan',
                'DaNhanPhong',
                'DaTraPhong',
                'DaHuy'
            )
            DEFAULT 'ChoXacNhan'
        ");
    }
};