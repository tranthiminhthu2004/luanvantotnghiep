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
        Schema::create('nhu_cau_du_lich', function (Blueprint $table) {

    $table->id('ma_nhu_cau');

    $table->string('ten_nhu_cau',100);

    $table->text('mo_ta')->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhu_cau_du_lich');
    }
};