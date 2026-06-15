<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('loai_phong', function (Blueprint $table) {

            $table->decimal('dien_tich', 5, 2)
                  ->nullable()
                  ->after('so_nguoi_toi_da');

            $table->integer('so_giuong')
                  ->default(1)
                  ->after('dien_tich');

        });
    }

    public function down(): void
    {
        Schema::table('loai_phong', function (Blueprint $table) {

            $table->dropColumn([
                'dien_tich',
                'so_giuong'
            ]);

        });
    }
};