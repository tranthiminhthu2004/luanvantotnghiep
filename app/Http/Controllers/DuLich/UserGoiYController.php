<?php

namespace App\Http\Controllers\DuLich;

use App\Http\Controllers\Controller;
use App\Models\NguoiDungNhuCau;
use App\Services\GoiYService;
use Illuminate\Http\Request;

class UserGoiYController extends Controller
{
    protected GoiYService $goiYService;

    public function __construct(GoiYService $goiYService)
    {
        $this->goiYService = $goiYService;
    }

    public function index()
    {
        $soThichs = collect();

        $ketQuaGoiY = [];

        if (auth()->check()) {

            $soThichs = NguoiDungNhuCau::with('nhuCau')
                ->where(
                    'ma_nguoi_dung',
                    auth()->user()->ma_nguoi_dung
                )
                ->orderByDesc('muc_do_uu_tien')
                ->get();
        }

        return view(
            'users.diadiemdulich.index',
            compact(
                'soThichs',
                'ketQuaGoiY'
            )
        );
    }

    public function goiY(Request $request)
{
    if (!auth()->check()) {

        if ($request->ajax()) {
            return response()->json([
                'message' => 'Vui lòng đăng nhập để sử dụng chức năng gợi ý.'
            ], 401);
        }

        return redirect()
            ->route('login');
    }

    $maNguoiDung = auth()->user()->ma_nguoi_dung;

    $soThichs = NguoiDungNhuCau::with('nhuCau')
        ->where(
            'ma_nguoi_dung',
            $maNguoiDung
        )
        ->orderByDesc('muc_do_uu_tien')
        ->get();

    $ketQuaGoiY = $this->goiYService
        ->goiYChoNguoiDung(
            $maNguoiDung
        );
    if ($request->ajax()) {

        return view(
            'users.diadiemdulich.ketqua',
            compact(
                'ketQuaGoiY'
            )
        );
    }

    // Nếu truy cập bình thường → trả về toàn bộ trang
    return view(
        'users.diadiemdulich.index',
        compact(
            'soThichs',
            'ketQuaGoiY'
        )
    );
}
}