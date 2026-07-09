<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
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
            DEFAULT 'DaXacNhan'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE dat_phong
            MODIFY trang_thai_dat_phong
            ENUM(
                'ChoXacNhan',
                'DaXacNhan',
                'DaNhanPhong',
                'DaHuy',
                'KhongDen'
            )
            DEFAULT 'ChoXacNhan'
        ");
    }
};