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
    Schema::create('nguoi_dung_nhu_cau', function (Blueprint $table) {

        $table->unsignedBigInteger('ma_nguoi_dung');

        $table->unsignedBigInteger('ma_nhu_cau');

        $table->integer('muc_do_uu_tien')->default(1);

        $table->primary([
            'ma_nguoi_dung',
            'ma_nhu_cau'
        ]);

        $table->foreign('ma_nguoi_dung')
            ->references('ma_nguoi_dung')
            ->on('nguoi_dung')
            ->cascadeOnDelete();

        $table->foreign('ma_nhu_cau')
            ->references('ma_nhu_cau')
            ->on('nhu_cau_du_lich')
            ->cascadeOnDelete();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoi_dung_nhu_cau');
    }
};