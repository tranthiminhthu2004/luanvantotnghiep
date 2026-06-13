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
    Schema::create('tieu_chi_khach_san', function (Blueprint $table) {

        $table->id('ma_tieu_chi');

        $table->string('ten_tieu_chi',100);

        $table->text('mo_ta')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tieu_chi_khach_san');
    }
};