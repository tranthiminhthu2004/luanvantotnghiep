<?php

namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TienNghi;

class AdminTienNghiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tienNghis = TienNghi::orderByDesc(
            'ma_tien_nghi'
        )->get();

        $tongTienNghi = TienNghi::count();

        $tienNghiHoatDong = TienNghi::where(
            'trang_thai',
            1
        )->count();

        $tienNghiTamDung = TienNghi::where(
            'trang_thai',
            0
        )->count();

        return view(
            'admin.tiennghi.index',
            compact(
                'tienNghis',
                'tongTienNghi',
                'tienNghiHoatDong',
                'tienNghiTamDung'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
          public function create()
    {
        return view(
            'admin.tiennghi.create'
        );
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([

            'ten_tien_nghi' => 'required|max:100',

            'mo_ta' => 'nullable|max:255'      ]);
            TienNghi::create([

            'ten_tien_nghi' =>
                $request->ten_tien_nghi,
            'mo_ta' =>
                $request->mo_ta,
            'icon' => $request->icon,
            'trang_thai' =>
                $request->trang_thai ?? 1

        ]);

        return redirect()
            ->route('admin.tiennghi.index')
            ->with(
                'success',
                'Thêm tiện nghi thành công'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $tienNghi = TienNghi::findOrFail($id);

        return view(
            'admin.tiennghi.show',
            compact('tienNghi')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $tienNghi = TienNghi::findOrFail($id);

        return view(
            'admin.tiennghi.edit',
            compact('tienNghi')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([

            'ten_tien_nghi' => 'required|max:100',

            'mo_ta' => 'nullable|max:255'

        ]);

        $tienNghi = TienNghi::findOrFail($id);

        $tienNghi->update([
    'ten_tien_nghi' => $request->ten_tien_nghi,
    'mo_ta' => $request->mo_ta,
    'icon' => $request->icon,
    'trang_thai' => $request->trang_thai,
]);

        return redirect()
            ->route('admin.tiennghi.index')
            ->with(
                'success',
                'Cập nhật thành công'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $tienNghi = TienNghi::findOrFail($id);

        $tienNghi->delete();

        return redirect()
            ->route('admin.tiennghi.index')
            ->with(
                'success',
                'Xóa thành công'
            );
    }
}