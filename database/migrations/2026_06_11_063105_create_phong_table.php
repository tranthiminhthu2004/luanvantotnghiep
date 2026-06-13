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
    Schema::create('phong', function (Blueprint $table) {

        $table->id('ma_phong');

        $table->unsignedBigInteger('ma_loai_phong');

        $table->string('so_phong', 20);

        $table->integer('tang')->nullable();

        $table->enum('trang_thai_phong', [
            'Trong',
            'DaDat',
            'BaoTri'
        ]);

        $table->foreign('ma_loai_phong')
            ->references('ma_loai_phong')
            ->on('loai_phong')
            ->cascadeOnDelete();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phong');
    }
};