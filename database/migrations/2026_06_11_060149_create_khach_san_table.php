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
        Schema::create('khach_san', function (Blueprint $table) {

    $table->id('ma_khach_san');

    $table->string('ten_khach_san');

    $table->string('dia_chi');

    $table->string('thanh_pho',100);

    $table->decimal('vi_do',10,7)->nullable();

    $table->decimal('kinh_do',10,7)->nullable();

    $table->tinyInteger('so_sao_khach_san');

    $table->text('mo_ta')->nullable();

    $table->string('so_dien_thoai',20)->nullable();

    $table->string('email',191)->nullable();

    $table->timestamp('ngay_tao')->useCurrent();

    $table->boolean('trang_thai')->default(true);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_san');
    }
};