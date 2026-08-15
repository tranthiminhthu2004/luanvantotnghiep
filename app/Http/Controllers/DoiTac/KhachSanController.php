<?php

namespace App\Http\Controllers\DoiTac;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use App\Models\KhachSan;
use App\Models\DiaDiem;
use App\Models\LoaiPhong;
use App\Models\Phong;
use App\Models\TienNghi;
use App\Models\HinhAnhKhachSan;
use App\Models\HinhAnhLoaiPhong;

class KhachSanController extends Controller
{
    public function index()
    {
        $maNguoiDung = auth()->user()->ma_nguoi_dung;

        $khachSans = KhachSan::where(
                'ma_nguoi_dung',
                $maNguoiDung
            )
            ->orderBy('ma_khach_san', 'desc')
            ->paginate(10);

        $tongKhachSan = KhachSan::where(
            'ma_nguoi_dung',
            $maNguoiDung
        )->count();

        $choDuyet = KhachSan::where(
                'ma_nguoi_dung',
                $maNguoiDung
            )
            ->where(
                'trang_thai_duyet',
                'ChoDuyet'
            )
            ->count();

        $daDuyet = KhachSan::where(
                'ma_nguoi_dung',
                $maNguoiDung
            )
            ->where(
                'trang_thai_duyet',
                'DaDuyet'
            )
            ->count();

        $biTuChoi = KhachSan::where(
                'ma_nguoi_dung',
                $maNguoiDung
            )
            ->where(
                'trang_thai_duyet',
                'TuChoi'
            )
            ->count();

        return view(
            'doitac.khachsan.index',
            compact(
                'khachSans',
                'tongKhachSan',
                'choDuyet',
                'daDuyet',
                'biTuChoi'
            )
        );
    }
    public function show($maKhachSan)
{
    $khachSan = KhachSan::with([

        'diaDiem',

        'hinhAnh',

        'tienNghis',

        'loaiPhongs.hinhAnh',

        'loaiPhongs.phongs',

        'loaiPhongs.tienNghis'

    ])
    ->where(
        'ma_khach_san',
        $maKhachSan
    )
    ->where(
        'ma_nguoi_dung',
        auth()->user()->ma_nguoi_dung
    )
    ->firstOrFail();

    return view(
        'doitac.khachsan.show',
        compact('khachSan')
    );
}

   public function form1()
{
    $diaDiems = DiaDiem::orderBy('ten_dia_diem')->get();

    $soSaos = [1, 2, 3, 4, 5];

    $duLieu = session('doitac_khachsan_form1', []);

    return view(
        'doitac.khachsan.create.form1',
        compact(
            'diaDiems',
            'soSaos',
            'duLieu'
        )
    );
}
    public function luuForm1(Request $request)
{
    $request->validate([

        'ten_khach_san' => 'required|string|max:191',

        'ma_dia_diem' => 'required|exists:dia_diem,ma_dia_diem',

        'dia_chi' => 'required|string|max:191',

        'so_sao_khach_san' => 'required|integer',

        'so_dien_thoai' => [
            'required',
            'regex:/^0[0-9]{9}$/'
        ],

        'email' => 'required|email|max:191',

        'gio_check_in' => 'required',

        'gio_check_out' => 'required',

        'vi_do' => 'nullable|numeric',

        'kinh_do' => 'nullable|numeric',

        'so_gio_huy_mien_phi' => 'nullable|integer|min:0',

        'mo_ta' => 'nullable|string',

    ], [

        'ten_khach_san.required' => 'Vui lòng nhập tên khách sạn.',

        'ma_dia_diem.required' => 'Vui lòng chọn địa điểm.',

        'dia_chi.required' => 'Vui lòng nhập địa chỉ.',

        'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại.',

        'so_dien_thoai.regex' => 'Số điện thoại phải có 10 ,bắt đầu bằng 0 và không được có khoảng cách.',

        'email.required' => 'Vui lòng nhập email.',

        'email.email' => 'Email không đúng định dạng.',

        'gio_check_in.required' => 'Vui lòng chọn giờ nhận phòng.',

        'gio_check_out.required' => 'Vui lòng chọn giờ trả phòng.',

    ]);

    session([

        'doitac_khachsan_form1' => $request->only([

            'ten_khach_san',

            'ma_dia_diem',

            'dia_chi',

            'vi_do',

            'kinh_do',

            'so_sao_khach_san',

            'so_dien_thoai',

            'email',

            'gio_check_in',

            'gio_check_out',

            'so_gio_huy_mien_phi',

            'mo_ta'

        ])

    ]);

    return redirect()->route(
        'doitac.khachsan.create.form2'
    );
}
public function form2()
{
    if (!session()->has('doitac_khachsan_form1'))
    {
        return redirect()->route(
            'doitac.khachsan.create.form1'
        );
    }

    $hinhAnhDaTai = session(
        'doitac_khachsan_form2',
        []
    );

    return view(
        'doitac.khachsan.create.form2',
        compact(
            'hinhAnhDaTai'
        )
    );
}

public function luuForm2(Request $request)
{
    $anhCu = session(
        'doitac_khachsan_form2',
        []
    );

    $anhXoa = json_decode(
        $request->anh_xoa ?? '[]',
        true
    );

    if (!is_array($anhXoa))
    {
        $anhXoa = [];
    }
    
    if ($request->hasFile('hinh_anh'))
    {
        $request->validate([

            'hinh_anh' => 'array',

            'hinh_anh.*' =>
                'image|mimes:jpg,jpeg,png,webp|max:2048'

        ], [

            'hinh_anh.*.image' =>
                'Tệp tải lên phải là hình ảnh.',

            'hinh_anh.*.mimes' =>
                'Chỉ chấp nhận JPG, JPEG, PNG hoặc WEBP.',

            'hinh_anh.*.max' =>
                'Mỗi hình ảnh tối đa 2MB.',

        ]);
    }

    $danhSachHinhAnh = array_values(

        array_diff(

            $anhCu,

            $anhXoa

        )

    );

    if ($request->hasFile('hinh_anh'))
    {
        foreach ($request->file('hinh_anh') as $hinhAnh)
        {
            $tenAnh =
                time() . '_' .
                uniqid() . '.' .
                $hinhAnh->getClientOriginalExtension();

            $hinhAnh->move(
                public_path('images/khachsan'),
                $tenAnh
            );

            $danhSachHinhAnh[] = $tenAnh;
        }
    }

    if (count($danhSachHinhAnh) < 5)
    {
        return back()
            ->withInput()
            ->withErrors([
                'hinh_anh' =>
                'Khách sạn phải có ít nhất 5 hình ảnh.'
            ]);
    }

    if (count($danhSachHinhAnh) > 15)
    {
        return back()
            ->withInput()
            ->withErrors([
                'hinh_anh' =>
                'Khách sạn chỉ được có tối đa 15 hình ảnh.'
            ]);
    }
     foreach ($anhXoa as $tenAnh)
    {
        $duongDan = public_path(
            'images/khachsan/' . $tenAnh
        );

        if (File::exists($duongDan))
        {
            File::delete($duongDan);
        }
    }

    session([

        'doitac_khachsan_form2' => $danhSachHinhAnh

    ]);

    return redirect()->route(
        'doitac.khachsan.create.form3'
    );
}
public function themAnhTam(Request $request)
{
    $request->validate([
        'hinh_anh.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    $danhSachAnh = session('doitac_khachsan_form2', []);

    foreach ($request->file('hinh_anh', []) as $file) {

        if (count($danhSachAnh) >= 15) {
            return response()->json([
                'success' => false,
                'message' => 'Chỉ được tải tối đa 15 hình.'
            ], 422);
        }

        $tenAnh =
            time() . '_' .
            uniqid() . '.' .
            $file->getClientOriginalExtension();

        $file->move(
            public_path('images/khachsan'),
            $tenAnh
        );

        $danhSachAnh[] = $tenAnh;
    }

    session([
        'doitac_khachsan_form2' => $danhSachAnh
    ]);

    return response()->json([
        'success' => true,
        'images' => $danhSachAnh
    ]);
}
public function form3()
{
    if (
        !session()->has('doitac_khachsan_form1') ||
        !session()->has('doitac_khachsan_form2')
    ) {
        return redirect()->route(
            'doitac.khachsan.create.form1'
        );
    }

    $loaiPhongs = old(
        'loai_phong',
        session(
            'doitac_khachsan_form3',
            [
                [
                    'ten_loai_phong' => '',
                    'so_nguoi_toi_da' => '',
                    'dien_tich' => '',
                    'so_giuong' => '',
                    'gia_co_ban' => '',
                    'mo_ta' => '',
                    'hinh_anh' => null,
                    'phong' => [
                        [
                            'so_phong' => '',
                            'tang' => '',
                        ]
                    ]
                ]
            ]
        )
    );

    return view(
        'doitac.khachsan.create.form3',
        compact('loaiPhongs')
    );
}

public function luuForm3(Request $request)
{
    $request->validate(

        [

            'loai_phong' => 'required|array|min:1',

            'loai_phong.*.ten_loai_phong' => 'required|string|max:255',

            'loai_phong.*.so_nguoi_toi_da' => 'required|integer|min:1',

            'loai_phong.*.dien_tich' => 'required|numeric|min:1',

            'loai_phong.*.so_giuong' => 'required|integer|min:1',

            'loai_phong.*.gia_co_ban' => 'required|numeric|min:1000',

            'loai_phong.*.mo_ta' => 'nullable|string',

            'loai_phong.*.hinh_anh' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'loai_phong.*.phong' => 'required|array|min:1',

            'loai_phong.*.phong.*.so_phong' => 'required|string|max:20',

            'loai_phong.*.phong.*.tang' => 'required|integer|min:1',

        ],

       [
    'loai_phong.required' => 'Vui lòng thêm ít nhất một loại phòng.',

    'loai_phong.*.ten_loai_phong.required' => 'Vui lòng nhập tên loại phòng.',
    'loai_phong.*.ten_loai_phong.max' => 'Tên loại phòng tối đa 255 ký tự.',

    'loai_phong.*.so_nguoi_toi_da.required' => 'Vui lòng nhập số người tối đa.',
    'loai_phong.*.so_nguoi_toi_da.integer' => 'Số người tối đa phải là số nguyên.',
    'loai_phong.*.so_nguoi_toi_da.min' => 'Số người tối đa phải lớn hơn 0.',

    'loai_phong.*.dien_tich.required' => 'Vui lòng nhập diện tích.',
    'loai_phong.*.dien_tich.numeric' => 'Diện tích phải là số.',
    'loai_phong.*.dien_tich.min' => 'Diện tích phải lớn hơn 0.',

    'loai_phong.*.so_giuong.required' => 'Vui lòng nhập số giường.',
    'loai_phong.*.so_giuong.integer' => 'Số giường phải là số nguyên.',

    'loai_phong.*.gia_co_ban.required' => 'Vui lòng nhập giá cơ bản.',
    'loai_phong.*.gia_co_ban.numeric' => 'Giá cơ bản phải là số.',
    'loai_phong.*.gia_co_ban.min' => 'Giá cơ bản tối thiểu là 1.000.',

    'loai_phong.*.hinh_anh.image' => 'File phải là hình ảnh.',
    'loai_phong.*.hinh_anh.mimes' => 'Chỉ chấp nhận JPG, JPEG, PNG, WEBP.',
    'loai_phong.*.hinh_anh.max' => 'Ảnh không được vượt quá 2MB.',

    'loai_phong.*.phong.required' => 'Vui lòng thêm ít nhất một phòng.',
    'loai_phong.*.phong.*.so_phong.required' => 'Vui lòng nhập số phòng.',
    'loai_phong.*.phong.*.tang.required' => 'Vui lòng nhập tầng.',
]

    );

    $danhSachSoPhong = [];

    foreach ($request->loai_phong as $loaiPhong)
    {
        foreach ($loaiPhong['phong'] as $phong)
        {
            $soPhong = trim($phong['so_phong']);

            if (in_array($soPhong, $danhSachSoPhong))
            {
                return back()
                    ->withInput()
                    ->withErrors([
                        'so_phong' => "Số phòng {$soPhong} đã bị trùng."
                    ]);
            }

            $danhSachSoPhong[] = $soPhong;
        }
    }

    $danhSachLoaiPhong = [];

    $duLieuCu = session('doitac_khachsan_form3', []);

    foreach ($request->loai_phong as $index => $loaiPhong)
    {
        $tenAnh = $loaiPhong['hinh_anh_cu'] ?? null;

        if ($request->hasFile("loai_phong.$index.hinh_anh"))
        {
            $file = $request->file("loai_phong.$index.hinh_anh");

            $tenAnh =
                time() . '_' .
                uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('images/loaiphong'),
                $tenAnh
            );
        }

        if (!$tenAnh)
        {
            return back()
                ->withInput()
                ->withErrors([
                    "loai_phong.$index.hinh_anh" =>
                        'Vui lòng chọn hình ảnh loại phòng.'
                ]);
        }

        $danhSachPhong = [];

        foreach ($loaiPhong['phong'] as $phong)
        {
           $danhSachPhong[] = [

    'ma_phong' => $phong['ma_phong'] ?? null,

    'so_phong' => trim($phong['so_phong']),

    'tang' => $phong['tang'],

];
        }

       $danhSachLoaiPhong[] = [

    'ma_loai_phong' => $loaiPhong['ma_loai_phong'] ?? null,

    'ten_loai_phong' => $loaiPhong['ten_loai_phong'],

    'so_nguoi_toi_da' => $loaiPhong['so_nguoi_toi_da'],

    'dien_tich' => $loaiPhong['dien_tich'],

    'so_giuong' => $loaiPhong['so_giuong'],

    'gia_co_ban' => $loaiPhong['gia_co_ban'],

    'mo_ta' => $loaiPhong['mo_ta'] ?? null,

    'hinh_anh' => $tenAnh,

    'tien_nghi' => $duLieuCu[$index]['tien_nghi'] ?? [],

    'phong' => $danhSachPhong,

];
    }

    session([
        'doitac_khachsan_form3' => $danhSachLoaiPhong
    ]);

    return redirect()->route(
        'doitac.khachsan.create.form4'
    );
}
public function form4()
{
    if (
        !session()->has('doitac_khachsan_form1') ||
        !session()->has('doitac_khachsan_form2') ||
        !session()->has('doitac_khachsan_form3')
    ) {
        return redirect()->route(
            'doitac.khachsan.create.form1'
        );
    }

    $tienNghis = TienNghi::where(
        'trang_thai',
        1
    )
    ->orderBy(
        'ten_tien_nghi'
    )
    ->get();

    $loaiPhongs = session('doitac_khachsan_form3');

$edit = session()->has('edit_khach_san');

if ($edit)
{
    $khachSan = KhachSan::with('tienNghis')
        ->find(session('edit_khach_san'));

    $tienNghiKhachSan = old(
        'tien_nghi_khach_san',
        $khachSan->tienNghis->pluck('ma_tien_nghi')->toArray()
    );

    $tienNghiLoaiPhong = [];

    foreach ($loaiPhongs as $index => $loaiPhong)
    {
        $tienNghiLoaiPhong[$index] =
            $loaiPhong['tien_nghi'] ?? [];
    }
}
else
{
    $tienNghiKhachSan = old('tien_nghi_khach_san', []);

    $tienNghiLoaiPhong = old('tien_nghi_loai_phong', []);
}
    return view(
        'doitac.khachsan.create.form4',
        compact(
            'tienNghis',
            'loaiPhongs',
            'tienNghiKhachSan',
            'tienNghiLoaiPhong'
        )
    );
}

public function luuForm4(Request $request)
{
    if (
        !session()->has('doitac_khachsan_form1') ||
        !session()->has('doitac_khachsan_form2') ||
        !session()->has('doitac_khachsan_form3')
    ) {
        return redirect()->route(
            'doitac.khachsan.create.form1'
        );
    }

    $request->validate(
        [
            'tien_nghi_khach_san' => 'required|array|min:1',
        ],
        [
            'tien_nghi_khach_san.required' => 'Vui lòng chọn ít nhất một tiện nghi khách sạn.',
            'tien_nghi_khach_san.min' => 'Vui lòng chọn ít nhất một tiện nghi khách sạn.',
        ]
    );

    $danhSachLoaiPhong = session('doitac_khachsan_form3');

    foreach ($danhSachLoaiPhong as $index => $loaiPhong) {

        if (empty($request->input("tien_nghi_loai_phong.$index"))) {

            return back()
                ->withInput()
                ->withErrors([
                    "tien_nghi_loai_phong.$index" =>
                    "Vui lòng chọn ít nhất một tiện nghi."
                ]);
        }
    }
    try {

        DB::beginTransaction();

        $duLieuKhachSan = session('doitac_khachsan_form1');

        $danhSachHinhAnh = session('doitac_khachsan_form2');

        $danhSachLoaiPhong = session('doitac_khachsan_form3');
        
        $maKhachSanEdit = session('edit_khach_san');
        
        if ($maKhachSanEdit) {

  $khachSan = KhachSan::where(
    'ma_khach_san',
    $maKhachSanEdit
)
->where(
    'ma_nguoi_dung',
    auth()->user()->ma_nguoi_dung
)
->firstOrFail();

$khachSan->update([

    'ten_khach_san' => $duLieuKhachSan['ten_khach_san'],

    'dia_chi' => $duLieuKhachSan['dia_chi'],

    'ma_dia_diem' => $duLieuKhachSan['ma_dia_diem'],

    'vi_do' => $duLieuKhachSan['vi_do'],

    'kinh_do' => $duLieuKhachSan['kinh_do'],

    'so_sao_khach_san' => $duLieuKhachSan['so_sao_khach_san'],

    'mo_ta' => $duLieuKhachSan['mo_ta'],

    'so_dien_thoai' => $duLieuKhachSan['so_dien_thoai'],

    'email' => $duLieuKhachSan['email'],

    'gio_check_in' => $duLieuKhachSan['gio_check_in'],

    'gio_check_out' => $duLieuKhachSan['gio_check_out'],

    'so_gio_huy_mien_phi' => $duLieuKhachSan['so_gio_huy_mien_phi'],

    'trang_thai' => 0,

    'trang_thai_duyet' => 'ChoDuyet',

    'ly_do_tu_choi' => null,

    'ngay_gui_duyet' => now(),

    'ngay_duyet' => null,

]);

} else {

        $khachSan = KhachSan::create([

            'ma_nguoi_dung' => auth()->user()->ma_nguoi_dung,

            'ten_khach_san' => $duLieuKhachSan['ten_khach_san'],

            'dia_chi' => $duLieuKhachSan['dia_chi'],

            'ma_dia_diem' => $duLieuKhachSan['ma_dia_diem'],

            'vi_do' => $duLieuKhachSan['vi_do'],

            'kinh_do' => $duLieuKhachSan['kinh_do'],

            'so_sao_khach_san' => $duLieuKhachSan['so_sao_khach_san'],

            'mo_ta' => $duLieuKhachSan['mo_ta'],

            'so_dien_thoai' => $duLieuKhachSan['so_dien_thoai'],

            'email' => $duLieuKhachSan['email'],

            'gio_check_in' => $duLieuKhachSan['gio_check_in'],

            'gio_check_out' => $duLieuKhachSan['gio_check_out'],

            'so_gio_huy_mien_phi' => $duLieuKhachSan['so_gio_huy_mien_phi'],

            'trang_thai' => 0,

            'trang_thai_duyet' => 'ChoDuyet',

            'ly_do_tu_choi' => null,

            'ngay_gui_duyet' => now(),

            'ngay_duyet' => null,

        ]);

}
if ($maKhachSanEdit) {

    HinhAnhKhachSan::where(
        'ma_khach_san',
        $khachSan->ma_khach_san
    )->delete();
}

foreach ($danhSachHinhAnh as $anh)
{
    HinhAnhKhachSan::create([

        'ma_khach_san' => $khachSan->ma_khach_san,

        'duong_dan_anh' => 'images/khachsan/' . $anh

    ]);
}
      
       if ($maKhachSanEdit)
{
    DB::table('khach_san_tien_nghi')
        ->where(
            'ma_khach_san',
            $khachSan->ma_khach_san
        )
        ->delete();
}

foreach ($request->tien_nghi_khach_san as $maTienNghi)
{
    DB::table('khach_san_tien_nghi')->insert([

        'ma_khach_san' => $khachSan->ma_khach_san,

        'ma_tien_nghi' => $maTienNghi

    ]);
}
$danhSachLoaiPhongConLai = [];
        foreach ($danhSachLoaiPhong as $index => $loaiPhong)
        {

            if (
        $maKhachSanEdit &&
        !empty($loaiPhong['ma_loai_phong'])
    )
    {
        // ===== Cập nhật loại phòng cũ =====

        $loaiPhongMoi = LoaiPhong::where(
            'ma_loai_phong',
            $loaiPhong['ma_loai_phong']
        )
        ->where(
            'ma_khach_san',
            $khachSan->ma_khach_san
        )
        ->first();

        $loaiPhongMoi->update([

            'ten_loai_phong' => $loaiPhong['ten_loai_phong'],

            'so_nguoi_toi_da' => $loaiPhong['so_nguoi_toi_da'],

            'dien_tich' => $loaiPhong['dien_tich'],

            'so_giuong' => $loaiPhong['so_giuong'],

            'gia_co_ban' => $loaiPhong['gia_co_ban'],

            'mo_ta' => $loaiPhong['mo_ta'],

        ]);
    }
    else
    {
        // ===== Tạo loại phòng mới =====

        $loaiPhongMoi = LoaiPhong::create([

            'ma_khach_san' => $khachSan->ma_khach_san,

            'ten_loai_phong' => $loaiPhong['ten_loai_phong'],

            'so_nguoi_toi_da' => $loaiPhong['so_nguoi_toi_da'],

            'dien_tich' => $loaiPhong['dien_tich'],

            'so_giuong' => $loaiPhong['so_giuong'],

            'gia_co_ban' => $loaiPhong['gia_co_ban'],

            'mo_ta' => $loaiPhong['mo_ta'],

        ]);
    }
    $danhSachLoaiPhongConLai[] = $loaiPhongMoi->ma_loai_phong;

    if ($maKhachSanEdit && !empty($loaiPhong['ma_loai_phong']))
    {
    // Xóa ảnh cũ trong database
    HinhAnhLoaiPhong::where(
        'ma_loai_phong',
        $loaiPhongMoi->ma_loai_phong
    )->delete();
    }

// Thêm lại ảnh hiện tại
HinhAnhLoaiPhong::create([

    'ma_loai_phong' => $loaiPhongMoi->ma_loai_phong,

    'duong_dan_anh' => 'images/loaiphong/' . $loaiPhong['hinh_anh']

]); 
$danhSachPhongConLai = [];

foreach ($loaiPhong['phong'] as $phong)
{
    if (
        $maKhachSanEdit &&
        !empty($phong['ma_phong'])
    )
    {
        // Cập nhật phòng cũ 

        $phongMoi = Phong::where(
            'ma_phong',
            $phong['ma_phong']
        )->first();

        $phongMoi->update([

            'so_phong' => $phong['so_phong'],

            'tang' => $phong['tang'],

        ]);
    }
    else
    {
        //Tạo phòng mới

        $phongMoi = Phong::create([

            'ma_loai_phong' => $loaiPhongMoi->ma_loai_phong,

            'so_phong' => $phong['so_phong'],

            'tang' => $phong['tang'],

        ]);
    }

    $danhSachPhongConLai[] = $phongMoi->ma_phong;
}
if ($maKhachSanEdit)
{
    Phong::where(
        'ma_loai_phong',
        $loaiPhongMoi->ma_loai_phong
    )
    ->whereNotIn(
        'ma_phong',
        $danhSachPhongConLai
    )
    ->delete();
}
/* Tiện nghi loại phòng */
if ($maKhachSanEdit)
{
    DB::table('loai_phong_tien_nghi')
        ->where(
            'ma_loai_phong',
            $loaiPhongMoi->ma_loai_phong
        )
        ->delete();
}

$tienNghisLoaiPhong = $request->input(
    "tien_nghi_loai_phong.$index",
    []
);

foreach ($tienNghisLoaiPhong as $maTienNghi)
{
    DB::table('loai_phong_tien_nghi')->insert([

        'ma_loai_phong' => $loaiPhongMoi->ma_loai_phong,

        'ma_tien_nghi' => $maTienNghi,

    ]);
}
        }
        if ($maKhachSanEdit)
{
    $loaiPhongCanXoa = LoaiPhong::where(
        'ma_khach_san',
        $khachSan->ma_khach_san
    )
    ->whereNotIn(
        'ma_loai_phong',
        $danhSachLoaiPhongConLai
    )
    ->get();

    foreach ($loaiPhongCanXoa as $loaiPhongXoa)
    {
        // Xóa tất cả phòng của loại phòng
        Phong::where(
            'ma_loai_phong',
            $loaiPhongXoa->ma_loai_phong
        )->delete();

        // Xóa ảnh loại phòng
        HinhAnhLoaiPhong::where(
            'ma_loai_phong',
            $loaiPhongXoa->ma_loai_phong
        )->delete();

        // Xóa tiện nghi loại phòng
        DB::table('loai_phong_tien_nghi')
            ->where(
                'ma_loai_phong',
                $loaiPhongXoa->ma_loai_phong
            )
            ->delete();

        // Cuối cùng xóa loại phòng
        $loaiPhongXoa->delete();
    }
}

        DB::commit();

        session()->forget([

            'doitac_khachsan_form1',

            'doitac_khachsan_form2',

            'doitac_khachsan_form3',
            
            'edit_khach_san',

        ]);

        return redirect()
            ->route('doitac.khachsan.index')
            ->with(
                'success',
                'Gửi khách sạn chờ duyệt thành công.'
            );

    } catch (\Exception $e) {

        DB::rollBack();

        $this->xoaAnhTam();

        return back()
            ->withInput()
            ->with(
                'error',
                'Có lỗi xảy ra: ' . $e->getMessage()
            );
    }
}

public function edit($maKhachSan)
{
    $khachSan = KhachSan::with([
        'hinhAnh',
        'tienNghis',
        'loaiPhongs.hinhAnh',
        'loaiPhongs.phongs',
        'loaiPhongs.tienNghis'
    ])
    ->where('ma_khach_san', $maKhachSan)
    ->where('ma_nguoi_dung', auth()->user()->ma_nguoi_dung)
    ->where('trang_thai_duyet', 'TuChoi')
    ->firstOrFail();

    // Form 1
    session([
        'doitac_khachsan_form1' => [
            'ten_khach_san' => $khachSan->ten_khach_san,
            'ma_dia_diem' => $khachSan->ma_dia_diem,
            'dia_chi' => $khachSan->dia_chi,
            'vi_do' => $khachSan->vi_do,
            'kinh_do' => $khachSan->kinh_do,
            'so_sao_khach_san' => $khachSan->so_sao_khach_san,
            'so_dien_thoai' => $khachSan->so_dien_thoai,
            'email' => $khachSan->email,
            'gio_check_in' => $khachSan->gio_check_in,
            'gio_check_out' => $khachSan->gio_check_out,
            'so_gio_huy_mien_phi' => $khachSan->so_gio_huy_mien_phi,
            'mo_ta' => $khachSan->mo_ta,
        ]
    ]);

    // Form 2
    session([
        'doitac_khachsan_form2' => $khachSan
            ->hinhAnh
            ->pluck('duong_dan_anh')
            ->map(fn ($item) => basename($item))
            ->toArray()
    ]);
$danhSachLoaiPhong = [];

foreach ($khachSan->loaiPhongs as $loaiPhong) {

    $anhLoaiPhong = $loaiPhong->hinhAnh->first();

    $danhSachLoaiPhong[] = [

        'ma_loai_phong' => $loaiPhong->ma_loai_phong,

        'ten_loai_phong' => $loaiPhong->ten_loai_phong,

        'so_nguoi_toi_da' => $loaiPhong->so_nguoi_toi_da,

        'dien_tich' => $loaiPhong->dien_tich,

        'so_giuong' => $loaiPhong->so_giuong,

        'gia_co_ban' => $loaiPhong->gia_co_ban,

        'mo_ta' => $loaiPhong->mo_ta,

        'hinh_anh' => $anhLoaiPhong
            ? basename($anhLoaiPhong->duong_dan_anh)
            : null,

        // Tiện nghi loại phòng
        'tien_nghi' => $loaiPhong
            ->tienNghis
            ->pluck('ma_tien_nghi')
            ->toArray(),

        // Danh sách phòng
        'phong' => $loaiPhong
            ->phongs
            ->map(function ($phong) {

                return [

                    'ma_phong' => $phong->ma_phong,

                    'so_phong' => $phong->so_phong,

                    'tang' => $phong->tang,

                ];

            })
            ->toArray(),

    ];
}

session([
    'doitac_khachsan_form3' => $danhSachLoaiPhong
]);

    // Đánh dấu đây là chế độ chỉnh sửa
    session([
        'edit_khach_san' => $khachSan->ma_khach_san
    ]);

    return redirect()->route('doitac.khachsan.create.form1');
}
}