<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Xóa khóa chính cũ
        DB::statement("
            ALTER TABLE chi_tiet_dat_phong
            DROP PRIMARY KEY
        ");

        Schema::table('chi_tiet_dat_phong', function (Blueprint $table)
        {
            // Xóa cột cũ
            $table->dropForeign(['ma_phong']);
            $table->dropColumn('ma_phong');

            // Thêm cột mới
            $table->unsignedBigInteger('ma_loai_phong')
                  ->after('ma_don_dat_phong');

            $table->integer('so_luong_phong')
                  ->default(1)
                  ->after('ma_loai_phong');
        });

        // Tạo khóa ngoại
        Schema::table('chi_tiet_dat_phong', function (Blueprint $table)
        {
            $table->foreign('ma_loai_phong')
                  ->references('ma_loai_phong')
                  ->on('loai_phong')
                  ->onDelete('cascade');
        });

        // Tạo khóa chính mới
        DB::statement("
            ALTER TABLE chi_tiet_dat_phong
            ADD PRIMARY KEY (
                ma_don_dat_phong,
                ma_loai_phong
            )
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE chi_tiet_dat_phong
            DROP PRIMARY KEY
        ");

        Schema::table('chi_tiet_dat_phong', function (Blueprint $table)
        {
            $table->dropForeign(['ma_loai_phong']);

            $table->dropColumn([
                'ma_loai_phong',
                'so_luong_phong'
            ]);

            $table->unsignedBigInteger('ma_phong');
        });

        Schema::table('chi_tiet_dat_phong', function (Blueprint $table)
        {
            $table->foreign('ma_phong')
                  ->references('ma_phong')
                  ->on('phong')
                  ->onDelete('cascade');
        });

        DB::statement("
            ALTER TABLE chi_tiet_dat_phong
            ADD PRIMARY KEY (
                ma_don_dat_phong,
                ma_phong
            )
        ");
    }
};