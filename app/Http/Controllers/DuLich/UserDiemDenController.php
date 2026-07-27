<?php

namespace App\Http\Controllers\DuLich;

use App\Http\Controllers\Controller;
use App\Models\DiaDiemDuLich;
use App\Services\UserDiemDenService;

class UserDiemDenController extends Controller
{
    public function __construct(
    UserDiemDenService $userDiemDenService
) {
    $this->userDiemDenService =
        $userDiemDenService;
}

    public function show($maDiaDiemDuLich)
    {
       $diemDen = $this->userDiemDenService
    ->layThongTinDiemDen($maDiaDiemDuLich);

$khachSans = $this->userDiemDenService
    ->layKhachSanGanDay($maDiaDiemDuLich);

return view(
    'users.diemden.index',
    compact(
        'diemDen',
        'khachSans'
    )
);
    }
}