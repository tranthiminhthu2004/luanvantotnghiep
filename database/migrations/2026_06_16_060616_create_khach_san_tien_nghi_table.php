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
    Schema::create(
        'khach_san_tien_nghi',
        function (Blueprint $table)
        {
            $table->unsignedBigInteger(
                'ma_khach_san'
            );

            $table->unsignedBigInteger(
                'ma_tien_nghi'
            );

            $table->primary([
                'ma_khach_san',
                'ma_tien_nghi'
            ]);

            $table->foreign(
                'ma_khach_san'
            )->references(
                'ma_khach_san'
            )->on(
                'khach_san'
            )->onDelete(
                'cascade'
            );

            $table->foreign(
                'ma_tien_nghi'
            )->references(
                'ma_tien_nghi'
            )->on(
                'tien_nghi'
            )->onDelete(
                'cascade'
            );
        }
    );
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_san_tien_nghi');
    }
};