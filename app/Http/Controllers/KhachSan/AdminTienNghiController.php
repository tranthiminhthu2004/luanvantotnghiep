<?php

namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\TienNghi;

class AdminTienNghiController extends Controller
{
    public function index(Request $request)
    {
        $query = TienNghi::query();

        // Tìm kiếm tên tiện nghi
        if ($request->filled('ten_tien_nghi'))
        {
            $query->where(
                'ten_tien_nghi',
                'like',
                '%' . trim($request->ten_tien_nghi) . '%'
            );
        }

        // Lọc trạng thái
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
                'ma_tien_nghi',
                $request->sap_xep
            );
        }
        else
        {
            $query->orderByDesc('ma_tien_nghi');
        }

        $tienNghis = $query
            ->paginate(10)
            ->withQueryString();

        $tongTienNghi = TienNghi::count();

        $tienNghiHoatDong = TienNghi::where(
            'trang_thai',
            1
        )->count();

        $tienNghiTamDung = TienNghi::where(
            'trang_thai',
            0
        )->count();
$danhSachTienNghi = TienNghi::select(
    'ten_tien_nghi'
)
->distinct()
->orderBy('ten_tien_nghi')
->get();
        return view(
            'admin.tiennghi.index',
            compact(
                'tienNghis',
                'tongTienNghi',
                'tienNghiHoatDong',
                'tienNghiTamDung',
                'danhSachTienNghi'
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

            'ten_tien_nghi' => [

                'required',

                'max:100',

                Rule::unique(
                    'tien_nghi',
                    'ten_tien_nghi'
                ),

            ],

            'mo_ta' => 'nullable|max:255',

        ], [

            'ten_tien_nghi.required' =>
                'Vui lòng nhập tên tiện nghi.',

            'ten_tien_nghi.max' =>
                'Tên tiện nghi không được vượt quá 100 ký tự.',

            'ten_tien_nghi.unique' =>
                'Tiện nghi này đã tồn tại.',

            'mo_ta.max' =>
                'Mô tả không được vượt quá 255 ký tự.',

        ]);

        TienNghi::create([

            'ten_tien_nghi' =>
                $request->ten_tien_nghi,

            'mo_ta' =>
                $request->mo_ta,

            'icon' =>
                $request->icon,

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

            'ten_tien_nghi' => [

                'required',

                'max:100',

                Rule::unique(
                    'tien_nghi',
                    'ten_tien_nghi'
                )->ignore(
                    $id,
                    'ma_tien_nghi'
                ),

            ],

            'mo_ta' => 'nullable|max:255',

        ], [

            'ten_tien_nghi.required' =>
                'Vui lòng nhập tên tiện nghi.',

            'ten_tien_nghi.max' =>
                'Tên tiện nghi không được vượt quá 100 ký tự.',

            'ten_tien_nghi.unique' =>
                'Tiện nghi này đã tồn tại.',

            'mo_ta.max' =>
                'Mô tả không được vượt quá 255 ký tự.',

        ]);

        $tienNghi = TienNghi::findOrFail($id);

        $tienNghi->update([

            'ten_tien_nghi' =>
                $request->ten_tien_nghi,

            'mo_ta' =>
                $request->mo_ta,

            'icon' =>
                $request->icon,

            'trang_thai' =>
                $request->trang_thai,

        ]);

        return redirect()
            ->route('admin.tiennghi.index')
            ->with(
                'success',
                'Cập nhật tiện nghi thành công'
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
                'Xóa tiện nghi thành công'
            );
    }
}