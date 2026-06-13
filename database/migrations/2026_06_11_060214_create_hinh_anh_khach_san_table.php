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
        Schema::create('hinh_anh_khach_san', function (Blueprint $table) {

    $table->id('ma_hinh_anh_khach_san');

    $table->unsignedBigInteger('ma_khach_san');

    $table->string('duong_dan_anh');

    $table->foreign('ma_khach_san')
          ->references('ma_khach_san')
          ->on('khach_san')
          ->cascadeOnDelete();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hinh_anh_khach_san');
    }
};