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
        Schema::create('dia_diem_nhu_cau_du_lich', function (Blueprint $table) {

            $table->foreignId('ma_dia_diem')
                ->constrained('dia_diem', 'ma_dia_diem')
                ->cascadeOnDelete();

            $table->foreignId('ma_nhu_cau')
                ->constrained('nhu_cau_du_lich', 'ma_nhu_cau')
                ->cascadeOnDelete();

            // Điểm phù hợp của địa điểm với nhu cầu (1-5)
            $table->unsignedTinyInteger('muc_do_phu_hop');

            $table->primary([
                'ma_dia_diem',
                'ma_nhu_cau'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_diem_nhu_cau_du_lich');
    }
};