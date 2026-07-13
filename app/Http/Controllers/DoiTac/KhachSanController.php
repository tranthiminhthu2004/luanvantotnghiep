<?php

namespace App\Http\Controllers\DoiTac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use App\Models\KhachSan;
use App\Models\DiaDiem;
use App\Models\LoaiPhong;
use App\Models\TienNghi;
use App\Models\HinhAnhKhachSan;
use App\Models\HinhAnhLoaiPhong;

class KhachSanController extends Controller
{
    public function index()
    {
        $khachSans = KhachSan::where(
            'ma_nguoi_dung',
            auth()->user()->ma_nguoi_dung
        )
        ->latest('ma_khach_san')
        ->get();

        return view(
            'doitac.khachsan.index',
            compact('khachSans')
        );
    }

    public function form1()
    {
        $diaDiems = DiaDiem::orderBy(
            'ten_dia_diem'
        )->get();

        $soSaos = KhachSan::select(
            'so_sao_khach_san'
        )
        ->distinct()
        ->orderBy(
            'so_sao_khach_san',
            'asc'
        )
        ->get();

        return view(
            'doitac.khachsan.create.form1',
            compact(
                'diaDiems',
                'soSaos'
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

            'so_dien_thoai.regex' => 'Số điện thoại phải có 10 số và bắt đầu bằng 0.',

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

        return view(
            'doitac.khachsan.form2'
        );
    }

    public function luuForm2(Request $request)
    {
        $request->validate([

            'hinh_anh' => 'required|array|min:5|max:15',

            'hinh_anh.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

        ], [

            'hinh_anh.required' => 'Vui lòng chọn hình ảnh.',

            'hinh_anh.array' => 'Dữ liệu hình ảnh không hợp lệ.',

            'hinh_anh.min' => 'Khách sạn phải có ít nhất 5 hình ảnh.',

            'hinh_anh.max' => 'Khách sạn chỉ được tải lên tối đa 15 hình ảnh.',

            'hinh_anh.*.required' => 'Vui lòng chọn hình ảnh.',

            'hinh_anh.*.image' => 'Tệp tải lên phải là hình ảnh.',

            'hinh_anh.*.mimes' => 'Chỉ chấp nhận JPG, JPEG, PNG hoặc WEBP.',

            'hinh_anh.*.max' => 'Mỗi hình ảnh tối đa 2MB.',

        ]);

        $danhSachHinhAnh = [];

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

        session([

            'doitac_khachsan_form2' => $danhSachHinhAnh

        ]);

        return redirect()->route(

            'doitac.khachsan.create.form3'

        );
    }
        public function form3()
    {
        if (
            !session()->has('doitac_khachsan_form1') ||
            !session()->has('doitac_khachsan_form2')
        )
        {
            return redirect()->route(
                'doitac.khachsan.create.form1'
            );
        }

        return view(
            'doitac.khachsan.form3'
        );
    }

    public function luuForm3(Request $request)
    {
        $request->validate([

            'loai_phong' => 'required|array|min:1',

            'loai_phong.*.ten_loai_phong' => 'required|string|max:255',

            'loai_phong.*.so_nguoi_toi_da' => 'required|integer|min:1',

            'loai_phong.*.dien_tich' => 'required|numeric|min:1',

            'loai_phong.*.so_giuong' => 'required|integer|min:1',

            'loai_phong.*.gia_co_ban' => 'required|numeric|min:1000',

            'loai_phong.*.mo_ta' => 'nullable|string',

            'loai_phong.*.hinh_anh' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

        ], [

            'loai_phong.required' => 'Vui lòng thêm ít nhất một loại phòng.',

            'loai_phong.*.ten_loai_phong.required' => 'Vui lòng nhập tên loại phòng.',

            'loai_phong.*.so_nguoi_toi_da.required' => 'Vui lòng nhập số người tối đa.',

            'loai_phong.*.dien_tich.required' => 'Vui lòng nhập diện tích.',

            'loai_phong.*.so_giuong.required' => 'Vui lòng nhập số giường.',

            'loai_phong.*.gia_co_ban.required' => 'Vui lòng nhập giá cơ bản.',

            'loai_phong.*.hinh_anh.required' => 'Vui lòng chọn hình ảnh loại phòng.',

            'loai_phong.*.hinh_anh.image' => 'Tệp tải lên phải là hình ảnh.',

            'loai_phong.*.hinh_anh.mimes' => 'Chỉ chấp nhận JPG, JPEG, PNG hoặc WEBP.',

            'loai_phong.*.hinh_anh.max' => 'Mỗi hình ảnh tối đa 2MB.',

        ]);

        $danhSachLoaiPhong = [];

        foreach ($request->loai_phong as $index => $loaiPhong)
        {
            $tenAnh = null;

            if ($request->hasFile("loai_phong.$index.hinh_anh"))
            {
                $file = $request->file("loai_phong.$index.hinh_anh");

                $tenAnh =
                    time().'_'.
                    uniqid().'.'.
                    $file->getClientOriginalExtension();

                $file->move(

                    public_path('images/loaiphong'),

                    $tenAnh

                );
            }

            $danhSachLoaiPhong[] = [

                'ten_loai_phong' => $loaiPhong['ten_loai_phong'],

                'so_nguoi_toi_da' => $loaiPhong['so_nguoi_toi_da'],

                'dien_tich' => $loaiPhong['dien_tich'],

                'so_giuong' => $loaiPhong['so_giuong'],

                'gia_co_ban' => $loaiPhong['gia_co_ban'],

                'mo_ta' => $loaiPhong['mo_ta'] ?? null,

                'hinh_anh' => $tenAnh,

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
        )
        {
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

        $loaiPhongs = session(
            'doitac_khachsan_form3'
        );

        return view(
            'doitac.khachsan.form4',
            compact(
                'tienNghis',
                'loaiPhongs'
            )
        );
    }

    private function xoaAnhTam()
    {
        if (session()->has('doitac_khachsan_form2'))
        {
            foreach (
                session('doitac_khachsan_form2')
                as $anh
            )
            {
                $duongDan = public_path(
                    'images/khachsan/' . $anh
                );

                if (File::exists($duongDan))
                {
                    File::delete($duongDan);
                }
            }
        }

        if (session()->has('doitac_khachsan_form3'))
        {
            foreach (
                session('doitac_khachsan_form3')
                as $loaiPhong
            )
            {
                if (
                    empty($loaiPhong['hinh_anh'])
                )
                {
                    continue;
                }

                $duongDan = public_path(
                    'images/loaiphong/' .
                    $loaiPhong['hinh_anh']
                );

                if (File::exists($duongDan))
                {
                    File::delete($duongDan);
                }
            }
        }
    }
    public function luuForm4(Request $request)
{
    if (
    !session()->has('doitac_khachsan_form1') ||
    !session()->has('doitac_khachsan_form2') ||
    !session()->has('doitac_khachsan_form3')
)
{
    return redirect()->route(
        'doitac.khachsan.create.form1'
    );
}
    $request->validate([

        'tien_nghi_khach_san' => 'required|array|min:1',

        'tien_nghi_loai_phong' => 'required|array',

    ],[

        'tien_nghi_khach_san.required' =>
            'Vui lòng chọn ít nhất một tiện nghi khách sạn.',

        'tien_nghi_khach_san.min' =>
            'Vui lòng chọn ít nhất một tiện nghi khách sạn.',

    ]);

    try
    {
        DB::beginTransaction();

        $duLieuKhachSan = session(
            'doitac_khachsan_form1'
        );

        $danhSachHinhAnh = session(
            'doitac_khachsan_form2'
        );

        $danhSachLoaiPhong = session(
            'doitac_khachsan_form3'
        );

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

        foreach ($danhSachHinhAnh as $anh)
        {
            HinhAnhKhachSan::create([

                'ma_khach_san' => $khachSan->ma_khach_san,

                'duong_dan_anh' => $anh

            ]);
        }

        foreach ($request->tien_nghi_khach_san as $maTienNghi)
        {
            DB::table(
                'khach_san_tien_nghi'
            )->insert([

                'ma_khach_san' =>
                    $khachSan->ma_khach_san,

                'ma_tien_nghi' =>
                    $maTienNghi

            ]);
        }
                foreach ($danhSachLoaiPhong as $index => $loaiPhong)
        {
            $loaiPhongMoi = LoaiPhong::create([

                'ma_khach_san' => $khachSan->ma_khach_san,

                'ten_loai_phong' => $loaiPhong['ten_loai_phong'],

                'mo_ta' => $loaiPhong['mo_ta'],

                'so_nguoi_toi_da' => $loaiPhong['so_nguoi_toi_da'],

                'dien_tich' => $loaiPhong['dien_tich'],

                'so_giuong' => $loaiPhong['so_giuong'],

                'gia_co_ban' => $loaiPhong['gia_co_ban'],

                'trang_thai' => 1,

            ]);

            HinhAnhLoaiPhong::create([

                'ma_loai_phong' => $loaiPhongMoi->ma_loai_phong,

                'duong_dan_anh' => $loaiPhong['hinh_anh']

            ]);

            if (
                isset($request->tien_nghi_loai_phong[$index])
            )
            {
                foreach (
                    $request->tien_nghi_loai_phong[$index]
                    as $maTienNghi
                )
                {
                    DB::table(
                        'loai_phong_tien_nghi'
                    )->insert([

                        'ma_loai_phong' =>
                            $loaiPhongMoi->ma_loai_phong,

                        'ma_tien_nghi' =>
                            $maTienNghi

                    ]);
                }
            }
        }
                DB::commit();

        session()->forget([

            'doitac_khachsan_form1',

            'doitac_khachsan_form2',

            'doitac_khachsan_form3',

        ]);

        return redirect()
            ->route('doitac.khachsan.index')
            ->with(
                'success',
                'Gửi khách sạn chờ duyệt thành công.'
            );
    }
    catch (\Exception $e)
    {
        DB::rollBack();

        $this->xoaAnhTam();

        return back()
            ->withInput()
            ->with(
                'error',
                'Có lỗi xảy ra, vui lòng thử lại.'
            );
    }
}
}