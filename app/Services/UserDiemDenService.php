<?php

namespace App\Services;

use App\Models\KhachSan;
use App\Models\DiaDiemDuLich;

class UserDiemDenService
{
    /**
     * Lấy thông tin điểm đến.
     */
    public function layThongTinDiemDen($maDiaDiemDuLich)
    {
        return DiaDiemDuLich::with([
            'diaDiem',
            'hinhAnhs'
        ])->findOrFail($maDiaDiemDuLich);
    }

    /**
     * Lấy danh sách khách sạn cùng địa điểm.
     */
   public function layKhachSanTheoDiaDiem($maDiaDiem)
{
    return KhachSan::with([
            'hinhAnh',
            'loaiPhongs'
        ])
        ->where('ma_dia_diem', $maDiaDiem)
        ->where('trang_thai', true)
        ->where('trang_thai_duyet', 'DaDuyet')
        ->get();
}
    /**
 * Tính khoảng cách giữa hai tọa độ bằng công thức Haversine.
 *
 * @param float $viDo1
 * @param float $kinhDo1
 * @param float $viDo2
 * @param float $kinhDo2
 *
 * @return float Khoảng cách (km)
 */
private function tinhKhoangCach(
    float $viDo1,
    float $kinhDo1,
    float $viDo2,
    float $kinhDo2
): float {

    $banKinhTraiDat = 6371;

    $chenhLechViDo = deg2rad($viDo2 - $viDo1);

    $chenhLechKinhDo = deg2rad($kinhDo2 - $kinhDo1);

    $viDo1 = deg2rad($viDo1);

    $viDo2 = deg2rad($viDo2);

    $a =
        sin($chenhLechViDo / 2) * sin($chenhLechViDo / 2)
        +
        cos($viDo1)
        *
        cos($viDo2)
        *
        sin($chenhLechKinhDo / 2)
        *
        sin($chenhLechKinhDo / 2);

    $c = 2 * atan2(
        sqrt($a),
        sqrt(1 - $a)
    );

    return round(
        $banKinhTraiDat * $c,
        2
    );
}
/**
 * Lấy danh sách khách sạn gần điểm du lịch.
 *
 * @param int $maDiaDiemDuLich
 * @return \Illuminate\Support\Collection
 */
public function layKhachSanGanDay($maDiaDiemDuLich)
{
    // Lấy thông tin điểm du lịch
    $diemDen = $this->layThongTinDiemDen(
        $maDiaDiemDuLich
    );

    // Lấy danh sách khách sạn cùng địa điểm
    $khachSans = $this->layKhachSanTheoDiaDiem(
        $diemDen->ma_dia_diem
    );

    // Tính khoảng cách từng khách sạn
  foreach ($khachSans as $khachSan) {

    if (
        $khachSan->vi_do !== null &&
        $khachSan->kinh_do !== null &&
        $diemDen->vi_do !== null &&
        $diemDen->kinh_do !== null
    ) {

        $khachSan->khoang_cach_km =
            $this->tinhKhoangCach(
                $diemDen->vi_do,
                $diemDen->kinh_do,
                $khachSan->vi_do,
                $khachSan->kinh_do
            );

    } else {

        $khachSan->khoang_cach_km = null;

    }

}

    // Sắp xếp theo khoảng cách
    return $khachSans
        ->sortBy('khoang_cach_km')
        ->values();
}
public function layDiaDiemDuLichGanKhachSan($maKhachSan)
{
    $khachSan = KhachSan::findOrFail($maKhachSan);

    $diaDiemDuLichs = DiaDiemDuLich::query()
        ->where(
            'ma_dia_diem',
            $khachSan->ma_dia_diem
        )
        ->with([
            'hinhAnhs',
            'diaDiem'
        ])
        ->get();

    foreach ($diaDiemDuLichs as $diaDiemDuLich) {

        $diaDiemDuLich->khoang_cach_km =
            $this->tinhKhoangCach(

                $khachSan->vi_do,
                $khachSan->kinh_do,

                $diaDiemDuLich->vi_do,
                $diaDiemDuLich->kinh_do

            );
    }

    return $diaDiemDuLichs
        ->sortBy('khoang_cach_km')
        ->values();
}
}