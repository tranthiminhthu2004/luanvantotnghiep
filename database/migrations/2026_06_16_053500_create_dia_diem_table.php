<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('dia_diem')) {

            Schema::create('dia_diem', function (Blueprint $table) {

                $table->id('ma_dia_diem');

                $table->string(
                    'ten_dia_diem',
                    150
                );

            });

        }
    }

    public function down(): void
    {
        if (Schema::hasTable('dia_diem')) {

            Schema::dropIfExists('dia_diem');

        }
    }
};