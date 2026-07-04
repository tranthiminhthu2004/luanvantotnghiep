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

            // FK đến bảng dia_diem_du_lich
            $table->foreignId('ma_dia_diem_du_lich')
                ->constrained('dia_diem_du_lich', 'ma_dia_diem_du_lich')
                ->cascadeOnDelete();

            $table->string('duong_dan_anh');

            $table->timestamps();
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