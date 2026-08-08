<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lich_phong', function (Blueprint $table) {
            $table->enum('trang_thai', [
                'Trong',
                'TamGiu',
                'DaDat'
            ])->change();
        });
    }

    public function down(): void
    {
        Schema::table('lich_phong', function (Blueprint $table) {
            $table->enum('trang_thai', [
                'Trong',
                'DaDat'
            ])->change();
        });
    }
};