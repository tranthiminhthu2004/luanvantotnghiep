<?php

namespace App\Http\Controllers\DoiTac;

use App\Http\Controllers\Controller;
use App\Models\KhachSan;
use Illuminate\Http\Request;

class AdminDoiTacController extends Controller
{
    public function index(Request $request)
    {
        $query = KhachSan::with([
            'nguoiDung',
            'diaDiem',
            'hinhAnh'
        ]);

        // Chỉ lấy hồ sơ do đối tác gửi
        $query->whereNotNull('ma_nguoi_dung');

        if ($request->filled('trang_thai_duyet')) {
            $query->where(
                'trang_thai_duyet',
                $request->trang_thai_duyet
            );
        }

        $doiTacs = $query
            ->latest('ngay_gui_duyet')
            ->paginate(10)
            ->withQueryString();

        $tongHoSo = KhachSan::whereNotNull('ma_nguoi_dung')
            ->count();

        $choDuyet = KhachSan::whereNotNull('ma_nguoi_dung')
            ->where('trang_thai_duyet', 'ChoDuyet')
            ->count();

        $daDuyet = KhachSan::whereNotNull('ma_nguoi_dung')
            ->where('trang_thai_duyet', 'DaDuyet')
            ->count();

        $tuChoi = KhachSan::whereNotNull('ma_nguoi_dung')
            ->where('trang_thai_duyet', 'TuChoi')
            ->count();

        return view(
            'admin.doitac.index',
            compact(
                'doiTacs',
                'tongHoSo',
                'choDuyet',
                'daDuyet',
                'tuChoi'
            )
        );
    }
    public function show($id)
{
    $doiTac = KhachSan::with([
        'nguoiDung',
        'diaDiem',
        'hinhAnh',
        'loaiPhongs.hinhAnh',
        'loaiPhongs.tienNghis',
        'tienNghis',
    ])->findOrFail($id);

    return view(
        'admin.doitac.show',
        compact('doiTac')
    );
}
public function duyet($id)
{
    $doiTac = KhachSan::findOrFail($id);

    $doiTac->update([

        'trang_thai_duyet' => 'DaDuyet',

        'trang_thai' => 1,

        'ly_do_tu_choi' => null,

        'ngay_duyet' => now(),

    ]);

    return redirect()
        ->route('admin.doitac.index')
        ->with(
            'success',
            'Duyệt hồ sơ đối tác thành công.'
        );
}

public function tuChoi(Request $request, $id)
{
    $request->validate([
        'ly_do_tu_choi' => 'required|string|max:1000',
    ], [
        'ly_do_tu_choi.required' => 'Vui lòng nhập lý do từ chối.',
    ]);

    $doiTac = KhachSan::findOrFail($id);

    $doiTac->update([

        'trang_thai_duyet' => 'TuChoi',

        'trang_thai' => 0,

        'ly_do_tu_choi' => $request->ly_do_tu_choi,

        'ngay_duyet' => now(),

    ]);

    return redirect()
        ->route('admin.doitac.index')
        ->with(
            'success',
            'Đã từ chối hồ sơ đối tác.'
        );
}
}