<?php

namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use App\Models\DiaDiem;
use Illuminate\Http\Request;

class AdminDiaDiemController extends Controller
{
    public function index()
    {
        $sapXep = request(
            'sap_xep',
            'desc'
        );

        $diaDiems = DiaDiem::orderBy(
            'ma_dia_diem',
            $sapXep
        )
            ->paginate(10)
            ->withQueryString();

        $tongDiaDiem = DiaDiem::count();

        return view(
            'admin.diadiem.index',
            compact(
                'diaDiems',
                'tongDiaDiem'
            )
        );
    }

    public function create()
    {
        return view(
            'admin.diadiem.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'ten_dia_diem' => 'required|max:150|unique:dia_diem,ten_dia_diem',

                'mo_ta' => 'nullable|string',
            ],
            [
                'ten_dia_diem.required' => 'Vui lòng nhập tên địa điểm.',

                'ten_dia_diem.max' => 'Tên địa điểm không được vượt quá 150 ký tự.',

                'ten_dia_diem.unique' => 'Địa điểm này đã tồn tại.',

                'mo_ta.string' => 'Mô tả không hợp lệ.',
            ]
        );

        DiaDiem::create([

            'ten_dia_diem' => trim($request->ten_dia_diem),

            'mo_ta' => $request->mo_ta,

        ]);

        return redirect()
            ->route('admin.diadiem.index')
            ->with(
                'success',
                'Thêm địa điểm thành công'
            );
    }

    public function show($id)
    {
        $diaDiem = DiaDiem::findOrFail($id);

        return view(
            'admin.diadiem.show',
            compact('diaDiem')
        );
    }

    public function edit($id)
    {
        $diaDiem = DiaDiem::findOrFail($id);

        return view(
            'admin.diadiem.edit',
            compact('diaDiem')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'ten_dia_diem' => 'required|max:150|unique:dia_diem,ten_dia_diem,' . $id . ',ma_dia_diem',

                'mo_ta' => 'nullable|string',
            ],
            [
                'ten_dia_diem.required' => 'Vui lòng nhập tên địa điểm.',

                'ten_dia_diem.max' => 'Tên địa điểm không được vượt quá 150 ký tự.',

                'ten_dia_diem.unique' => 'Địa điểm này đã tồn tại.',

                'mo_ta.string' => 'Mô tả không hợp lệ.',
            ]
        );

        $diaDiem = DiaDiem::findOrFail($id);

        $diaDiem->update([

            'ten_dia_diem' => trim($request->ten_dia_diem),

            'mo_ta' => $request->mo_ta,

        ]);

        return redirect()
            ->route('admin.diadiem.index')
            ->with(
                'success',
                'Cập nhật địa điểm thành công'
            );
    }

    public function destroy($id)
    {
        $diaDiem = DiaDiem::withCount([
            'diaDiemDuLichs',
            'khachSans',
            'nhuCaus'
        ])->findOrFail($id);

        if (
            $diaDiem->dia_diem_du_lichs_count > 0 ||
            $diaDiem->khach_sans_count > 0 ||
            $diaDiem->nhu_caus_count > 0
        ) {
            return redirect()
                ->route('admin.diadiem.index')
                ->with(
                    'error',
                    'Không thể xóa vì địa điểm này đang được sử dụng.'
                );
        }

        $diaDiem->delete();

        return redirect()
            ->route('admin.diadiem.index')
            ->with(
                'success',
                'Xóa địa điểm thành công'
            );
    }
}