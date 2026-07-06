<?php

namespace App\Http\Controllers\DuLich;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiaDiem;
use App\Models\NhuCauDuLich;
use Illuminate\Support\Facades\DB;

class AdminDiaDiemNhuCauDuLichController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('dia_diem_nhu_cau_du_lich')
            ->join(
                'dia_diem',
                'dia_diem_nhu_cau_du_lich.ma_dia_diem',
                '=',
                'dia_diem.ma_dia_diem'
            )
            ->join(
                'nhu_cau_du_lich',
                'dia_diem_nhu_cau_du_lich.ma_nhu_cau',
                '=',
                'nhu_cau_du_lich.ma_nhu_cau'
            )
            ->select(
                'dia_diem_nhu_cau_du_lich.ma_dia_diem',
                'dia_diem_nhu_cau_du_lich.ma_nhu_cau',
                'dia_diem_nhu_cau_du_lich.muc_do_phu_hop',
                'dia_diem.ten_dia_diem',
                'nhu_cau_du_lich.ten_nhu_cau'
            );

        if ($request->filled('ma_dia_diem')) {
            $query->where(
                'dia_diem_nhu_cau_du_lich.ma_dia_diem',
                $request->ma_dia_diem
            );
        }

        if ($request->filled('ma_nhu_cau')) {
            $query->where(
                'dia_diem_nhu_cau_du_lich.ma_nhu_cau',
                $request->ma_nhu_cau
            );
        }

        $sapXep = $request->sap_xep === 'asc' ? 'asc' : 'desc';

        $duLieuGoiY = $query
            ->orderBy(
                'dia_diem_nhu_cau_du_lich.ma_dia_diem',
                $sapXep
            )
            ->paginate(10)
            ->withQueryString();

        $diaDiems = DiaDiem::orderBy('ten_dia_diem')->get();

        $nhuCaus = NhuCauDuLich::orderBy('ten_nhu_cau')->get();

        return view(
            'admin.diadiemnhucau.index',
            compact(
                'duLieuGoiY',
                'diaDiems',
                'nhuCaus'
            )
        );
    }

    public function create()
    {
        $diaDiems = DiaDiem::orderBy('ten_dia_diem')->get();

        $nhuCaus = NhuCauDuLich::orderBy('ten_nhu_cau')->get();

        return view(
            'admin.diadiemnhucau.create',
            compact(
                'diaDiems',
                'nhuCaus'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'ma_dia_diem' => 'required|exists:dia_diem,ma_dia_diem',
                'ma_nhu_cau' => 'required|exists:nhu_cau_du_lich,ma_nhu_cau',
                'muc_do_phu_hop' => 'required|integer|min:1|max:5',
            ],
            [
                'ma_dia_diem.required' => 'Vui lòng chọn điểm đến.',
                'ma_dia_diem.exists' => 'Điểm đến không tồn tại.',

                'ma_nhu_cau.required' => 'Vui lòng chọn nhu cầu du lịch.',
                'ma_nhu_cau.exists' => 'Nhu cầu du lịch không tồn tại.',

                'muc_do_phu_hop.required' => 'Vui lòng chọn mức độ phù hợp.',
                'muc_do_phu_hop.integer' => 'Mức độ phù hợp phải là số nguyên.',
                'muc_do_phu_hop.min' => 'Mức độ phù hợp phải từ 1 đến 5.',
                'muc_do_phu_hop.max' => 'Mức độ phù hợp phải từ 1 đến 5.',
            ]
        );

        $daTonTai = DB::table('dia_diem_nhu_cau_du_lich')
            ->where('ma_dia_diem', $request->ma_dia_diem)
            ->where('ma_nhu_cau', $request->ma_nhu_cau)
            ->exists();

        if ($daTonTai) {
            return back()
                ->withInput()
                ->withErrors([
                    'ma_nhu_cau' => 'Nhu cầu này đã được gắn cho điểm đến đã chọn.'
                ]);
        }

        DB::table('dia_diem_nhu_cau_du_lich')->insert([
            'ma_dia_diem' => $request->ma_dia_diem,
            'ma_nhu_cau' => $request->ma_nhu_cau,
            'muc_do_phu_hop' => $request->muc_do_phu_hop,
        ]);

        return redirect()
            ->route('admin.diadiemnhucau.index')
            ->with(
                'success',
                'Thêm dữ liệu gợi ý điểm đến thành công.'
            );
    }

    public function edit($maDiaDiem, $maNhuCau)
    {
        $duLieu = DB::table('dia_diem_nhu_cau_du_lich')
            ->where('ma_dia_diem', $maDiaDiem)
            ->where('ma_nhu_cau', $maNhuCau)
            ->first();

        if (!$duLieu) {
            abort(404);
        }

        $diaDiem = DiaDiem::findOrFail($maDiaDiem);

        $nhuCau = NhuCauDuLich::findOrFail($maNhuCau);

        return view(
            'admin.diadiemnhucau.edit',
            compact(
                'duLieu',
                'diaDiem',
                'nhuCau'
            )
        );
    }

    public function update(Request $request, $maDiaDiem, $maNhuCau)
    {
        $request->validate(
            [
                'muc_do_phu_hop' => 'required|integer|min:1|max:5',
            ],
            [
                'muc_do_phu_hop.required' => 'Vui lòng chọn mức độ phù hợp.',
                'muc_do_phu_hop.integer' => 'Mức độ phù hợp phải là số nguyên.',
                'muc_do_phu_hop.min' => 'Mức độ phù hợp phải từ 1 đến 5.',
                'muc_do_phu_hop.max' => 'Mức độ phù hợp phải từ 1 đến 5.',
            ]
        );

        DB::table('dia_diem_nhu_cau_du_lich')
            ->where('ma_dia_diem', $maDiaDiem)
            ->where('ma_nhu_cau', $maNhuCau)
            ->update([
                'muc_do_phu_hop' => $request->muc_do_phu_hop,
            ]);

        return redirect()
            ->route('admin.diadiemnhucau.index')
            ->with(
                'success',
                'Cập nhật dữ liệu gợi ý điểm đến thành công.'
            );
    }

    public function destroy($maDiaDiem, $maNhuCau)
    {
        DB::table('dia_diem_nhu_cau_du_lich')
            ->where('ma_dia_diem', $maDiaDiem)
            ->where('ma_nhu_cau', $maNhuCau)
            ->delete();

        return redirect()
            ->route('admin.diadiemnhucau.index')
            ->with(
                'success',
                'Xóa dữ liệu gợi ý điểm đến thành công.'
            );
    }
}