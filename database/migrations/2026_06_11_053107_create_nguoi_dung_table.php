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
Schema::create('nguoi_dung', function (Blueprint $table) {

    $table->id('ma_nguoi_dung');

    $table->unsignedBigInteger('ma_vai_tro');

    $table->string('ho_va_ten_dem', 100)->nullable();

    $table->string('ten', 50);

    $table->string('email')->unique();

    $table->string('mat_khau');

    $table->string('so_dien_thoai', 20)->nullable();

    $table->enum('gioi_tinh', [
        'Nam',
        'Nu',
        'Khac'
    ])->nullable();

    $table->date('ngay_sinh')->nullable();

    $table->string('anh_dai_dien')->nullable();

    $table->string('ma_google')->nullable();

    $table->boolean('trang_thai')->default(true);

    $table->timestamp('ngay_tao')->useCurrent();

    $table->foreign('ma_vai_tro')
        ->references('ma_vai_tro')
        ->on('vai_tro')
        ->cascadeOnDelete();
});    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoi_dung');
    }
};