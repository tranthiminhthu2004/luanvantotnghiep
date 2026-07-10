<?php

namespace App\Services;

use App\Models\DiaDiem;
use App\Models\KhachSan;
use App\Models\NguoiDungNhuCau;
use App\Models\NhuCauDuLich;

class GoiYService
{
    /**
     * Lấy vector sở thích của người dùng
     */
    public function layVectorNguoiDung(
        int $maNguoiDung
    ): array
    {
        $tatCaNhuCau = NhuCauDuLich::orderBy(
            'ma_nhu_cau'
        )->get();

        $soThich = NguoiDungNhuCau::where(
            'ma_nguoi_dung',
            $maNguoiDung
        )->get()
        ->keyBy('ma_nhu_cau');

        $vector = [];

        foreach ($tatCaNhuCau as $nhuCau) {

            $vector[] =
                $soThich[$nhuCau->ma_nhu_cau]
                    ->muc_do_uu_tien
                    ?? 0;

        }

        return $vector;
    }
}