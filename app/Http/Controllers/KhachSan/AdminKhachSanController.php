<?php

namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use App\Models\KhachSan;
use Illuminate\Http\Request;
class AdminKhachSanController extends Controller
{
    public function index(Request $request)
{
    $query = KhachSan::query();

    // Tìm kiếm theo tên khách sạn (có dấu hoặc không dấu)
    if ($request->filled('ten_khach_san'))
    {
        $tuKhoa = $this->boDau(
            $request->ten_khach_san
        );

        $ids = KhachSan::all()
            ->filter(function ($khachSan) use ($tuKhoa)
            {
                return str_contains(
                    $this->boDau(
                        $khachSan->ten_khach_san
                    ),
                    $tuKhoa
                );
            })
            ->pluck('ma_khach_san');

        $query->whereIn(
            'ma_khach_san',
            $ids
        );
    }

    // Lọc theo thành phố
    if ($request->filled('thanh_pho'))
    {
        $query->where(
            'thanh_pho',
            $request->thanh_pho
        );
    }

    // Lọc theo số sao
    if ($request->filled('so_sao_khach_san'))
    {
        $query->where(
            'so_sao_khach_san',
            $request->so_sao_khach_san
        );
    }

    // Lọc theo trạng thái
    if ($request->has('trang_thai')
    && $request->trang_thai !== '')
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
            'ma_khach_san',
            $request->sap_xep
        );
    }
    else
    {
        $query->orderBy(
            'ma_khach_san',
            'desc'
        );
    }

    $khachSans = $query->get();

    $tongKhachSan = KhachSan::count();

    $dangHoatDong = KhachSan::where(
        'trang_thai',
        1
    )->count();

    $tamDung = KhachSan::where(
        'trang_thai',
        0
    )->count();

    $thanhPhos = KhachSan::select('thanh_pho')
        ->distinct()
        ->orderBy('thanh_pho')
        ->get();

    $soSaos = KhachSan::select('so_sao_khach_san')
        ->distinct()
        ->orderBy('so_sao_khach_san', 'desc')
        ->get();

    return view(
        'admin.khachsan.index',
        compact(
            'khachSans',
            'tongKhachSan',
            'dangHoatDong',
            'tamDung',
            'thanhPhos',
            'soSaos'
        )
    );
}

    public function create()
    {
        return view('admin.khachsan.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'ten_khach_san' => 'required|max:255',
        'dia_chi' => 'required',
        'thanh_pho' => 'required',
        'so_sao_khach_san' => 'required|integer|min:1|max:5',
    ]);

    KhachSan::create([

        'ten_khach_san' => $request->ten_khach_san,

        'dia_chi' => $request->dia_chi,

        'thanh_pho' => $request->thanh_pho,

        'vi_do' => $request->vi_do,

        'kinh_do' => $request->kinh_do,

        'so_sao_khach_san' => $request->so_sao_khach_san,

        'mo_ta' => $request->mo_ta,

        'so_dien_thoai' => $request->so_dien_thoai,

        'email' => $request->email,

        'trang_thai' => 1
    ]);

    return redirect()
        ->route('admin.khachsan.index')
        ->with('success', 'Thêm khách sạn thành công');
}

    public function edit($id)
    {
    $khachSan = KhachSan::findOrFail($id);

    return view(
        'admin.khachsan.edit',
        compact('khachSan')
    );
    }
    public function show($id)
{
    $khachSan = KhachSan::findOrFail($id);

    return view(
        'admin.khachsan.show',
        compact('khachSan')
    );
}
    
    public function update(
    Request $request,
    $id
)
{
    $request->validate([
        'ten_khach_san' => 'required|max:255',
        'dia_chi' => 'required',
        'thanh_pho' => 'required',
        'so_sao_khach_san' => 'required|integer|min:1|max:5',
    ]);

    $khachSan = KhachSan::findOrFail($id);

    $khachSan->update([

        'ten_khach_san' => $request->ten_khach_san,

        'dia_chi' => $request->dia_chi,

        'thanh_pho' => $request->thanh_pho,

        'vi_do' => $request->vi_do,

        'kinh_do' => $request->kinh_do,

        'so_sao_khach_san' => $request->so_sao_khach_san,

        'mo_ta' => $request->mo_ta,

        'so_dien_thoai' => $request->so_dien_thoai,

        'email' => $request->email,

        'trang_thai' => $request->trang_thai
    ]);

    return redirect()
        ->route('admin.khachsan.index')
        ->with(
            'success',
            'Cập nhật khách sạn thành công'
        );
}

    public function destroy($id)
    {
       $khachSan = KhachSan::findOrFail($id);

    $khachSan->delete();

    return redirect()
        ->route('admin.khachsan.index')
        ->with(
            'success',
            'Xóa khách sạn thành công'
        );
    }
    private function boDau($chuoi)
{
    $chuoi = mb_strtolower($chuoi, 'UTF-8');

    $chuoi = str_replace(
        [
            'à','á','ạ','ả','ã',
            'â','ầ','ấ','ậ','ẩ','ẫ',
            'ă','ằ','ắ','ặ','ẳ','ẵ',
            'è','é','ẹ','ẻ','ẽ',
            'ê','ề','ế','ệ','ể','ễ',
            'ì','í','ị','ỉ','ĩ',
            'ò','ó','ọ','ỏ','õ',
            'ô','ồ','ố','ộ','ổ','ỗ',
            'ơ','ờ','ớ','ợ','ở','ỡ',
            'ù','ú','ụ','ủ','ũ',
            'ư','ừ','ứ','ự','ử','ữ',
            'ỳ','ý','ỵ','ỷ','ỹ',
            'đ'
        ],
        [
            'a','a','a','a','a',
            'a','a','a','a','a','a',
            'a','a','a','a','a','a',
            'e','e','e','e','e',
            'e','e','e','e','e','e',
            'i','i','i','i','i',
            'o','o','o','o','o',
            'o','o','o','o','o','o',
            'o','o','o','o','o','o',
            'u','u','u','u','u',
            'u','u','u','u','u','u',
            'y','y','y','y','y',
            'd'
        ],
        $chuoi
    );

    return $chuoi;
}
}