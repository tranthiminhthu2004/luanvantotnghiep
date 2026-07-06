<?php

namespace App\Http\Controllers\DuLich;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiaDiem;
use App\Models\NhuCauDuLich;

class UserGoiYController extends Controller
{
    public function index()
    {
        $nhuCaus = NhuCauDuLich::orderBy('ten_nhu_cau')->get();

        return view('users.goiy.index', compact('nhuCaus'));
    }

    public function goiY(Request $request)
    {
        $request->validate(
            [
                'nhu_cau' => 'required|array|min:1',
                'nhu_cau.*' => 'exists:nhu_cau_du_lich,ma_nhu_cau',
            ],
            [
                'nhu_cau.required' => 'Vui lòng chọn ít nhất một nhu cầu du lịch.',
                'nhu_cau.array' => 'Dữ liệu nhu cầu du lịch không hợp lệ.',
                'nhu_cau.min' => 'Vui lòng chọn ít nhất một nhu cầu du lịch.',
                'nhu_cau.*.exists' => 'Nhu cầu du lịch không tồn tại.',
            ]
        );

        $nhuCauNguoiDung = array_map('intval', $request->nhu_cau);

        $tatCaNhuCau = NhuCauDuLich::orderBy('ma_nhu_cau')->get();

        $diaDiems = DiaDiem::with([
            'nhuCaus',
            'diaDiemDuLichs.hinhAnhs',
            'khachSans'
        ])->get();

        $ketQuaGoiY = [];

        foreach ($diaDiems as $diaDiem) {
            $vectorNguoiDung = [];
            $vectorDiaDiem = [];

            foreach ($tatCaNhuCau as $nhuCau) {
                $maNhuCau = $nhuCau->ma_nhu_cau;

                // Vector người dùng: chọn = 1, không chọn = 0
                $vectorNguoiDung[] = in_array($maNhuCau, $nhuCauNguoiDung) ? 1 : 0;

                // Vector điểm đến: lấy mức độ phù hợp, nếu không có thì = 0
                $nhuCauCuaDiaDiem = $diaDiem->nhuCaus
                    ->firstWhere('ma_nhu_cau', $maNhuCau);

                $vectorDiaDiem[] = $nhuCauCuaDiaDiem
                    ? (float) $nhuCauCuaDiaDiem->pivot->muc_do_phu_hop
                    : 0;
            }

            $diemTuongDong = $this->tinhCosineSimilarity(
                $vectorNguoiDung,
                $vectorDiaDiem
            );

            if ($diemTuongDong > 0) {
                $ketQuaGoiY[] = [
                    'dia_diem' => $diaDiem,
                    'diem_tuong_dong' => $diemTuongDong,
                    'phan_tram' => round($diemTuongDong * 100, 2),
                ];
            }
        }

        usort($ketQuaGoiY, function ($a, $b) {
            return $b['diem_tuong_dong'] <=> $a['diem_tuong_dong'];
        });

        $nhuCaus = NhuCauDuLich::orderBy('ten_nhu_cau')->get();

        $nhuCauDaChon = NhuCauDuLich::whereIn(
            'ma_nhu_cau',
            $nhuCauNguoiDung
        )->get();

        return view(
            'users.goiy.index',
            compact(
                'nhuCaus',
                'ketQuaGoiY',
                'nhuCauNguoiDung',
                'nhuCauDaChon'
            )
        );
    }

    private function tinhCosineSimilarity($vectorA, $vectorB)
    {
        $tichVoHuong = 0;
        $doDaiVectorA = 0;
        $doDaiVectorB = 0;

        for ($i = 0; $i < count($vectorA); $i++) {
            $tichVoHuong += $vectorA[$i] * $vectorB[$i];

            $doDaiVectorA += pow($vectorA[$i], 2);

            $doDaiVectorB += pow($vectorB[$i], 2);
        }

        $doDaiVectorA = sqrt($doDaiVectorA);
        $doDaiVectorB = sqrt($doDaiVectorB);

        if ($doDaiVectorA == 0 || $doDaiVectorB == 0) {
            return 0;
        }

        return $tichVoHuong / ($doDaiVectorA * $doDaiVectorB);
    }
}