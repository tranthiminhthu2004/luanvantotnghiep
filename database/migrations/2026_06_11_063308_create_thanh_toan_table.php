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
    Schema::create('thanh_toan', function (Blueprint $table) {

        $table->id('ma_thanh_toan');

        $table->unsignedBigInteger('ma_don_dat_phong');

        $table->decimal('so_tien', 12, 2);

        $table->enum('phuong_thuc_thanh_toan', [
            'TienMat',
            'VNPay',
            'Momo'
        ]);

        $table->enum('trang_thai_thanh_toan', [
            'ChuaThanhToan',
            'DaThanhToan'
        ]);

        $table->timestamp('ngay_thanh_toan')->nullable();

        $table->foreign('ma_don_dat_phong')
            ->references('ma_don_dat_phong')
            ->on('dat_phong')
            ->cascadeOnDelete();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanh_toan');
    }
};