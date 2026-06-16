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
    Schema::table('khach_san', function (Blueprint $table) {

        $table->unsignedBigInteger(
            'ma_dia_diem'
        )->nullable();

        $table->foreign('ma_dia_diem')
              ->references('ma_dia_diem')
              ->on('dia_diem');

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('khach_san', function (Blueprint $table) {
            //
        });
    }
};