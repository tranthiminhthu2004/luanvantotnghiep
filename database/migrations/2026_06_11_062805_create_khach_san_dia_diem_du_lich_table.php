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

            $table->foreignId('ma_khach_san')
                ->constrained('khach_san', 'ma_khach_san')
                ->cascadeOnDelete();

            $table->foreignId('ma_dia_diem_du_lich')
                ->constrained('dia_diem_du_lich', 'ma_dia_diem_du_lich')
                ->cascadeOnDelete();

            $table->decimal('khoang_cach_km', 5, 2);

            $table->primary([
                'ma_khach_san',
                'ma_dia_diem_du_lich'
            ]);
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