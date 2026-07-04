<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Xóa bảng trung gian trước
        Schema::dropIfExists('khach_san_tieu_chi_khach_san');

        // Sau đó xóa bảng tiêu chí
        Schema::dropIfExists('tieu_chi_khach_san');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};