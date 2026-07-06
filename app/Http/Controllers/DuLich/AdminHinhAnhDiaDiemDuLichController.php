<?php

namespace App\Http\Controllers\DuLich;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiaDiemDuLich;
use App\Models\HinhAnhDiaDiemDuLich;
use Illuminate\Support\Facades\File;

class AdminHinhAnhDiaDiemDuLichController extends Controller
{
    public function index(string $id)
    {
        $diaDiemDuLich = DiaDiemDuLich::with('hinhAnhs')
            ->findOrFail($id);

        return view(
            'admin.hinhanhdiadiemdulich.index',
            compact('diaDiemDuLich')
        );
    }

    public function store(Request $request, string $id)
    {
        $request->validate(
            [
                'hinh_anh' => 'required|array|min:1',
                'hinh_anh.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            ],
            [
                'hinh_anh.required' => 'Vui lòng chọn ít nhất một hình ảnh.',
                'hinh_anh.array' => 'Dữ liệu hình ảnh không hợp lệ.',
                'hinh_anh.min' => 'Vui lòng chọn ít nhất một hình ảnh.',

                'hinh_anh.*.required' => 'Vui lòng chọn hình ảnh.',
                'hinh_anh.*.image' => 'Tệp tải lên phải là hình ảnh.',
                'hinh_anh.*.mimes' => 'Chỉ chấp nhận JPG, JPEG, PNG hoặc WEBP.',
                'hinh_anh.*.max' => 'Mỗi hình ảnh không được vượt quá 2MB.',
            ]
        );

        $diaDiemDuLich = DiaDiemDuLich::with('hinhAnhs')
            ->findOrFail($id);

        $soAnhHienTai = $diaDiemDuLich->hinhAnhs->count();

        $soAnhMoi = count($request->file('hinh_anh'));

        if (($soAnhHienTai + $soAnhMoi) > 5) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Mỗi địa điểm du lịch chỉ được tối đa 5 hình ảnh.'
                );
        }

        $thuMucLuuAnh = public_path('images/diadiemdulich');

        if (!File::exists($thuMucLuuAnh)) {
            File::makeDirectory(
                $thuMucLuuAnh,
                0755,
                true
            );
        }

        foreach ($request->file('hinh_anh') as $file) {
            $tenAnh =
                time() . '_' .
                uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                $thuMucLuuAnh,
                $tenAnh
            );

            HinhAnhDiaDiemDuLich::create([
                'ma_dia_diem_du_lich' => $id,
                'duong_dan_anh' => 'images/diadiemdulich/' . $tenAnh
            ]);
        }

        return redirect()
            ->route('admin.hinhanhdiadiemdulich.index', $id)
            ->with(
                'success',
                'Thêm hình ảnh thành công.'
            );
    }

    public function destroy(string $id)
    {
        $hinhAnh = HinhAnhDiaDiemDuLich::findOrFail($id);

        $maDiaDiem = $hinhAnh->ma_dia_diem_du_lich;

        if (
            $hinhAnh->duong_dan_anh &&
            File::exists(public_path($hinhAnh->duong_dan_anh))
        ) {
            File::delete(public_path($hinhAnh->duong_dan_anh));
        }

        $hinhAnh->delete();

        return redirect()
            ->route('admin.hinhanhdiadiemdulich.index', $maDiaDiem)
            ->with(
                'success',
                'Xóa hình ảnh thành công.'
            );
    }
}