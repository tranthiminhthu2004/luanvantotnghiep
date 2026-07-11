<?php

namespace App\Http\Controllers\DuLich;

use App\Http\Controllers\Controller;
use App\Models\DiaDiem;

class UserDiaDiemController extends Controller
{
    public function show($maDiaDiem)
    {
       $diaDiem = DiaDiem::with([
    'diaDiemDuLichs.hinhAnhs',
    'khachSans.hinhAnh',
    'khachSans.loaiPhongs'
])->findOrFail($maDiaDiem);
return view(
    'users.diadiem.index',
    compact('diaDiem')
);
    }
}