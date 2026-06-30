<?php

namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use App\Models\KhachSan;
use App\Models\DiaDiem;
use App\Models\TienNghi;
use Illuminate\Http\Request;

class UserKhachSanController extends Controller
{
    private function locKhachSan(Request $request)
    {
        $query = KhachSan::where(
            'trang_thai',
            1
        );

        // Địa điểm
        if ($request->filled('ma_dia_diem'))
        {
            $query->where(
                'ma_dia_diem',
                $request->ma_dia_diem
            );
        }

        // Lọc theo số sao
        if ($request->filled('so_sao'))
        {
            $query->whereIn(
                'so_sao_khach_san',
                (array) $request->so_sao
            );
        }

        // Lọc theo khoảng giá
        if ($request->filled('gia'))
        {
            $query->whereHas(
                'loaiPhongs',
                function ($q) use ($request)
                {
                    $q->where(function ($giaQuery) use ($request)
                    {
                        foreach ($request->gia as $gia)
                        {
                            switch ($gia)
                            {
                                case 'duoi500':

                                    $giaQuery->orWhere(
                                        'gia_co_ban',
                                        '<',
                                        500000
                                    );

                                    break;

                                case '500-1000':

                                    $giaQuery->orWhereBetween(
                                        'gia_co_ban',
                                        [
                                            500000,
                                            1000000
                                        ]
                                    );

                                    break;

                                case '1000-2000':

                                    $giaQuery->orWhereBetween(
                                        'gia_co_ban',
                                        [
                                            1000000,
                                            2000000
                                        ]
                                    );

                                    break;

                                case 'tren2000':

                                    $giaQuery->orWhere(
                                        'gia_co_ban',
                                        '>',
                                        2000000
                                    );

                                    break;
                            }
                        }
                    });
                }
            );
        }

        // Lọc theo tiện nghi khách sạn
if ($request->filled('tien_nghi'))
{
    $query->whereHas(
        'tienNghis',
        function ($q) use ($request)
        {
            $q->whereIn(
                'tien_nghi.ma_tien_nghi',
                (array) $request->tien_nghi
            );
        }
    );
}

        return $query;
    }

    public function index(Request $request)
    {
        $query = $this->locKhachSan($request);

        $khachSans = $query
            ->with([
                'hinhAnh',
                'diaDiem',
                'loaiPhongs'
            ])
            ->paginate(5)
            ->withQueryString();

        $diaDiems = DiaDiem::orderBy(
            'ten_dia_diem'
        )->get();

        $tienNghis = TienNghi::where(
            'trang_thai',
            1
        )->orderBy(
            'ten_tien_nghi'
        )->get();

        return view(
            'users.khachsan.index',
            compact(
                'khachSans',
                'diaDiems',
                'tienNghis'
            )
        );
    }
        public function show(Request $request, $id)
    {
        $khachSan = KhachSan::with([
            'loaiPhongs.hinhAnh',
            'loaiPhongs.phongs'
        ])->findOrFail($id);

        $tongNguoi =
            (int) $request->so_nguoi_truong_thanh +
            (int) $request->so_tre_em +
            (int) $request->so_nguoi_cao_tuoi;

        $soPhong =
            (int) $request->so_luong_phong;

        $sucChuaCanThiet =
            ceil(
                $tongNguoi /
                max($soPhong, 1)
            );

        // Danh sách phòng đề xuất
        $loaiPhongsDeXuat = $khachSan
            ->loaiPhongs()
            ->where(
                'so_nguoi_toi_da',
                '>=',
                $sucChuaCanThiet
            )
            ->with([
                'hinhAnh',
                'phongs'
            ])
            ->get();

        // Danh sách phòng khác
        $loaiPhongsKhac = $khachSan
            ->loaiPhongs()
            ->where(
                'so_nguoi_toi_da',
                '<',
                $sucChuaCanThiet
            )
            ->with([
                'hinhAnh',
                'phongs'
            ])
            ->get();

        return view(
            'users.chitietkhachsan.index',
            compact(
                'khachSan',
                'loaiPhongsDeXuat',
                'tongNguoi',
                'soPhong',
                'sucChuaCanThiet',
                'loaiPhongsKhac'
            )
        );
    }
        public function timKiem(Request $request)
    {
        $query = $this->locKhachSan($request);

        $khachSans = $query
            ->with([
                'hinhAnh',
                'diaDiem',
                'loaiPhongs'
            ])
            ->paginate(10)
            ->withQueryString();

        $diaDiems = DiaDiem::orderBy(
            'ten_dia_diem'
        )->get();

        $tienNghis = TienNghi::where(
            'trang_thai',
            1
        )->orderBy(
            'ten_tien_nghi'
        )->get();

        return view(
            'users.khachsan.ketqua',
            compact(
                'khachSans',
                'diaDiems',
                'tienNghis'
            )
        );
    }
}