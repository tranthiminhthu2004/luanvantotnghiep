<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chi_tiet_dat_phong', function (Blueprint $table)
        {
            if (!Schema::hasColumn('chi_tiet_dat_phong', 'so_dem'))
            {
                $table->integer('so_dem')
                      ->after('gia_dat_thuc_te');
            }

            if (!Schema::hasColumn('chi_tiet_dat_phong', 'thanh_tien'))
            {
                $table->decimal(
                    'thanh_tien',
                    12,
                    2
                )->after('so_dem');
            }
        });
    }

    public function down(): void
    {
        Schema::table('chi_tiet_dat_phong', function (Blueprint $table)
        {
            if (Schema::hasColumn('chi_tiet_dat_phong', 'so_dem'))
            {
                $table->dropColumn('so_dem');
            }

            if (Schema::hasColumn('chi_tiet_dat_phong', 'thanh_tien'))
            {
                $table->dropColumn('thanh_tien');
            }
        });
    }
};