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
        'loai_phong_tien_nghi',
        function (Blueprint $table)
        {
            $table->unsignedBigInteger(
                'ma_loai_phong'
            );

            $table->unsignedBigInteger(
                'ma_tien_nghi'
            );

            $table->primary([
                'ma_loai_phong',
                'ma_tien_nghi'
            ]);

            $table->foreign(
                'ma_loai_phong'
            )->references(
                'ma_loai_phong'
            )->on(
                'loai_phong'
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
        Schema::dropIfExists('loai_phong_tien_nghi');
    }
};