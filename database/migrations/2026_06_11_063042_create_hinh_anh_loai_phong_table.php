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
    Schema::create('hinh_anh_loai_phong', function (Blueprint $table) {

        $table->id('ma_hinh_anh_phong');

        $table->unsignedBigInteger('ma_loai_phong');

        $table->string('duong_dan_anh');

        $table->foreign('ma_loai_phong')
            ->references('ma_loai_phong')
            ->on('loai_phong')
            ->cascadeOnDelete();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hinh_anh_loai_phong');
    }
};