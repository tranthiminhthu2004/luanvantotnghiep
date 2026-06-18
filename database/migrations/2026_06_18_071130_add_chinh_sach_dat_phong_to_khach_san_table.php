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
        Schema::table('khach_san', function (Blueprint $table) {
             $table->time('gio_check_in')->nullable();

    $table->time('gio_check_out')->nullable();

    $table->integer('so_gio_huy_mien_phi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('khach_san', function (Blueprint $table) {
            //
        });
    }
};