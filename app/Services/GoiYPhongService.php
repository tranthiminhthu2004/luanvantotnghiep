<?php

namespace App\Services;

class GoiYPhongService
{
    protected $phongService;

    public function __construct(
        PhongService $phongService
    )
    {
        $this->phongService = $phongService;
    }

    /**
     * Gợi ý tổ hợp phòng phù hợp nhất
     */
    public function goiY(
        $danhSachLoaiPhong,
        $ngayNhanPhong,
        $ngayTraPhong,
        $soNguoi,
        $soPhong
    )
    {
        $conPhong = [];

        $tongPhongCon = 0;

        foreach ($danhSachLoaiPhong as $loaiPhong)
        {
            $soPhongCon = $this->phongService
                ->demSoPhongConLai(

                    $loaiPhong->ma_loai_phong,

                    $ngayNhanPhong,

                    $ngayTraPhong

                );

            $conPhong[
                $loaiPhong->ma_loai_phong
            ] = $soPhongCon;

            $tongPhongCon += $soPhongCon;
        }

        // Không đủ số phòng theo yêu cầu
        if ($tongPhongCon < $soPhong)
        {
            return [

                'thanh_cong' => false,

                'thong_bao' =>
                    'Khách sạn hiện không đủ số phòng theo yêu cầu của bạn.',

                'goi_y' => null,

                'so_phong_de_xuat' => null

            ];
        }
        $tongSucChuaKhachSan = 0;

foreach ($danhSachLoaiPhong as $loaiPhong)
{
    $tongSucChuaKhachSan +=

        $loaiPhong->so_nguoi_toi_da

        *

        $conPhong[$loaiPhong->ma_loai_phong];
}
// Khách sạn không đủ sức chứa cho số lượng khách
if ($tongSucChuaKhachSan < $soNguoi)
{
    return [

        'thanh_cong' => false,

        'thong_bao' =>
            'Khách sạn hiện không đủ sức chứa cho số lượng khách của bạn.',

        'goi_y' => null,

        'so_phong_de_xuat' => null

    ];
}

        $tatCaToHop = [];

        $this->sinhToHop(

            $danhSachLoaiPhong->values()->all(),

            $conPhong,

            $soPhong,

            0,

            [],

            $tatCaToHop,

            $soNguoi

        );

        // Không có tổ hợp đủ sức chứa
        if (empty($tatCaToHop))
        {
            return [

                'thanh_cong' => false,

                'thong_bao' =>
                    'Khách sạn hiện không đủ sức chứa với số phòng đã chọn.',

                'goi_y' => null,

                'so_phong_de_xuat' =>
                    $this->tinhSoPhongToiThieu(

                        $danhSachLoaiPhong,
                        
                        $conPhong,
                        
                        $soNguoi

                    )

            ];
        }

        $tatCaToHop = $this->chamDiem(

            $tatCaToHop,

            $soNguoi

        );

        return [

            'thanh_cong' => true,

            'thong_bao' => null,

            'goi_y' => $this->timPhuongAnTotNhat(
                $tatCaToHop
            ),

            'so_phong_de_xuat' => null

        ];
    }
    /**
 * Sinh tất cả tổ hợp phòng theo số phòng khách yêu cầu
 */
private function sinhToHop(
    $loaiPhongs,
    $conPhong,
    $soPhongCan,
    $index,
    $toHop,
    &$ketQua,
    $soNguoi
)
{
    // Đã đủ số phòng
    if ($soPhongCan == 0)
    {
        $tongSucChua = 0;

        foreach ($toHop as $item)
        {
            $tongSucChua +=

                $item['loai_phong']->so_nguoi_toi_da

                *

                $item['so_luong'];
        }

        // Chỉ lưu tổ hợp đủ sức chứa
        if ($tongSucChua >= $soNguoi)
        {
            $ketQua[] = $toHop;
        }

        return;
    }

    // Đã duyệt hết loại phòng
    if ($index >= count($loaiPhongs))
    {
        return;
    }

    $loaiPhong = $loaiPhongs[$index];

    $soPhongCon =

        $conPhong[
            $loaiPhong->ma_loai_phong
        ] ?? 0;

    // Chỉ được chọn tối đa số phòng còn lại
    // hoặc số phòng khách còn cần
    $max = min(

        $soPhongCon,

        $soPhongCan

    );

    // Thử chọn từ 0 -> max phòng
    for ($i = 0; $i <= $max; $i++)
    {
        $toHopMoi = $toHop;

        if ($i > 0)
        {
            $toHopMoi[] = [

                'loai_phong' => $loaiPhong,

                'so_luong' => $i

            ];
        }

        $this->sinhToHop(

            $loaiPhongs,

            $conPhong,

            $soPhongCan - $i,

            $index + 1,

            $toHopMoi,

            $ketQua,

            $soNguoi

        );
    }
}/**
 * Chấm điểm các tổ hợp phòng
 */
private function chamDiem(
    $tatCaToHop,
    $soNguoi
)
{
    $ketQua = [];

    foreach ($tatCaToHop as $toHop)
    {
        $tongSucChua = 0;

        $tongGia = 0;

        $tongPhong = 0;

        $soLoaiPhong = count($toHop);

        foreach ($toHop as $item)
        {
            $tongSucChua +=

                $item['loai_phong']->so_nguoi_toi_da

                *

                $item['so_luong'];

            $tongGia +=

                $item['loai_phong']->gia_co_ban

                *

                $item['so_luong'];

            $tongPhong +=

                $item['so_luong'];
        }

        $ketQua[] = [

            'phuong_an' => $toHop,

            'tong_suc_chua' => $tongSucChua,

            'tong_gia' => $tongGia,

            'tong_phong' => $tongPhong,

            // Dư bao nhiêu chỗ
            'du_cho' =>

                $tongSucChua - $soNguoi,

            // Bao nhiêu loại phòng
            'so_loai_phong' =>

                $soLoaiPhong

        ];
    }

    return $ketQua;
}
/**
 * Chọn phương án tốt nhất
 */
private function timPhuongAnTotNhat(
    $danhSachPhuongAn
)
{
    if (empty($danhSachPhuongAn))
    {
        return null;
    }

    usort($danhSachPhuongAn, function ($a, $b) {

        // 1. Ưu tiên dư chỗ ít hơn
        if ($a['du_cho'] != $b['du_cho'])
        {
            return

                $a['du_cho']

                <=>

                $b['du_cho'];
        }

           // 2. Ưu tiên ít loại phòng hơn
        if ($a['so_loai_phong'] != $b['so_loai_phong'])
        {
            return

                $a['so_loai_phong']

                <=>

                $b['so_loai_phong'];
        }
        // 3. Ưu tiên giá thấp hơn
        if ($a['tong_gia'] != $b['tong_gia'])
        {
            return

                $a['tong_gia']

                <=>

                $b['tong_gia'];
        }

        return 0;

    });

    return $danhSachPhuongAn[0];
}
/**
 * Tính số phòng tối thiểu cần thiết
 */

private function tinhSoPhongToiThieu(
    $danhSachLoaiPhong,
    $conPhong,
    $soNguoi
)
{
    // Sắp xếp loại phòng theo sức chứa giảm dần
    $loaiPhongs = collect($danhSachLoaiPhong)
        ->sortByDesc('so_nguoi_toi_da')
        ->values();

    $tongSucChua = 0;

    $soPhongCan = 0;

    foreach ($loaiPhongs as $loaiPhong)
    {
        $soPhongCon =

            $conPhong[
                $loaiPhong->ma_loai_phong
            ] ?? 0;

        // Duyệt từng phòng còn trống
        for ($i = 0; $i < $soPhongCon; $i++)
        {
            $tongSucChua +=

                $loaiPhong->so_nguoi_toi_da;

            $soPhongCan++;

            // Đã đủ sức chứa
            if ($tongSucChua >= $soNguoi)
            {
                return $soPhongCan;
            }
        }
    }

    // Toàn khách sạn cũng không đủ sức chứa
    return null;
}
}