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
        Schema::create('dia_diem_du_lich', function (Blueprint $table) {

            $table->id('ma_dia_diem_du_lich');

            // FK đến bảng dia_diem (Đà Nẵng, Đà Lạt...)
            $table->foreignId('ma_dia_diem')
                ->constrained('dia_diem', 'ma_dia_diem')
                ->cascadeOnDelete();

            $table->string('ten_dia_diem', 255);

            $table->string('dia_chi')->nullable();

            $table->decimal('vi_do', 10, 7)->nullable();

            $table->decimal('kinh_do', 10, 7)->nullable();

            $table->text('mo_ta')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_diem_du_lich');
    }
};