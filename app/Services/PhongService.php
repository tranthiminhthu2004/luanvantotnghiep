<?php

namespace App\Services;

use App\Models\Phong;
use App\Models\LichPhong;

class PhongService
{
    /**
     * Tìm các phòng còn trống theo loại phòng
     *
     * @param int $maLoaiPhong
     * @param string $ngayNhanPhong
     * @param string $ngayTraPhong
     * @param int $soLuongCanDat
     * @return \Illuminate\Support\Collection
     */
    public function timPhongTrong(
    $maLoaiPhong,
    $ngayNhanPhong,
    $ngayTraPhong,
    $soLuongCanDat
)
{
    // Lấy tất cả phòng đang hoạt động của loại phòng
    $phongs = Phong::where(
        'ma_loai_phong',
        $maLoaiPhong
    )
    ->where(
        'trang_thai_phong',
        'DangHoatDong'
    )
    ->get();

    $phongTrong = collect();

    foreach ($phongs as $phong)
    {
        // Kiểm tra phòng đã được đặt trong khoảng ngày chưa
        $daDat = LichPhong::where(
            'ma_phong',
            $phong->ma_phong
        )
        ->where(
            'ngay',
            '>=',
            $ngayNhanPhong
        )
        ->where(
            'ngay',
            '<',
            $ngayTraPhong
        )
        ->where(
            'trang_thai',
            'DaDat'
        )
        ->lockForUpdate()
        ->exists();

        if (!$daDat)
        {
            $phongTrong->push($phong);
        }
    }

    // Không đủ số lượng phòng
    if (
        $phongTrong->count()
        < $soLuongCanDat
    )
    {
        return collect();
    }

    // Trả về đúng số lượng cần đặt
    return $phongTrong->take(
        $soLuongCanDat
    );
}
    /**
     * Đếm số phòng còn trống
     *
     * @param int $maLoaiPhong
     * @param string $ngayNhanPhong
     * @param string $ngayTraPhong
     * @return int
     */
 public function demSoPhongConLai(
    $maLoaiPhong,
    $ngayNhanPhong,
    $ngayTraPhong
)
{
    $phongs = Phong::where(
    'ma_loai_phong',
    $maLoaiPhong
)
->where(
    'trang_thai_phong',
    'DangHoatDong'
)
->lockForUpdate()
->get();

    $soPhongTrong = 0;

    foreach ($phongs as $phong)
    {
        $daDat = LichPhong::where(
            'ma_phong',
            $phong->ma_phong
        )
        ->where(
            'trang_thai',
            'DaDat'
        )
        ->where(
            'ngay',
            '>=',
            $ngayNhanPhong
        )
        ->where(
            'ngay',
            '<',
            $ngayTraPhong
        )
        ->exists();

        if (!$daDat)
        {
            $soPhongTrong++;
        }
    }

    return $soPhongTrong;
}
}