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
    Schema::create('dat_phong', function (Blueprint $table) {

        $table->id('ma_don_dat_phong');

        $table->unsignedBigInteger('ma_nguoi_dung');

        $table->unsignedBigInteger('ma_khach_san');

        $table->string('ho_va_ten_dem_khach', 100)->nullable();

        $table->string('ten_khach', 50);

        $table->string('email_khach', 191);

        $table->string('so_dien_thoai_khach', 20);

        $table->date('ngay_nhan_phong');

        $table->date('ngay_tra_phong');

       $table->integer('so_nguoi_truong_thanh');

       $table->integer('so_tre_em')->default(0);

       $table->integer('so_nguoi_cao_tuoi')->default(0);

        $table->decimal('tong_tien', 12, 2);

        $table->enum('trang_thai_dat_phong', [
            'ChoXacNhan',
            'DaXacNhan',
            'DaHuy',
            'HoanThanh'
        ]);

        $table->timestamp('ngay_dat')->useCurrent();

        $table->foreign('ma_nguoi_dung')
            ->references('ma_nguoi_dung')
            ->on('nguoi_dung');

        $table->foreign('ma_khach_san')
            ->references('ma_khach_san')
            ->on('khach_san');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dat_phong');
    }
};