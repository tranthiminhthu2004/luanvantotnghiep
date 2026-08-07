<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE thanh_toan
            MODIFY phuong_thuc_thanh_toan
            ENUM('TienMat','ChuyenKhoan','VNPay')
            NULL
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE thanh_toan
            MODIFY phuong_thuc_thanh_toan
            ENUM('TienMat','VNPay','Momo')
            NOT NULL
        ");
    }
};