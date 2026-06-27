<?php

namespace App\Http\Controllers\NguoiDung;

use App\Http\Controllers\Controller;
use App\Models\NguoiDung;
use App\Models\VaiTro;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminNguoiDungController extends Controller
{
    public function index(Request $request)
    {
        $query = NguoiDung::with('vaiTro');

        // Tìm kiếm
        if ($request->filled('tu_khoa'))
        {
            $query->where(function ($q) use ($request)
            {
                $q->where(
                    'ho_va_ten_dem',
                    'like',
                    '%' . $request->tu_khoa . '%'
                )
                ->orWhere(
                    'ten',
                    'like',
                    '%' . $request->tu_khoa . '%'
                )
                ->orWhere(
                    'email',
                    'like',
                    '%' . $request->tu_khoa . '%'
                );
            });
        }

        // Lọc vai trò
        if ($request->filled('ma_vai_tro'))
        {
            $query->where(
                'ma_vai_tro',
                $request->ma_vai_tro
            );
        }

        // Lọc trạng thái
       // Lọc trạng thái
if ($request->filled('trang_thai'))
{
    $query->where(
        'trang_thai',
        (int) $request->trang_thai
    );
}

        // Sắp xếp
      $query->orderBy(
    'ma_nguoi_dung',
    $request->sap_xep ?? 'desc'
);
        $nguoiDungs = $query
            ->paginate(10)
            ->withQueryString();

        // Thống kê
        $tongNguoiDung = NguoiDung::count();

        $dangHoatDong = NguoiDung::where(
            'trang_thai',
            1
        )->count();

        $biKhoa = NguoiDung::where(
            'trang_thai',
            0
        )->count();

        $vaiTros = VaiTro::all();

        return view(
            'admin.nguoidung.index',
            compact(
                'nguoiDungs',
                'tongNguoiDung',
                'dangHoatDong',
                'biKhoa',
                'vaiTros'
            )
        );
    }
    public function create()
{
    $vaiTros = VaiTro::all();

    return view(
        'admin.nguoidung.create',
        compact('vaiTros')
    );
}
public function store(Request $request)
{
   $request->validate([

    'ma_vai_tro' => 'required|exists:vai_tro,ma_vai_tro',

    'ho_va_ten_dem' => 'nullable|max:100',

    'ten' => 'required|max:50',

    'email' => 'required|email|max:150|unique:nguoi_dung,email',

    'mat_khau' => 'required|min:6|max:100',

    'so_dien_thoai' => 'nullable|digits_between:10,11|unique:nguoi_dung,so_dien_thoai',

    'gioi_tinh' => 'nullable|in:Nam,Nu,Khac',

    'ngay_sinh' => 'nullable|date|before:today',

    'anh_dai_dien' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

],[

    'ma_vai_tro.exists' => 'Vai trò không hợp lệ.',

    'ho_va_ten_dem.max' => 'Họ và tên đệm không được vượt quá 100 ký tự.',

    'ten.required' => 'Vui lòng nhập tên.',
    'ten.max' => 'Tên không được vượt quá 50 ký tự.',

    'email.required' => 'Vui lòng nhập email.',
    'email.email' => 'Email không đúng định dạng.',
    'email.max' => 'Email không được vượt quá 150 ký tự.',
    'email.unique' => 'Email đã tồn tại.',

    'mat_khau.required' => 'Vui lòng nhập mật khẩu.',
    'mat_khau.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
    'mat_khau.max' => 'Mật khẩu không được vượt quá 100 ký tự.',

    'so_dien_thoai.digits_between' => 'Số điện thoại phải từ 10 đến 11 số.',
    'so_dien_thoai.unique' => 'Số điện thoại đã tồn tại.',


    'ngay_sinh.date' => 'Ngày sinh không hợp lệ.',
    'ngay_sinh.before' => 'Ngày sinh phải nhỏ hơn ngày hiện tại.',

    'anh_dai_dien.image' => 'Ảnh đại diện phải là hình ảnh.',
    'anh_dai_dien.mimes' => 'Ảnh phải có định dạng jpg, jpeg, png hoặc webp.',
    'anh_dai_dien.max' => 'Ảnh không được vượt quá 2MB.',

]);

    $anhDaiDien = null;

    if($request->hasFile('anh_dai_dien'))
    {
        $anhDaiDien =
            $request->file('anh_dai_dien')
            ->store(
                'images/nguoidung',
                'public'
            );
    }

    NguoiDung::create([

        'ma_vai_tro' => $request->ma_vai_tro,

        'ho_va_ten_dem' => $request->ho_va_ten_dem,

        'ten' => $request->ten,

        'email' => $request->email,

        'mat_khau' => Hash::make(
            $request->mat_khau
        ),

        'so_dien_thoai' => $request->so_dien_thoai,

        'gioi_tinh' => $request->gioi_tinh,

        'ngay_sinh' => $request->ngay_sinh,

        'anh_dai_dien' => $anhDaiDien,

        'trang_thai' => 1
    ]);

    return redirect()
        ->route('admin.nguoidung.index')
        ->with(
            'success',
            'Thêm người dùng thành công'
        );
}
public function edit($id)
{
    $nguoiDung = NguoiDung::findOrFail($id);

    $vaiTros = VaiTro::all();

    return view(
        'admin.nguoidung.edit',
        compact(
            'nguoiDung',
            'vaiTros'
        )
    );
}
public function update(
    Request $request,
    $id
)
{
    $nguoiDung = NguoiDung::findOrFail($id);
    $request->validate([

    'ma_vai_tro' => 'required|exists:vai_tro,ma_vai_tro',

    'ho_va_ten_dem' => 'nullable|max:100',

    'ten' => 'required|max:50',

    'so_dien_thoai' =>
        'nullable|digits_between:10,11|unique:nguoi_dung,so_dien_thoai,' .
        $id .
        ',ma_nguoi_dung',

    'gioi_tinh' => 'nullable|in:Nam,Nu,Khac',

    'ngay_sinh' => 'nullable|date|before:today',

    'anh_dai_dien' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

],[

    'ma_vai_tro.exists' => 'Vai trò không hợp lệ.',

    'ho_va_ten_dem.max' => 'Họ và tên đệm không được vượt quá 100 ký tự.',

    'ten.required' => 'Vui lòng nhập tên.',
    'ten.max' => 'Tên không được vượt quá 50 ký tự.',

    'so_dien_thoai.digits_between' => 'Số điện thoại phải từ 10 đến 11 số.',
    'so_dien_thoai.unique' => 'Số điện thoại đã tồn tại.',

    'ngay_sinh.date' => 'Ngày sinh không hợp lệ.',
    'ngay_sinh.before' => 'Ngày sinh phải nhỏ hơn ngày hiện tại.',

    'anh_dai_dien.image' => 'Ảnh đại diện phải là hình ảnh.',
    'anh_dai_dien.mimes' => 'Ảnh phải có định dạng jpg, jpeg, png hoặc webp.',
    'anh_dai_dien.max' => 'Ảnh không được vượt quá 2MB.',

]);

    if($request->hasFile('anh_dai_dien'))
    {
        if($nguoiDung->anh_dai_dien)
        {
            Storage::disk('public')
                ->delete(
                    $nguoiDung->anh_dai_dien
                );
        }

        $nguoiDung->anh_dai_dien =
            $request->file('anh_dai_dien')
            ->store(
                'images/nguoidung',
                'public'
            );
    }

    $nguoiDung->update([

        'ma_vai_tro' => $request->ma_vai_tro,

        'ho_va_ten_dem' =>
        $request->ho_va_ten_dem,

        'ten' => $request->ten,

        'so_dien_thoai' =>
        $request->so_dien_thoai,

        'gioi_tinh' =>
        $request->gioi_tinh,

        'ngay_sinh' =>
        $request->ngay_sinh,

        'trang_thai' =>
        $request->trang_thai,

        'anh_dai_dien' =>
        $nguoiDung->anh_dai_dien
    ]);

    return redirect()
        ->route('admin.nguoidung.index')
        ->with(
            'success',
            'Cập nhật thành công'
        );
}
public function show($id)
{
    $nguoiDung =
        NguoiDung::with('vaiTro')
        ->findOrFail($id);

    return view(
        'admin.nguoidung.show',
        compact('nguoiDung')
    );
}
}