<?php

namespace App\Http\Controllers\DuLich;

use App\Http\Controllers\Controller;
use App\Models\NguoiDungNhuCau;
use App\Services\GoiYService;

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

    public function goiY()
    {
        if (!auth()->check()) {

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

        return view(
            'users.diadiemdulich.index',
            compact(
                'soThichs',
                'ketQuaGoiY'
            )
        );
    }
}