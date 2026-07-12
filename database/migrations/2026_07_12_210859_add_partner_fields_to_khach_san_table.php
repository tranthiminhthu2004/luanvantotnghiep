<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('khach_san', function (Blueprint $table) {

            $table->foreignId('ma_nguoi_dung')
                ->nullable()
                ->after('ma_khach_san')
                ->constrained('nguoi_dung', 'ma_nguoi_dung')
                ->nullOnDelete();

            $table->enum('trang_thai_duyet', [
                'ChoDuyet',
                'DaDuyet',
                'TuChoi'
            ])->default('DaDuyet')
              ->after('trang_thai');

            $table->text('ly_do_tu_choi')
                ->nullable()
                ->after('trang_thai_duyet');

            $table->timestamp('ngay_gui_duyet')
                ->nullable()
                ->after('ly_do_tu_choi');

            $table->timestamp('ngay_duyet')
                ->nullable()
                ->after('ngay_gui_duyet');

        });
    }

    public function down(): void
    {
        Schema::table('khach_san', function (Blueprint $table) {

            $table->dropForeign(['ma_nguoi_dung']);

            $table->dropColumn([
                'ma_nguoi_dung',
                'trang_thai_duyet',
                'ly_do_tu_choi',
                'ngay_gui_duyet',
                'ngay_duyet'
            ]);

        });
    }
};