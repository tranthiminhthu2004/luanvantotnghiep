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
    Schema::create('hinh_anh_dia_diem_du_lich', function (Blueprint $table) {

        $table->id('ma_hinh_anh_dia_diem');

        $table->unsignedBigInteger('ma_dia_diem');

        $table->string('duong_dan_anh');

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
        Schema::dropIfExists('hinh_anh_dia_diem_du_lich');
    }
};