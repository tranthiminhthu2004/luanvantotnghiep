<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('dia_diem', 'mo_ta')) {

            Schema::table('dia_diem', function (Blueprint $table) {

                $table->text('mo_ta')
                    ->nullable()
                    ->after('ten_dia_diem');

            });

        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('dia_diem', 'mo_ta')) {

            Schema::table('dia_diem', function (Blueprint $table) {

                $table->dropColumn('mo_ta');

            });

        }
    }
};