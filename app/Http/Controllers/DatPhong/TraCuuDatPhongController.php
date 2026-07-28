<?php

namespace App\Http\Controllers\DatPhong;

use App\Http\Controllers\Controller;
use App\Models\DatPhong;
use Illuminate\Http\Request;
use App\Services\DatPhongService;

class TraCuuDatPhongController extends Controller
{
    public function __construct(DatPhongService $datPhongService)
{
    $this->datPhongService = $datPhongService;
}
    /**
     * Hiển thị trang tra cứu.
     */
    public function index()
    {
        return view('users.tracuudatphong.index');
    }

    /**
     * Xử lý tra cứu đơn đặt phòng.
     */
    public function traCuu(Request $request)
    {
        $request->validate(
            [
                'ma_dat_phong' => 'required|string',
                'thong_tin'    => 'required|string',
            ],
            [
                'ma_dat_phong.required' => 'Vui lòng nhập mã đặt phòng.',
                'thong_tin.required'    => 'Vui lòng nhập email hoặc số điện thoại.',
            ]
        );

        $datPhong = DatPhong::with([
                'khachSan.hinhAnh',
                'chiTietDatPhong.loaiPhong',
                'thanhToans',
            ])
            ->where('ma_dat_phong', $request->ma_dat_phong)
            ->where(function ($query) use ($request) {

                $query->where(
                    'email_khach',
                    $request->thong_tin
                )->orWhere(
                    'so_dien_thoai_khach',
                    $request->thong_tin
                );

            })
            ->first();

        if (!$datPhong) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Không tìm thấy đơn đặt phòng. Vui lòng kiểm tra lại thông tin.'
                );

        }

       return view(
    'users.tracuudatphong.index',
    [
        'datPhong' => $datPhong,
        'maDatPhong' => $request->ma_dat_phong,
        'thongTin' => $request->thong_tin,
    ]
);
    }
    public function huy($maDonDatPhong)
{
    try {

        $datPhong = DatPhong::where(
                'ma_dat_phong',
                $maDonDatPhong
            )
            ->firstOrFail();

        $this->datPhongService->huyDatPhong(
            $datPhong->ma_don_dat_phong
        );

        return redirect()
            ->route('users.tracuudatphong.index')
            ->with(
                'success',
                'Hủy đặt phòng thành công.'
            );

    } catch (\Exception $e) {

        return back()->with(
            'error',
            $e->getMessage()
        );

    }
}
}