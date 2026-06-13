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
    Schema::create('lich_phong', function (Blueprint $table) {

        $table->id('ma_lich_phong');

        $table->unsignedBigInteger('ma_phong');

        $table->date('ngay');

        $table->enum('trang_thai', [
            'Trong',
            'DaDat'
        ]);

        $table->foreign('ma_phong')
            ->references('ma_phong')
            ->on('phong')
            ->cascadeOnDelete();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_phong');
    }
};