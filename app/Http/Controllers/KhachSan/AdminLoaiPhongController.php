<?php

namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use App\Models\LoaiPhong;
use App\Models\KhachSan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ChiTietDatPhong;
use App\Models\DatPhong;
use Carbon\Carbon;

class AdminLoaiPhongController extends Controller
{
 public function index(Request $request)
{
    $query = LoaiPhong::with('khachSan');

    $query->whereHas('khachSan', function ($q) {
    $q->where('trang_thai_duyet', 'DaDuyet');
});

    // Tìm kiếm theo tên loại phòng
   if ($request->filled('ten_loai_phong'))
{
    $query->where(
        'ten_loai_phong',
        $request->ten_loai_phong
    );
}

    // Tìm theo tên khách sạn
if ($request->filled('ten_khach_san'))
{
    $query->whereHas('khachSan', function ($q) use ($request)
    {
        $q->where(
            'ten_khach_san',
            'like',
            '%' . trim($request->ten_khach_san) . '%'
        );
    });
}

    // Lọc theo trạng thái
   if ($request->filled('trang_thai'))
{
    $query->where(
        'trang_thai',
        (int) $request->trang_thai
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

  $loaiPhongs = $query
    ->paginate(10)
    ->withQueryString();

    // Thống kê
   $tongLoaiPhong = LoaiPhong::whereHas('khachSan', function ($q) {
    $q->where('trang_thai_duyet', 'DaDuyet');
})
->select('ten_loai_phong')
->distinct()
->count();

$dangHoatDong = LoaiPhong::where('trang_thai', 1)
    ->whereHas('khachSan', function ($q) {
        $q->where('trang_thai_duyet', 'DaDuyet');
    })
    ->select('ten_loai_phong')
    ->distinct()
    ->count();

$tamDung = LoaiPhong::where('trang_thai', 0)
    ->whereHas('khachSan', function ($q) {
        $q->where('trang_thai_duyet', 'DaDuyet');
    })
    ->select('ten_loai_phong')
    ->distinct()
    ->count();
    
    $khachSans = KhachSan::where(
    'trang_thai_duyet',
    'DaDuyet'
)->get();
    
$danhSachLoaiPhong = LoaiPhong::whereHas('khachSan', function ($q) {
        $q->where('trang_thai_duyet', 'DaDuyet');
    })
    ->select('ten_loai_phong')
    ->distinct()
    ->orderBy('ten_loai_phong')
    ->get();
    
    return view(
        'admin.loaiphong.index',
        compact(
            'loaiPhongs',
            'tongLoaiPhong',
            'dangHoatDong',
            'tamDung',
            'danhSachLoaiPhong'
        )
    );
}
    public function create()
{
    $khachSans = KhachSan::where(
        'trang_thai_duyet',
        'DaDuyet'
    )->get();

    return view(
        'admin.loaiphong.create',
        compact('khachSans')
    );
}
public function store(Request $request)
{
   $request->validate([

    'ten_loai_phong' => [
        'required',
        'max:191',
        Rule::unique('loai_phong')
            ->where(function ($query) use ($request) {
                return $query->where(
                    'ma_khach_san',
                    $request->ma_khach_san
                );
            }),
    ],

    'so_nguoi_toi_da' => 'required|integer|min:1',

    'dien_tich' => 'required|numeric|min:1',

    'so_giuong' => 'required|integer|min:1',

    'gia_co_ban' => 'required|numeric|min:0',

], [

    'ten_loai_phong.required' => 'Vui lòng nhập tên loại phòng.',
    'ten_loai_phong.max' => 'Tên loại phòng không được vượt quá 191 ký tự.',
    'ten_loai_phong.unique' => 'Loại phòng này đã tồn tại trong khách sạn.',

    'so_nguoi_toi_da.required' => 'Vui lòng nhập số người tối đa.',
    'so_nguoi_toi_da.integer' => 'Số người tối đa phải là số nguyên.',
    'so_nguoi_toi_da.min' => 'Số người tối đa phải lớn hơn 0.',

    'dien_tich.required' => 'Vui lòng nhập diện tích.',
    'dien_tich.numeric' => 'Diện tích phải là số.',
    'dien_tich.min' => 'Diện tích phải lớn hơn 0.',

    'so_giuong.required' => 'Vui lòng nhập số giường.',
    'so_giuong.integer' => 'Số giường phải là số nguyên.',
    'so_giuong.min' => 'Số giường phải lớn hơn 0.',

    'gia_co_ban.required' => 'Vui lòng nhập giá cơ bản.',
    'gia_co_ban.numeric' => 'Giá cơ bản phải là số.',
    'gia_co_ban.min' => 'Giá cơ bản không được nhỏ hơn 0.',

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
public function update(Request $request, $id)
{
    $loaiPhong = LoaiPhong::findOrFail($id);
    // Kiểm tra trước khi tạm dừng loại phòng
if (
    $loaiPhong->trang_thai == 1 &&
    $request->trang_thai == 0
) {

    $conDonDatPhong = ChiTietDatPhong::where(
        'ma_loai_phong',
        $loaiPhong->ma_loai_phong
    )
    ->whereHas('datPhong', function ($query) {

        $query->whereIn(
            'trang_thai_dat_phong',
            [
                'DaXacNhan',
                'DaNhanPhong'
            ]
        )
        ->whereDate(
            'ngay_tra_phong',
            '>=',
            Carbon::today()
        );

    })
    ->exists();

    if ($conDonDatPhong) {

        return back()
            ->withInput()
            ->with(
                'error',
                'Không thể tạm dừng loại phòng vì vẫn còn đơn đặt phòng chưa hoàn thành.'
            );
    }
}

    $request->validate([

        'ten_loai_phong' => [

            'required',

            'max:191',

            Rule::unique('loai_phong')
                ->ignore(
                    $loaiPhong->ma_loai_phong,
                    'ma_loai_phong'
                )
                ->where(function ($query) use ($request) {
                    return $query->where(
                        'ma_khach_san',
                        $request->ma_khach_san
                    );
                }),

        ],

        'so_nguoi_toi_da' => 'required|integer|min:1',

        'dien_tich' => 'nullable|numeric|min:1',

        'so_giuong' => 'nullable|integer|min:1',

        'gia_co_ban' => 'required|numeric|min:0',

    ], [

        'ten_loai_phong.required' => 'Vui lòng nhập tên loại phòng.',

        'ten_loai_phong.unique' => 'Loại phòng này đã tồn tại trong khách sạn.',

        'so_nguoi_toi_da.required' => 'Vui lòng nhập số người tối đa.',

        'so_nguoi_toi_da.integer' => 'Số người tối đa phải là số nguyên.',

        'so_nguoi_toi_da.min' => 'Số người tối đa phải lớn hơn hoặc bằng 1.',

        'dien_tich.numeric' => 'Diện tích phải là số.',

        'dien_tich.min' => 'Diện tích phải lớn hơn hoặc bằng 1.',

        'so_giuong.integer' => 'Số giường phải là số nguyên.',

        'so_giuong.min' => 'Số giường phải lớn hơn hoặc bằng 1.',

        'gia_co_ban.required' => 'Vui lòng nhập giá cơ bản.',

        'gia_co_ban.numeric' => 'Giá cơ bản phải là số.',

        'gia_co_ban.min' => 'Giá cơ bản phải lớn hơn hoặc bằng 0.',

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