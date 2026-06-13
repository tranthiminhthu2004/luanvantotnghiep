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
    Schema::create('chi_tiet_dat_phong', function (Blueprint $table) {

        $table->unsignedBigInteger('ma_don_dat_phong');

        $table->unsignedBigInteger('ma_phong');

        $table->decimal('gia_dat_thuc_te', 12, 2);

        $table->primary([
            'ma_don_dat_phong',
            'ma_phong'
        ]);

        $table->foreign('ma_don_dat_phong')
            ->references('ma_don_dat_phong')
            ->on('dat_phong')
            ->cascadeOnDelete();

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
        Schema::dropIfExists('chi_tiet_dat_phong');
    }
};