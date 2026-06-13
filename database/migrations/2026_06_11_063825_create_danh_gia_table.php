<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('danh_gia', function (Blueprint $table) {

        $table->id('ma_danh_gia');

        $table->unsignedBigInteger('ma_don_dat_phong');

        $table->unsignedBigInteger('ma_khach_san');

        $table->unsignedBigInteger('ma_nguoi_dung');

        $table->tinyInteger('so_sao');

        $table->text('noi_dung_danh_gia')->nullable();

        $table->timestamp('ngay_danh_gia')->useCurrent();

        $table->foreign('ma_don_dat_phong')
            ->references('ma_don_dat_phong')
            ->on('dat_phong');

        $table->foreign('ma_khach_san')
            ->references('ma_khach_san')
            ->on('khach_san');

        $table->foreign('ma_nguoi_dung')
            ->references('ma_nguoi_dung')
            ->on('nguoi_dung');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_gia');
    }
};