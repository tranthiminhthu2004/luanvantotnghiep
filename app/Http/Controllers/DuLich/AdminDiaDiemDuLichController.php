<?php

namespace App\Http\Controllers\DuLich;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiaDiem;
use App\Models\DiaDiemDuLich;

class AdminDiaDiemDuLichController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $sapXep = $request->sap_xep ?? 'desc';

    $tongDiaDiemDuLich = DiaDiemDuLich::count();

    $diaDiemDuLichs = DiaDiemDuLich::with('diaDiem')
        ->orderBy(
            'ma_dia_diem_du_lich',
            $sapXep
        )
        ->paginate(10);
    $diaDiems = DiaDiem::orderBy('ten_dia_diem')->get();

    return view(
        'admin.diadiemdulich.index',
        compact(
            'diaDiemDuLichs',
            'tongDiaDiemDuLich',
            'diaDiems'
        )
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $diaDiems = DiaDiem::orderBy(
        'ten_dia_diem'
    )->get();

    return view(
        'admin.diadiemdulich.create',
        compact('diaDiems')
    );
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate(
        [
            'ma_dia_diem' => 'required|exists:dia_diem,ma_dia_diem',

            'ten_dia_diem' => 'required|string|max:255',

            'dia_chi' => 'nullable|max:191',

            'vi_do' => 'nullable|numeric|between:-90,90',

            'kinh_do' => 'nullable|numeric|between:-180,180',

            'mo_ta' => 'nullable'
        ],
        [
            'ma_dia_diem.required' => 'Vui lòng chọn địa điểm.',

            'ma_dia_diem.exists' => 'Địa điểm không tồn tại.',

            'ten_dia_diem.required' => 'Vui lòng nhập tên địa điểm du lịch.',

            'ten_dia_diem.max' => 'Tên địa điểm du lịch không được vượt quá 255 ký tự.',

            'dia_chi.max' => 'Địa chỉ không được vượt quá 191 ký tự.',

            'vi_do.numeric' => 'Vĩ độ phải là số.',

            'vi_do.between' => 'Vĩ độ phải nằm trong khoảng từ -90 đến 90.',

            'kinh_do.numeric' => 'Kinh độ phải là số.',

            'kinh_do.between' => 'Kinh độ phải nằm trong khoảng từ -180 đến 180.',
        ]
    );

    // Kiểm tra trùng tên địa điểm du lịch trong cùng một địa điểm
    $kiemTra = DiaDiemDuLich::where('ma_dia_diem', $request->ma_dia_diem)
        ->where('ten_dia_diem', $request->ten_dia_diem)
        ->exists();

    if ($kiemTra) {

        return back()
            ->withInput()
            ->withErrors([
                'ten_dia_diem' => 'Địa điểm du lịch này đã tồn tại trong địa điểm đã chọn.'
            ]);

    }

    DiaDiemDuLich::create([

        'ma_dia_diem' => $request->ma_dia_diem,

        'ten_dia_diem' => $request->ten_dia_diem,

        'dia_chi' => $request->dia_chi,

        'vi_do' => $request->vi_do,

        'kinh_do' => $request->kinh_do,

        'mo_ta' => $request->mo_ta

    ]);

    return redirect()
        ->route('admin.diadiemdulich.index')
        ->with(
            'success',
            'Thêm địa điểm du lịch thành công.'
        );
}

    public function show(string $id)
{
    $diaDiemDuLich = DiaDiemDuLich::with([
        'diaDiem',
        'hinhAnhs'
    ])->findOrFail($id);

    return view(
        'admin.diadiemdulich.show',
        compact('diaDiemDuLich')
    );
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $diaDiemDuLich = DiaDiemDuLich::findOrFail($id);

    $diaDiems = DiaDiem::orderBy(
        'ten_dia_diem'
    )->get();

    return view(
        'admin.diadiemdulich.edit',
        compact(
            'diaDiemDuLich',
            'diaDiems'
        )
    );
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $request->validate(
        [
            'ma_dia_diem' => 'required|exists:dia_diem,ma_dia_diem',

            'ten_dia_diem' => 'required|max:255',

            'dia_chi' => 'nullable|max:191',

            'vi_do' => 'nullable|numeric|between:-90,90',

            'kinh_do' => 'nullable|numeric|between:-180,180',

            'mo_ta' => 'nullable'
        ],
        [
            'ma_dia_diem.required' => 'Vui lòng chọn địa điểm.',

            'ma_dia_diem.exists' => 'Địa điểm không tồn tại.',

            'ten_dia_diem.required' => 'Vui lòng nhập tên địa điểm du lịch.',

            'ten_dia_diem.max' => 'Tên địa điểm du lịch không được vượt quá 255 ký tự.',

            'dia_chi.max' => 'Địa chỉ không được vượt quá 191 ký tự.',

            'vi_do.numeric' => 'Vĩ độ phải là số.',

            'vi_do.between' => 'Vĩ độ phải nằm trong khoảng từ -90 đến 90.',

            'kinh_do.numeric' => 'Kinh độ phải là số.',

            'kinh_do.between' => 'Kinh độ phải nằm trong khoảng từ -180 đến 180.'
        ]
    );

    $kiemTra = DiaDiemDuLich::where(
            'ma_dia_diem',
            $request->ma_dia_diem
        )
        ->where(
            'ten_dia_diem',
            $request->ten_dia_diem
        )
        ->where(
            'ma_dia_diem_du_lich',
            '!=',
            $id
        )
        ->exists();

    if ($kiemTra) {

        return back()
            ->withInput()
            ->withErrors([
                'ten_dia_diem' =>
                'Địa điểm du lịch này đã tồn tại trong địa điểm đã chọn.'
            ]);

    }

    $diaDiemDuLich = DiaDiemDuLich::findOrFail($id);

    $diaDiemDuLich->update([

        'ma_dia_diem' => $request->ma_dia_diem,

        'ten_dia_diem' => $request->ten_dia_diem,

        'dia_chi' => $request->dia_chi,

        'vi_do' => $request->vi_do,

        'kinh_do' => $request->kinh_do,

        'mo_ta' => $request->mo_ta

    ]);

    return redirect()
        ->route('admin.diadiemdulich.index')
        ->with(
            'success',
            'Cập nhật địa điểm du lịch thành công.'
        );
}
    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $diaDiemDuLich = DiaDiemDuLich::findOrFail($id);

    $diaDiemDuLich->delete();

    return redirect()
        ->route('admin.diadiemdulich.index')
        ->with(
            'success',
            'Xóa địa điểm du lịch thành công.'
        );
}
}