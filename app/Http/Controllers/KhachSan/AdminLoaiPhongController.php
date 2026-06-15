<?php

namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use App\Models\LoaiPhong;
use App\Models\KhachSan;
use Illuminate\Http\Request;

class AdminLoaiPhongController extends Controller
{
 public function index(Request $request)
{
    $query = LoaiPhong::with('khachSan');

    // Tìm kiếm theo tên loại phòng
    if ($request->filled('ten_loai_phong'))
    {
        $query->where(
            'ten_loai_phong',
            'like',
            '%' . trim($request->ten_loai_phong) . '%'
        );
    }

    // Lọc theo khách sạn
    if ($request->filled('ma_khach_san'))
    {
        $query->where(
            'ma_khach_san',
            $request->ma_khach_san
        );
    }

    // Lọc theo trạng thái
    if (
        $request->has('trang_thai')
        && $request->trang_thai !== ''
    )
    {
        $query->where(
            'trang_thai',
            $request->trang_thai
        );
    }

    // Sắp xếp
    if ($request->filled('sap_xep'))
    {
        $query->orderBy(
            'ma_loai_phong',
            $request->sap_xep
        );
    }
    else
    {
        $query->orderBy(
            'ma_loai_phong',
            'desc'
        );
    }

    $loaiPhongs = $query->get();

    // Thống kê
    $tongLoaiPhong = LoaiPhong::count();

    $dangHoatDong = LoaiPhong::where(
        'trang_thai',
        1
    )->count();

    $tamDung = LoaiPhong::where(
        'trang_thai',
        0
    )->count();

    $khachSans = KhachSan::all();

    return view(
        'admin.loaiphong.index',
        compact(
            'loaiPhongs',
            'tongLoaiPhong',
            'dangHoatDong',
            'tamDung',
            'khachSans'
        )
    );
}
    public function create()
{
    $khachSans = KhachSan::all();

    return view(
        'admin.loaiphong.create',
        compact('khachSans')
    );
}
public function store(Request $request)
{
    $request->validate([

        'ma_khach_san' => 'required',

        'ten_loai_phong' => 'required|max:191',

        'so_nguoi_toi_da' => 'required|integer|min:1',

        'gia_co_ban' => 'required|numeric|min:0',

    ]);

    LoaiPhong::create([

        'ma_khach_san' => $request->ma_khach_san,

        'ten_loai_phong' => $request->ten_loai_phong,

        'mo_ta' => $request->mo_ta,

        'so_nguoi_toi_da' => $request->so_nguoi_toi_da,

        'dien_tich' => $request->dien_tich,

        'so_giuong' => $request->so_giuong,

        'gia_co_ban' => $request->gia_co_ban,

        'trang_thai' => $request->trang_thai

    ]);

    return redirect()
        ->route('admin.loaiphong.index')
        ->with(
            'success',
            'Thêm loại phòng thành công'
        );
}
public function edit($id)
{
    $loaiPhong = LoaiPhong::findOrFail($id);

    $khachSans = KhachSan::all();

    return view(
        'admin.loaiphong.edit',
        compact(
            'loaiPhong',
            'khachSans'
        )
    );
}
public function update(
    Request $request,
    $id
)
{
    $request->validate([

        'ma_khach_san' => 'required',

        'ten_loai_phong' => 'required|max:191',

        'so_nguoi_toi_da' => 'required|integer|min:1',

        'gia_co_ban' => 'required|numeric|min:0',

    ]);

    $loaiPhong =
        LoaiPhong::findOrFail($id);

    $loaiPhong->update([

        'ma_khach_san' => $request->ma_khach_san,

        'ten_loai_phong' => $request->ten_loai_phong,

        'mo_ta' => $request->mo_ta,

        'so_nguoi_toi_da' => $request->so_nguoi_toi_da,

        'dien_tich' => $request->dien_tich,

        'so_giuong' => $request->so_giuong,

        'gia_co_ban' => $request->gia_co_ban,

        'trang_thai' => $request->trang_thai

    ]);

    return redirect()
        ->route('admin.loaiphong.index')
        ->with(
            'success',
            'Cập nhật loại phòng thành công'
        );
}
public function show($id)
{
    $loaiPhong = LoaiPhong::with('khachSan')
        ->findOrFail($id);

    return view(
        'admin.loaiphong.show',
        compact('loaiPhong')
    );
}
public function destroy($id)
{
    $loaiPhong = LoaiPhong::findOrFail($id);

    $loaiPhong->delete();

    return redirect()
        ->route('admin.loaiphong.index')
        ->with(
            'success',
            'Xóa loại phòng thành công'
        );
}
}