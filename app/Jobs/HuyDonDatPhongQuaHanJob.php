<?php

namespace App\Jobs;

use App\Models\DatPhong;
use App\Models\LichPhong;
use App\Models\ThanhToan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;

class HuyDonDatPhongQuaHanJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $danhSachDon = DatPhong::where(
                'trang_thai_dat_phong',
                'ChoThanhToan'
            )
            ->whereNotNull('han_thanh_toan')
            ->where('han_thanh_toan', '<', now())
            ->get();

        foreach ($danhSachDon as $datPhong) {

            DB::transaction(function () use ($datPhong) {

                $datPhong->update([
                    'trang_thai_dat_phong' => 'DaHuy',
                    'han_thanh_toan' => null,
                ]);

                ThanhToan::where(
                        'ma_don_dat_phong',
                        $datPhong->ma_don_dat_phong
                    )
                    ->where(
                        'trang_thai_thanh_toan',
                        'ChoXuLy'
                    )
                    ->update([
                        'trang_thai_thanh_toan' => 'ThatBai',
                    ]);

                LichPhong::where(
                    'ma_don_dat_phong',
                    $datPhong->ma_don_dat_phong
                )->delete();

            });
        }
    }
}