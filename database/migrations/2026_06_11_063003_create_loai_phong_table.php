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
    Schema::create('loai_phong', function (Blueprint $table) {

        $table->id('ma_loai_phong');

        $table->unsignedBigInteger('ma_khach_san');

        $table->string('ten_loai_phong');

        $table->text('mo_ta')->nullable();

        $table->integer('so_nguoi_toi_da');

        $table->decimal('gia_co_ban', 12, 2);

        $table->boolean('trang_thai')->default(true);

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
        Schema::dropIfExists('loai_phong');
    }
};