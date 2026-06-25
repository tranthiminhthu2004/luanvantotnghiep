<?php

namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use App\Models\LoaiPhong;
use App\Models\HinhAnhLoaiPhong;
use Illuminate\Http\Request;

class AdminHinhAnhLoaiPhongController extends Controller
{
    public function index($id)
    {
        $loaiPhong = LoaiPhong::with('hinhAnh')
            ->findOrFail($id);

        return view(
            'admin.hinhanhloaiphong.index',
            compact('loaiPhong')
        );
    }

    public function store(
        Request $request,
        $id
    )
    {
       $request->validate([
    'anh' => 'required',
    'anh.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
], [
    'anh.required' => 'Vui lòng chọn ít nhất một ảnh.',
    'anh.*.image' => 'Tệp tải lên phải là hình ảnh.',
    'anh.*.mimes' => 'Ảnh chỉ được có định dạng jpg, jpeg, png hoặc webp.',
    'anh.*.max' => 'Mỗi ảnh không được vượt quá 2MB.',
]);

        foreach ($request->file('anh') as $file)
        {
            $tenAnh =
                time() . '_' . uniqid() . '_' .
                $file->getClientOriginalName();

            $file->move(
                public_path('images/loaiphong'),
                $tenAnh
            );

            HinhAnhLoaiPhong::create([

                'ma_loai_phong' => $id,

                'duong_dan_anh' =>
                    'images/loaiphong/' . $tenAnh

            ]);
        }

        return back()->with(
            'success',
            'Tải ảnh thành công'
        );
    }

    public function destroy($id)
    {
        $hinhAnh = HinhAnhLoaiPhong::findOrFail($id);

        $duongDan = public_path(
            $hinhAnh->duong_dan_anh
        );

        if (
            !empty($hinhAnh->duong_dan_anh)
            && file_exists($duongDan)
        )
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