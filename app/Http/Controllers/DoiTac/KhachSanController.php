<?php

namespace App\Http\Controllers\DoiTac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhachSan;

class KhachSanController extends Controller
{
     public function index()
    {
        $khachSans = KhachSan::where(
            'ma_nguoi_dung',
            auth()->user()->ma_nguoi_dung
        )
        ->latest('ma_khach_san')
        ->get();

        return view(
            'doitac.khachsan.index',
            compact('khachSans')
        );
    }
}