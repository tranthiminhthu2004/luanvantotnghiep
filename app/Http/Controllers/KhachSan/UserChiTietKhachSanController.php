<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\KhachSan;

class ChiTietKhachSanController extends Controller
{
    public function show($id)
    {
        $khachSan = KhachSan::with([
            'hinhAnh',
            'tienNghis',
            'loaiPhongs.hinhAnh',
            'loaiPhongs.phongs'
        ])->findOrFail($id);

        return view(
            'users.chitietkhachsan.index',
            compact('khachSan')
        );
    }
}