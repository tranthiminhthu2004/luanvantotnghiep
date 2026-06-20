<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE thanh_toan
            MODIFY trang_thai_thanh_toan ENUM(
                'ChuaThanhToan',
                'DaThanhToan',
                'DaHoanTien'
            )
            DEFAULT 'ChuaThanhToan'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE thanh_toan
            MODIFY trang_thai_thanh_toan ENUM(
                'ChuaThanhToan',
                'DaThanhToan'
            )
            DEFAULT 'ChuaThanhToan'
        ");
    }
};