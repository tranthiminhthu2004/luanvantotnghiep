<?php

namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use App\Models\KhachSan;

class UserKhachSanController extends Controller
{
    public function index()
    {
        $khachSans = KhachSan::where('trang_thai', 1)
                            ->get();

        return view(
            'users.khachsan.index',
            compact('khachSans')
        );
    }

    public function show($id)
    {
        $khachSan = KhachSan::findOrFail($id);

        return view(
            'users.chitietkhachsan.index',
            compact('khachSan')
        );
    }
}