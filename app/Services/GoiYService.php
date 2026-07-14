<?php

namespace App\Services;

use App\Models\DiaDiem;
use App\Models\KhachSan;
use App\Models\NguoiDungNhuCau;
use App\Models\NhuCauDuLich;

class GoiYService
{
  
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
        )
        ->get()
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

  
    public function layVectorDiaDiem(
        DiaDiem $diaDiem
    ): array
    {
        $tatCaNhuCau = NhuCauDuLich::orderBy(
            'ma_nhu_cau'
        )->get();

        $diaDiem->loadMissing(
            'nhuCaus'
        );

        $vector = [];

        foreach ($tatCaNhuCau as $nhuCau) {

            $nhuCauDiaDiem =
                $diaDiem->nhuCaus
                    ->firstWhere(
                        'ma_nhu_cau',
                        $nhuCau->ma_nhu_cau
                    );

            $vector[] =
                $nhuCauDiaDiem
                    ? (float)
                        $nhuCauDiaDiem
                            ->pivot
                            ->muc_do_phu_hop
                    : 0;

        }

        return $vector;
    }

    private function tinhCosineSimilarity(
        array $vectorNguoiDung,
        array $vectorDiaDiem
    ): float
    {
        $tichVoHuong = 0;

        $doDaiVectorNguoiDung = 0;

        $doDaiVectorDiaDiem = 0;

        for (
            $i = 0;
            $i < count($vectorNguoiDung);
            $i++
        ) {

            $tichVoHuong +=
                $vectorNguoiDung[$i]
                *
                $vectorDiaDiem[$i];

            $doDaiVectorNguoiDung +=
                pow(
                    $vectorNguoiDung[$i],
                    2
                );

            $doDaiVectorDiaDiem +=
                pow(
                    $vectorDiaDiem[$i],
                    2
                );
        }

        $doDaiVectorNguoiDung =
            sqrt($doDaiVectorNguoiDung);

        $doDaiVectorDiaDiem =
            sqrt($doDaiVectorDiaDiem);

        if (
            $doDaiVectorNguoiDung == 0
            ||
            $doDaiVectorDiaDiem == 0
        ) {
            return 0;
        }

        return
            $tichVoHuong
            /
            (
                $doDaiVectorNguoiDung
                *
                $doDaiVectorDiaDiem
            );
    }

    public function tinhDiemTuongDong(
        int $maNguoiDung,
        DiaDiem $diaDiem
    ): float
    {
        $vectorNguoiDung =
            $this->layVectorNguoiDung(
                $maNguoiDung
            );

        $vectorDiaDiem =
            $this->layVectorDiaDiem(
                $diaDiem
            );

        return
            $this->tinhCosineSimilarity(
                $vectorNguoiDung,
                $vectorDiaDiem
            );
    }

  
    public function goiYChoNguoiDung(
        int $maNguoiDung
    ): array
    {
        $diaDiems = DiaDiem::with([
    'nhuCaus',
    'diaDiemDuLichs.hinhAnhs',
    'khachSans' => function ($query) {
        $query->where('trang_thai', 1)
              ->where('trang_thai_duyet', 'DaDuyet');
    }
])->get();

        $ketQua = [];

        foreach (
            $diaDiems
            as
            $diaDiem
        ) {

            $diemTuongDong =
                $this->tinhDiemTuongDong(
                    $maNguoiDung,
                    $diaDiem
                );

            if (
                $diemTuongDong <= 0
            ) {
                continue;
            }

           $anhDaiDien = null;

foreach ($diaDiem->diaDiemDuLichs as $diaDiemDuLich) {

    if ($diaDiemDuLich->hinhAnhs->isNotEmpty()) {

        $anhDaiDien = $diaDiemDuLich
            ->hinhAnhs
            ->first()
            ->duong_dan_anh;

        break;
    }
}

$ketQua[] = [

    'dia_diem' => $diaDiem,

    'diem_tuong_dong' => $diemTuongDong,

    'phan_tram' => round(
        $diemTuongDong * 100,
        2
    ),

    'anh_dai_dien' => $anhDaiDien,

    'tong_diem_du_lich' =>
        $diaDiem->diaDiemDuLichs->count(),

    'tong_khach_san' =>
        $diaDiem->khachSans->count()

];
        }

        usort(
            $ketQua,
            function (
                $a,
                $b
            ) {

                return
                    $b['diem_tuong_dong']
                    <=>
                    $a['diem_tuong_dong'];

            }
        );

        return $ketQua;
    }

    /**
     * Lấy danh sách khách sạn theo địa điểm
     */
    public function layKhachSanTheoDiaDiem(
        int $maDiaDiem
    )
    {
        return KhachSan::with([
            'hinhAnh',
            'loaiPhongs'
        ])
        ->where(
            'ma_dia_diem',
            $maDiaDiem
        )
        ->where(
            'trang_thai',
            1
        )
        ->where(
        'trang_thai_duyet',
        'DaDuyet'
        )
        ->orderBy(
            'so_sao_khach_san',
            'desc'
        )
        ->get();
    }
}