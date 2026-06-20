<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chi_tiet_dat_phong', function (Blueprint $table)
        {
            $table->unsignedBigInteger(
                'ma_don_dat_phong'
            );

            $table->unsignedBigInteger(
                'ma_loai_phong'
            );

            $table->integer(
                'so_luong_phong'
            )->default(1);

            $table->decimal(
                'gia_dat_thuc_te',
                12,
                2
            );

            $table->integer(
                'so_dem'
            );

            $table->decimal(
                'thanh_tien',
                12,
                2
            );

            $table->primary([
                'ma_don_dat_phong',
                'ma_loai_phong'
            ]);

            $table->foreign(
                'ma_don_dat_phong'
            )
            ->references(
                'ma_don_dat_phong'
            )
            ->on('dat_phong')
            ->cascadeOnDelete();

            $table->foreign(
                'ma_loai_phong'
            )
            ->references(
                'ma_loai_phong'
            )
            ->on('loai_phong')
            ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'chi_tiet_dat_phong'
        );
    }
};