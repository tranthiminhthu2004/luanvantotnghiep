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
    Schema::create('tien_nghi', function (Blueprint $table) {

        $table->id('ma_tien_nghi');

        $table->string(
            'ten_tien_nghi',
            100
        );

        $table->string(
            'icon',
            100
        )->nullable();

        $table->string(
            'mo_ta',
            255
        )->nullable();

        $table->boolean(
            'trang_thai'
        )->default(1);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tien_nghi');
    }
};