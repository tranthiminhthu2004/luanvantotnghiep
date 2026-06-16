<?php

namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use App\Models\KhachSan;
use App\Models\TienNghi;
use Illuminate\Http\Request;

class AdminKhachSanTienNghiController extends Controller
{
    public function edit($id)
    {
        $khachSan = KhachSan::findOrFail($id);

        $tienNghis = TienNghi::where(
            'trang_thai',
            1
        )->orderBy(
            'ten_tien_nghi'
        )->get();

        return view(
            'admin.khachsan.tiennghi',
            compact(
                'khachSan',
                'tienNghis'
            )
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $khachSan = KhachSan::findOrFail($id);

        $khachSan->tienNghis()->sync(
            $request->tien_nghi ?? []
        );

        return redirect()
            ->route('admin.khachsan.index')
            ->with(
                'success',
                'Cập nhật tiện nghi thành công'
            );
    }
}