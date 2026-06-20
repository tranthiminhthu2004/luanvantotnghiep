<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('thanh_toan', function (Blueprint $table)
        {
            $table->string(
                'ma_giao_dich',
                100
            )
            ->nullable()
            ->after('trang_thai_thanh_toan');
        });
    }

    public function down(): void
    {
        Schema::table('thanh_toan', function (Blueprint $table)
        {
            $table->dropColumn(
                'ma_giao_dich'
            );
        });
    }
};