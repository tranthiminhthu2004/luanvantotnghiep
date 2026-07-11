<?php

namespace App\Http\Controllers\DuLich;

use App\Http\Controllers\Controller;
use App\Models\DiaDiemDuLich;

class UserDiemDenController extends Controller
{
    public function show($maDiaDiemDuLich)
    {
        $diemDen = DiaDiemDuLich::with([
            'diaDiem',
            'hinhAnhs'
        ])->findOrFail($maDiaDiemDuLich);

        return view(
            'users.diemden.index',
            compact(
                'diemDen'
            )
        );
    }
}