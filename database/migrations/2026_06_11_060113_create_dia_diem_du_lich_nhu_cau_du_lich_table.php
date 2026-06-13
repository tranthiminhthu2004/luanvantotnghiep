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
        Schema::create('dia_diem_du_lich_nhu_cau_du_lich', function (Blueprint $table) {

    $table->unsignedBigInteger('ma_dia_diem');

    $table->unsignedBigInteger('ma_nhu_cau');

    $table->primary([
        'ma_dia_diem',
        'ma_nhu_cau'
    ]);

    $table->foreign('ma_dia_diem')
          ->references('ma_dia_diem')
          ->on('dia_diem_du_lich')
          ->cascadeOnDelete();

    $table->foreign('ma_nhu_cau')
          ->references('ma_nhu_cau')
          ->on('nhu_cau_du_lich')
          ->cascadeOnDelete();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_diem_du_lich_nhu_cau_du_lich');
    }
};