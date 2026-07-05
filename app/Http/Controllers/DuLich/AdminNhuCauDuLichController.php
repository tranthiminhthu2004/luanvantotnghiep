<?php

namespace App\Http\Controllers\DuLich;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NhuCauDuLich;

class AdminNhuCauDuLichController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
{
    $sapXep = $request->sap_xep ?? 'desc';

    $nhuCaus = NhuCauDuLich::withCount('diaDiems')
    ->orderBy('ma_nhu_cau', $sapXep)
    ->paginate(10);
    $tongNhuCau = NhuCauDuLich::count();

    return view(
        'admin.nhucaudulich.index',
        compact(
            'nhuCaus',
            'tongNhuCau'
        )
    );
}
    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    return view('admin.nhucaudulich.create');
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate(
        [
            'ten_nhu_cau' => 'required|string|max:255|unique:nhu_cau_du_lich,ten_nhu_cau',
            'mo_ta' => 'nullable|string',
        ],
        [
            'ten_nhu_cau.required' => 'Vui lòng nhập tên nhu cầu.',
            'ten_nhu_cau.unique' => 'Tên nhu cầu đã tồn tại.',
            'ten_nhu_cau.max' => 'Tên nhu cầu không được vượt quá 255 ký tự.',
            'mo_ta.string' => 'Mô tả không hợp lệ.',
        ]
    );

    NhuCauDuLich::create([
        'ten_nhu_cau' => $request->ten_nhu_cau,
        'mo_ta' => $request->mo_ta,
    ]);

    return redirect()
        ->route('admin.nhucaudulich.index')
        ->with('success', 'Thêm nhu cầu du lịch thành công.');
}

    public function edit(string $id)
{
    $nhuCau = NhuCauDuLich::findOrFail($id);

    return view(
        'admin.nhucaudulich.edit',
        compact('nhuCau')
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate(
        [
            'ten_nhu_cau' => 'required|string|max:255|unique:nhu_cau_du_lich,ten_nhu_cau,' . $id . ',ma_nhu_cau',

            'mo_ta' => 'nullable|string',
        ],
        [
            'ten_nhu_cau.required' => 'Vui lòng nhập tên nhu cầu.',

            'ten_nhu_cau.unique' => 'Tên nhu cầu đã tồn tại.',

            'ten_nhu_cau.max' => 'Tên nhu cầu không được vượt quá 255 ký tự.',

            'mo_ta.string' => 'Mô tả không hợp lệ.',
        ]
    );

    $nhuCau = NhuCauDuLich::findOrFail($id);

    $nhuCau->update([

        'ten_nhu_cau' => $request->ten_nhu_cau,

        'mo_ta' => $request->mo_ta,

    ]);

    return redirect()
        ->route('admin.nhucaudulich.index')
        ->with(
            'success',
            'Cập nhật nhu cầu du lịch thành công.'
        );
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $nhuCau = NhuCauDuLich::withCount('diaDiems')
        ->findOrFail($id);

    if ($nhuCau->dia_diems_count > 0) {

        return redirect()
            ->route('admin.nhucaudulich.index')
            ->with(
                'error',
                'Không thể xóa vì nhu cầu này đang được sử dụng.'
            );

    }

    $nhuCau->delete();

    return redirect()
        ->route('admin.nhucaudulich.index')
        ->with(
            'success',
            'Xóa nhu cầu du lịch thành công.'
        );
}
public function show(string $id)
{
    $nhuCau = NhuCauDuLich::with('diaDiems')
        ->withCount('diaDiems')
        ->findOrFail($id);

    return view(
        'admin.nhucaudulich.show',
        compact('nhuCau')
    );
}
}