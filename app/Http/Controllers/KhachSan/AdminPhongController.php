<?php

namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use App\Models\Phong;
use App\Models\LoaiPhong;
use App\Models\KhachSan;
use Illuminate\Http\Request;

class AdminPhongController extends Controller
{
public function index(Request $request)
{
    $query = Phong::with([
        'loaiPhong.khachSan'
    ]);

    // Lọc khách sạn
    if ($request->filled('ma_khach_san'))
    {
        $query->whereHas(
            'loaiPhong',
            function ($q) use ($request)
            {
                $q->where(
                    'ma_khach_san',
                    $request->ma_khach_san
                );
            }
        );
    }

    // Lọc loại phòng
    if ($request->filled('ma_loai_phong'))
    {
        $query->where(
            'ma_loai_phong',
            $request->ma_loai_phong
        );
    }

    // Lọc trạng thái
    if (
        $request->has('trang_thai_phong')
        && $request->trang_thai_phong !== ''
    )
    {
        $query->where(
            'trang_thai_phong',
            $request->trang_thai_phong
        );
    }

    // Tìm số phòng
    if ($request->filled('so_phong'))
    {
        $query->where(
            'so_phong',
            'like',
            '%' . $request->so_phong . '%'
        );
    }

    $phongs = $query
        ->orderByDesc('ma_phong')
        ->get();

    // Thống kê
    $tongPhong = Phong::count();

    $phongDangHoatDong = Phong::where(
        'trang_thai_phong',
        'DangHoatDong'
    )->count();

    $phongBaoTri = Phong::where(
        'trang_thai_phong',
        'BaoTri'
    )->count();

    $phongNgungHoatDong = Phong::where(
        'trang_thai_phong',
        'NgungHoatDong'
    )->count();

    // Dữ liệu bộ lọc
    $loaiPhongs = LoaiPhong::with(
        'khachSan'
    )->get();

    $khachSans = KhachSan::all();

    return view(
        'admin.phong.index',
        compact(
            'phongs',
            'tongPhong',
            'phongDangHoatDong',
            'phongBaoTri',
            'phongNgungHoatDong',
            'loaiPhongs',
            'khachSans'
        )
    );
}

   public function create()
{
    $loaiPhongs = LoaiPhong::with(
        'khachSan'
    )->get();

    return view(
        'admin.phong.create',
        compact('loaiPhongs')
    );
}

public function store(Request $request)
{
    $request->validate([

        'ma_loai_phong' => 'required',

        'so_phong' => 'required|max:20',

        'trang_thai_phong' => 'required'

    ]);

    Phong::create([

        'ma_loai_phong' => $request->ma_loai_phong,

        'so_phong' => $request->so_phong,

        'tang' => $request->tang,

        'trang_thai_phong' => $request->trang_thai_phong

    ]);

    return redirect()
        ->route('admin.phong.index')
        ->with(
            'success',
            'Thêm phòng thành công'
        );
}

public function show($id)
{
    $phong = Phong::with([
        'loaiPhong.khachSan'
    ])->findOrFail($id);

    return view(
        'admin.phong.show',
        compact('phong')
    );
}

public function edit($id)
{
    $phong = Phong::findOrFail($id);

    $loaiPhongs = LoaiPhong::with(
        'khachSan'
    )->get();

    return view(
        'admin.phong.edit',
        compact(
            'phong',
            'loaiPhongs'
        )
    );
}

public function update(
    Request $request,
    $id
)
{
    $request->validate([

        'ma_loai_phong' => 'required',

        'so_phong' => 'required|max:20',

        'trang_thai_phong' => 'required'

    ]);

    $phong = Phong::findOrFail($id);

    $phong->update([

        'ma_loai_phong' => $request->ma_loai_phong,

        'so_phong' => $request->so_phong,

        'tang' => $request->tang,

        'trang_thai_phong' => $request->trang_thai_phong

    ]);

    return redirect()
        ->route('admin.phong.index')
        ->with(
            'success',
            'Cập nhật phòng thành công'
        );
}

public function destroy($id)
{
    $phong = Phong::findOrFail($id);

    $phong->delete();

    return redirect()
        ->route('admin.phong.index')
        ->with(
            'success',
            'Xóa phòng thành công'
        );
}
}