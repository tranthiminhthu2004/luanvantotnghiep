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
        Schema::table('lich_phong', function (Blueprint $table) {
             $table->unsignedBigInteger('ma_don_dat_phong')
                ->after('ma_lich_phong');

            $table->foreign('ma_don_dat_phong')
                ->references('ma_don_dat_phong')
                ->on('dat_phong')
                ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lich_phong', function (Blueprint $table) {
             $table->dropForeign(['ma_don_dat_phong']);

            $table->dropColumn('ma_don_dat_phong');
        });
    }
};