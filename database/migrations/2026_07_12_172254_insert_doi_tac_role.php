<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
    {
        DB::table('vai_tro')->insert([
            'ma_vai_tro' => 3,
            'ten_vai_tro' => 'DoiTac',
        ]);
    }

    public function down(): void
    {
        DB::table('vai_tro')
            ->where('ma_vai_tro', 3)
            ->delete();
    }
};