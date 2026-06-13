<?php

namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use App\Models\KhachSan;
use App\Models\HinhAnhKhachSan;
use Illuminate\Http\Request;

class AdminHinhAnhKhachSanController extends Controller
{
    public function index($id)
    {
        $khachSan = KhachSan::findOrFail($id);

        return view(
            'admin.hinhanhkhachsan.index',
            compact('khachSan')
        );
    }

    public function store(Request $request,$id)
    {
        $request->validate([
            'anh.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if($request->hasFile('anh'))
        {
            foreach($request->file('anh') as $file)
            {
                $tenAnh = time().'_'.$file->getClientOriginalName();

                $file->move(
                    public_path('images/khachsan'),
                    $tenAnh
                );

                HinhAnhKhachSan::create([
                    'ma_khach_san' => $id,
                    'duong_dan_anh' =>
                        'images/khachsan/'.$tenAnh
                ]);
            }
        }

        return back()->with(
            'success',
            'Thêm ảnh thành công'
        );
    }

    public function destroy($id)
    {
        $hinhAnh = HinhAnhKhachSan::findOrFail($id);

        $duongDan = public_path(
            $hinhAnh->duong_dan_anh
        );

        if(file_exists($duongDan))
        {
            unlink($duongDan);
        }

        $hinhAnh->delete();

        return back()->with(
            'success',
            'Xóa ảnh thành công'
        );
    }
}