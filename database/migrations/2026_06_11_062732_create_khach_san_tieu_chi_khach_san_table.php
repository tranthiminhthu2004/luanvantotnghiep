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
    Schema::create('khach_san_tieu_chi_khach_san', function (Blueprint $table) {

        $table->unsignedBigInteger('ma_khach_san');

        $table->unsignedBigInteger('ma_tieu_chi');

        $table->primary([
            'ma_khach_san',
            'ma_tieu_chi'
        ]);

        $table->foreign('ma_khach_san')
              ->references('ma_khach_san')
              ->on('khach_san')
              ->cascadeOnDelete();

        $table->foreign('ma_tieu_chi')
              ->references('ma_tieu_chi')
              ->on('tieu_chi_khach_san')
              ->cascadeOnDelete();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_san_tieu_chi_khach_san');
    }
};