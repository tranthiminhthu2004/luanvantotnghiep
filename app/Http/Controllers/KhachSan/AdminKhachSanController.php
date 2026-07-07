<?php

namespace App\Http\Controllers\KhachSan;

use App\Http\Controllers\Controller;
use App\Models\KhachSan;
use Illuminate\Http\Request;
use App\Models\DiaDiem;
class AdminKhachSanController extends Controller
{
    public function index(Request $request)
{
   
    $query = KhachSan::query();

    // Tìm kiếm theo tên khách sạn
   if ($request->filled('ma_khach_san'))
{
    $query->where(
        'ma_khach_san',
        $request->ma_khach_san
    );
}

    // Lọc theo địa điểm 
    if ($request->filled('ma_dia_diem'))
    {
        $query->where(
            'ma_dia_diem',
            $request->ma_dia_diem
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


   $khachSans = $query
    ->with([
        'diaDiem',
        'hinhAnh'
    ])
    ->paginate(10)
    ->withQueryString();;

    $tongKhachSan = KhachSan::count();

    $dangHoatDong = KhachSan::where(
        'trang_thai',
        1
    )->count();

    $tamDung = KhachSan::where(
        'trang_thai',
        0
    )->count();

   $diaDiems = DiaDiem::orderBy(
    'ten_dia_diem'
)->get();

    $soSaos = KhachSan::select('so_sao_khach_san')
        ->distinct()
        ->orderBy('so_sao_khach_san', 'desc')
        ->get();
    $danhSachKhachSan = KhachSan::orderBy(
    'ten_khach_san'
)->get();
    return view(
        'admin.khachsan.index',
        compact(
            'khachSans',
            'tongKhachSan',
            'dangHoatDong',
            'tamDung',
            'diaDiems',
            'soSaos',
            'danhSachKhachSan'
        )
    );
}

        public function create()
{
    $diaDiems = DiaDiem::orderBy(
        'ten_dia_diem'
    )->get();

    return view(
        'admin.khachsan.create',
        compact('diaDiems')
    );
}
    

    public function store(Request $request)
    {
   $request->validate([
    'ten_khach_san' => 'required|string|max:191',

    'dia_chi' => 'required|string|max:191',

    'so_dien_thoai' => [
    'required',
    'regex:/^0[0-9]{9}$/'
],

    'email' => 'required|email|max:191',

    'gio_check_in' => 'required|date_format:H:i',

    'gio_check_out' => 'required|date_format:H:i',

    'vi_do' => 'nullable|numeric|between:-90,90',

    'kinh_do' => 'nullable|numeric|between:-180,180',

    'so_gio_huy_mien_phi' => 'nullable|integer|min:0',

    'mo_ta' => 'nullable|string',
], [
    'ten_khach_san.required' => 'Vui lòng nhập tên khách sạn.',

    'dia_chi.required' => 'Vui lòng nhập địa chỉ.',

    'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại.',
    
    'so_dien_thoai.regex' => 'Số điện thoại phải có 10 số và bắt đầu bằng 0.',

    'email.required' => 'Vui lòng nhập email.',
    
    'email.email' => 'Email không đúng định dạng.',

    'gio_check_in.required' => 'Vui lòng nhập giờ nhận phòng.',

    'gio_check_out.required' => 'Vui lòng nhập giờ trả phòng.',
]);
    KhachSan::create([

        'ten_khach_san' => $request->ten_khach_san,

        'dia_chi' => $request->dia_chi,

        'ma_dia_diem' => $request->ma_dia_diem,

        'vi_do' => $request->vi_do,

        'kinh_do' => $request->kinh_do,

        'so_sao_khach_san' => $request->so_sao_khach_san,

        'mo_ta' => $request->mo_ta,

        'so_dien_thoai' => $request->so_dien_thoai,

        'email' => $request->email,

        'trang_thai' => 1 ,
        
        'gio_check_in' => $request->gio_check_in,

        'gio_check_out' => $request->gio_check_out,

        'so_gio_huy_mien_phi' => $request->so_gio_huy_mien_phi
    ]);

    return redirect()
        ->route('admin.khachsan.index')
        ->with('success', 'Thêm khách sạn thành công');
}

   public function edit($id)
{
    $khachSan = KhachSan::findOrFail($id);

    $diaDiems = DiaDiem::orderBy(
        'ten_dia_diem'
    )->get();

    return view(
        'admin.khachsan.edit',
        compact(
            'khachSan',
            'diaDiems'
        )
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
    'ten_khach_san' => 'required|string|max:191',

    'dia_chi' => 'required|string|max:191',

    'so_dien_thoai' => [
        'required',
        'regex:/^0[0-9]{9}$/'
    ],

    'email' => 'required|email|max:191',

    'gio_check_in' => 'required|date_format:H:i',

    'gio_check_out' => 'required|date_format:H:i',

    'vi_do' => 'nullable|numeric|between:-90,90',

    'kinh_do' => 'nullable|numeric|between:-180,180',

    'so_gio_huy_mien_phi' => 'nullable|integer|min:0',

    'mo_ta' => 'nullable|string',
], [
    'ten_khach_san.required' => 'Vui lòng nhập tên khách sạn.',

    'dia_chi.required' => 'Vui lòng nhập địa chỉ.',

    'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại.',
    'so_dien_thoai.regex' => 'Số điện thoại phải có 10 số và bắt đầu bằng 0.',

    'email.required' => 'Vui lòng nhập email.',
    'email.email' => 'Email không đúng định dạng.',

    'gio_check_in.required' => 'Vui lòng nhập giờ nhận phòng.',

    'gio_check_out.required' => 'Vui lòng nhập giờ trả phòng.',
]);
    $khachSan = KhachSan::findOrFail($id);

    $khachSan->update([

        'ten_khach_san' => $request->ten_khach_san,

        'dia_chi' => $request->dia_chi,

        'ma_dia_diem' => $request->ma_dia_diem,

        'vi_do' => $request->vi_do,

        'kinh_do' => $request->kinh_do,

        'so_sao_khach_san' => $request->so_sao_khach_san,

        'mo_ta' => $request->mo_ta,

        'so_dien_thoai' => $request->so_dien_thoai,

        'email' => $request->email,

        'trang_thai' => $request->trang_thai,
        
        'gio_check_in' => $request->gio_check_in,

        'gio_check_out' => $request->gio_check_out,

        'so_gio_huy_mien_phi' => $request->so_gio_huy_mien_phi
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
    public function album($id)
{
    $khachSan = KhachSan::with(
        'hinhAnh'
    )->findOrFail($id);

    return view(
        'users.albumkhachsan',
        compact('khachSan')
    );
}
    
}