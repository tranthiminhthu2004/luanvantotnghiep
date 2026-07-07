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
        $nhuCaus = NhuCauDuLich::orderBy(
            'ten_nhu_cau'
        )->get();

        return view(
            'users.diadiemdulich.index',
            compact('nhuCaus')
        );
    }

    public function goiY(Request $request)
    {
        $request->validate(
            [
                'muc_do_uu_tien' => 'required|array|min:1',
                'muc_do_uu_tien.*' => 'required|integer|min:1|max:5',
            ],
            [
                'muc_do_uu_tien.required' => 'Vui lòng chọn ít nhất một nhu cầu du lịch.',
                'muc_do_uu_tien.array' => 'Dữ liệu mức độ ưu tiên không hợp lệ.',
                'muc_do_uu_tien.min' => 'Vui lòng chọn ít nhất một nhu cầu du lịch.',

                'muc_do_uu_tien.*.required' => 'Vui lòng chọn mức độ ưu tiên.',
                'muc_do_uu_tien.*.integer' => 'Mức độ ưu tiên không hợp lệ.',
                'muc_do_uu_tien.*.min' => 'Mức độ ưu tiên phải từ 1 đến 5.',
                'muc_do_uu_tien.*.max' => 'Mức độ ưu tiên phải từ 1 đến 5.',
            ]
        );

        $mucDoUuTienNguoiDung = array_map(
            'intval',
            $request->muc_do_uu_tien
        );

        $nhuCauNguoiDung = array_keys(
            $mucDoUuTienNguoiDung
        );

        $tatCaNhuCau = NhuCauDuLich::orderBy(
            'ma_nhu_cau'
        )->get();

        $diaDiems = DiaDiem::with([
            'nhuCaus'
        ])->get();

        $ketQuaGoiY = [];

        foreach ($diaDiems as $diaDiem) {

            $vectorNguoiDung = [];

            $vectorDiaDiem = [];

            foreach ($tatCaNhuCau as $nhuCau) {

                $maNhuCau = $nhuCau->ma_nhu_cau;

                /*
                    Vector người dùng:
                    Nếu người dùng chọn nhu cầu thì lấy mức ưu tiên 1-5.
                    Nếu không chọn thì bằng 0.
                */
                $vectorNguoiDung[] =
                    $mucDoUuTienNguoiDung[$maNhuCau] ?? 0;

                /*
                    Vector điểm đến:
                    Lấy mức độ phù hợp trong bảng trung gian
                    dia_diem_nhu_cau_du_lich.
                */
                $nhuCauCuaDiaDiem = $diaDiem->nhuCaus
                    ->firstWhere(
                        'ma_nhu_cau',
                        $maNhuCau
                    );

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
                    'phan_tram' => round(
                        $diemTuongDong * 100,
                        2
                    ),
                ];
            }
        }

        usort($ketQuaGoiY, function ($a, $b) {

            return $b['diem_tuong_dong'] <=> $a['diem_tuong_dong'];

        });

        $nhuCaus = NhuCauDuLich::orderBy(
            'ten_nhu_cau'
        )->get();

        $nhuCauDaChon = NhuCauDuLich::whereIn(
            'ma_nhu_cau',
            $nhuCauNguoiDung
        )->get();

        return view(
            'users.diadiemdulich.index',
            compact(
                'nhuCaus',
                'ketQuaGoiY',
                'nhuCauNguoiDung',
                'nhuCauDaChon',
                'mucDoUuTienNguoiDung'
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

            $doDaiVectorA += pow(
                $vectorA[$i],
                2
            );

            $doDaiVectorB += pow(
                $vectorB[$i],
                2
            );
        }

        $doDaiVectorA = sqrt($doDaiVectorA);

        $doDaiVectorB = sqrt($doDaiVectorB);

        if ($doDaiVectorA == 0 || $doDaiVectorB == 0) {
            return 0;
        }

        return $tichVoHuong / (
            $doDaiVectorA * $doDaiVectorB
        );
    }
}