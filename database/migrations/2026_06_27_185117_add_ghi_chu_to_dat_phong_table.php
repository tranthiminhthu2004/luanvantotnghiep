<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dat_phong', function (Blueprint $table) {

            $table->text('ghi_chu')
                ->nullable()
                ->after('trang_thai_dat_phong');

        });
    }

    public function down(): void
    {
        Schema::table('dat_phong', function (Blueprint $table) {

            $table->dropColumn('ghi_chu');

        });
    }
};