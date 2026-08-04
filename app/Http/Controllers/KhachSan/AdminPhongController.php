<?php
namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use App\Models\Phong;
use App\Models\LoaiPhong;
use App\Models\KhachSan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPhongController extends Controller
{
    public function index(Request $request)
    {
        $query = Phong::with([
            'loaiPhong.khachSan'
        ]);
        $query->whereHas('loaiPhong.khachSan', function ($q) {
    $q->where('trang_thai_duyet', 'DaDuyet');
});

        // Lọc khách sạn
        if ($request->filled('ten_khach_san'))
{
    $query->whereHas('loaiPhong.khachSan', function ($q) use ($request)
    {
        $q->where(
            'ten_khach_san',
            'like',
            '%' . trim($request->ten_khach_san) . '%'
        );
    });
}

       // Lọc loại phòng
if ($request->filled('ten_loai_phong'))
{
    $query->whereHas('loaiPhong', function ($q) use ($request)
    {
        $q->where(
            'ten_loai_phong',
            $request->ten_loai_phong
        );
    });
}
        // Lọc trạng thái
        if ($request->filled('trang_thai_phong'))
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
                '%' . trim($request->so_phong) . '%'
            );
        }

        // Sắp xếp
        if ($request->filled('sap_xep'))
        {
            $query->orderBy(
                'ma_phong',
                $request->sap_xep
            );
        }
        else
        {
            $query->orderBy(
                'ma_phong',
                'desc'
            );
        }

        $phongs = $query
            ->paginate(10)
            ->withQueryString();

        // Thống kê
        $tongPhong = Phong::whereHas('loaiPhong.khachSan', function ($q) {
        $q->where('trang_thai_duyet', 'DaDuyet');
        })->count();

        $phongDangHoatDong = Phong::where(
        'trang_thai_phong',
        'DangHoatDong'
        )
        ->whereHas('loaiPhong.khachSan', function ($q) {
        $q->where('trang_thai_duyet', 'DaDuyet');
        })
        ->count();
    
        $phongBaoTri = Phong::where(
        'trang_thai_phong',
        'BaoTri'
        )
        ->whereHas('loaiPhong.khachSan', function ($q) {
        $q->where('trang_thai_duyet', 'DaDuyet');
        })
        ->count();

        $phongNgungHoatDong = Phong::where(
        'trang_thai_phong',
        'NgungHoatDong'
    )
    ->whereHas('loaiPhong.khachSan', function ($q) {
        $q->where('trang_thai_duyet', 'DaDuyet');
    })
    ->count();
 
    $loaiPhongs = LoaiPhong::select(
        'ten_loai_phong'
    )
    ->distinct()
    ->orderBy('ten_loai_phong')
    ->get();

        $khachSans = KhachSan::all();
$danhSachSoPhong = Phong::select('so_phong')
    ->distinct()
    ->orderBy('so_phong')
    ->get();
        return view(
            'admin.phong.index',
            compact(
                'phongs',
                'tongPhong',
                'phongDangHoatDong',
                'phongBaoTri',
                'phongNgungHoatDong',
                'loaiPhongs',
                'danhSachSoPhong'
            )
        );
    }

    public function create()
    {
        $loaiPhongs = LoaiPhong::with('khachSan')
    ->whereHas('khachSan', function ($q) {
        $q->where('trang_thai_duyet', 'DaDuyet');
    })
    ->get();

        return view(
            'admin.phong.create',
            compact('loaiPhongs')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'ma_loai_phong' => 'required',

            'so_phong' => [

                'required',
                'max:20',

                Rule::unique('phong')
                    ->where(function ($query) use ($request) {

                        $maKhachSan = LoaiPhong::find(
                            $request->ma_loai_phong
                        )->ma_khach_san;

                        $dsLoaiPhong = LoaiPhong::where(
                            'ma_khach_san',
                            $maKhachSan
                        )->pluck('ma_loai_phong');

                        return $query->whereIn(
                            'ma_loai_phong',
                            $dsLoaiPhong
                        );

                    }),

            ],

            'tang' => 'required|integer|min:1',

            'trang_thai_phong' => 'required',

        ], [

            'so_phong.required' => 'Vui lòng nhập số phòng.',

            'so_phong.unique' => 'Số phòng này đã tồn tại trong khách sạn.',

            'tang.required' => 'Vui lòng nhập tầng.',

            'tang.integer' => 'Tầng phải là số nguyên.',

            'tang.min' => 'Tầng phải lớn hơn hoặc bằng 1.',

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

        $loaiPhongs = LoaiPhong::with('khachSan')
    ->whereHas('khachSan', function ($q) {
        $q->where('trang_thai_duyet', 'DaDuyet');
    })
    ->get();

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

            'so_phong' => [

                'required',
                'max:20',

                Rule::unique('phong')
                    ->ignore(
                        $id,
                        'ma_phong'
                    )
                    ->where(function ($query) use ($request) {

                        $maKhachSan = LoaiPhong::find(
                            $request->ma_loai_phong
                        )->ma_khach_san;

                        $dsLoaiPhong = LoaiPhong::where(
                            'ma_khach_san',
                            $maKhachSan
                        )->pluck('ma_loai_phong');

                        return $query->whereIn(
                            'ma_loai_phong',
                            $dsLoaiPhong
                        );

                    }),

            ],

            'tang' => 'required|integer|min:1',

            'trang_thai_phong' => 'required',

        ], [

            'so_phong.required' => 'Vui lòng nhập số phòng.',

            'so_phong.unique' => 'Số phòng này đã tồn tại trong khách sạn.',

            'tang.required' => 'Vui lòng nhập tầng.',

            'tang.integer' => 'Tầng phải là số nguyên.',

            'tang.min' => 'Tầng phải lớn hơn hoặc bằng 1.',

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