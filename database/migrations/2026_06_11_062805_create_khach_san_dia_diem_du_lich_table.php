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
    Schema::create('khach_san_dia_diem_du_lich', function (Blueprint $table) {

        $table->unsignedBigInteger('ma_khach_san');

        $table->unsignedBigInteger('ma_dia_diem');

        $table->decimal('khoang_cach_km',5,2);

        $table->primary([
            'ma_khach_san',
            'ma_dia_diem'
        ]);

        $table->foreign('ma_khach_san')
              ->references('ma_khach_san')
              ->on('khach_san')
              ->cascadeOnDelete();

        $table->foreign('ma_dia_diem')
              ->references('ma_dia_diem')
              ->on('dia_diem_du_lich')
              ->cascadeOnDelete();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_san_dia_diem_du_lich');
    }
};