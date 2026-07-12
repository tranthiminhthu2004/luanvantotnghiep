<?php

namespace App\Http\Controllers\NguoiDung;

use App\Http\Controllers\Controller;
use App\Models\NguoiDungNhuCau;
use App\Models\NhuCauDuLich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserSoThichController extends Controller
{
    public function index()
    {
        $maNguoiDung = auth()->user()->ma_nguoi_dung;

        $nhuCaus = NhuCauDuLich::orderBy(
            'ten_nhu_cau'
        )->get();

        $soThichs = NguoiDungNhuCau::where(
            'ma_nguoi_dung',
            $maNguoiDung
        )
        ->pluck(
            'muc_do_uu_tien',
            'ma_nhu_cau'
        );

       return view(
    'users.sothich.index',
            compact(
                'nhuCaus',
                'soThichs'
            )
        );
    }

    public function store(Request $request)
    {
       $request->validate(
    [
        'muc_do_uu_tien' => 'required|array|min:1',

        'muc_do_uu_tien.*' => 'nullable|integer|min:1|max:5',
    ],
    [
        'muc_do_uu_tien.required' => 'Vui lòng chọn ít nhất một sở thích.',

        'muc_do_uu_tien.array' => 'Dữ liệu sở thích không hợp lệ.',

        'muc_do_uu_tien.min' => 'Vui lòng chọn ít nhất một sở thích.',
    ]
);
        $maNguoiDung = auth()->user()->ma_nguoi_dung;

DB::transaction(function () use ($request, $maNguoiDung) {

    NguoiDungNhuCau::where(
        'ma_nguoi_dung',
        $maNguoiDung
    )->delete();

    foreach (
        $request->muc_do_uu_tien
        as
        $maNhuCau => $mucDo
    ) {

        if (empty($mucDo)) {
            continue;
        }

        NguoiDungNhuCau::create([

            'ma_nguoi_dung' => $maNguoiDung,

            'ma_nhu_cau' => $maNhuCau,

            'muc_do_uu_tien' => $mucDo

        ]);
    }

});

        return redirect()
            ->route(
                'sothich.index'
            )
            ->with(
                'success',
                'Đã cập nhật sở thích.'
            );
    }
}