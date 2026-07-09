<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::table('thanh_toan', function (Blueprint $table) {

            $table->enum('loai_thanh_toan', [
                'DatCoc',
                'ThanhToanToanBo',
                'ThanhToanConLai'
            ])
            ->default('ThanhToanToanBo')
            ->after('ma_don_dat_phong');

        });

    

        DB::statement("
            ALTER TABLE thanh_toan
            MODIFY COLUMN trang_thai_thanh_toan
            ENUM(
                'ChuaThanhToan',
                'DaThanhToan',
                'ChoXuLy',
                'ThanhCong',
                'ThatBai',
                'DaHoanTien'
            )
            NOT NULL
            DEFAULT 'ChoXuLy'
        ");


        DB::table('thanh_toan')
            ->where('trang_thai_thanh_toan', 'ChuaThanhToan')
            ->update([
                'trang_thai_thanh_toan' => 'ThanhCong'
            ]);

        DB::table('thanh_toan')
            ->where('trang_thai_thanh_toan', 'DaThanhToan')
            ->update([
                'trang_thai_thanh_toan' => 'ThanhCong'
            ]);


        DB::statement("
            ALTER TABLE thanh_toan
            MODIFY COLUMN trang_thai_thanh_toan
            ENUM(
                'ChoXuLy',
                'ThanhCong',
                'ThatBai',
                'DaHoanTien'
            )
            NOT NULL
            DEFAULT 'ChoXuLy'
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     

        DB::statement("
            ALTER TABLE thanh_toan
            MODIFY COLUMN trang_thai_thanh_toan
            ENUM(
                'ChuaThanhToan',
                'DaThanhToan',
                'ChoXuLy',
                'ThanhCong',
                'ThatBai',
                'DaHoanTien'
            )
            NOT NULL
            DEFAULT 'ChuaThanhToan'
        ");

     

        DB::table('thanh_toan')
            ->where('trang_thai_thanh_toan', 'ThanhCong')
            ->update([
                'trang_thai_thanh_toan' => 'DaThanhToan'
            ]);

        DB::statement("
            ALTER TABLE thanh_toan
            MODIFY COLUMN trang_thai_thanh_toan
            ENUM(
                'ChuaThanhToan',
                'DaThanhToan',
                'DaHoanTien'
            )
            NOT NULL
            DEFAULT 'ChuaThanhToan'
        ");

        Schema::table('thanh_toan', function (Blueprint $table) {

            $table->dropColumn('loai_thanh_toan');

        });
    }
};