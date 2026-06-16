<?php

namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use App\Models\LoaiPhong;
use App\Models\TienNghi;
use Illuminate\Http\Request;

class AdminLoaiPhongTienNghiController extends Controller
{
    public function edit($id)
    {
        $loaiPhong = LoaiPhong::findOrFail($id);

        $tienNghis = TienNghi::where(
            'trang_thai',
            1
        )->orderBy(
            'ten_tien_nghi'
        )->get();

        return view(
            'admin.loaiphong.tiennghi',
            compact(
                'loaiPhong',
                'tienNghis'
            )
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $loaiPhong = LoaiPhong::findOrFail($id);

        $loaiPhong->tienNghis()->sync(
            $request->tien_nghi ?? []
        );

        return redirect()
            ->route('admin.loaiphong.index')
            ->with(
                'success',
                'Cập nhật tiện nghi loại phòng thành công'
            );
    }
}