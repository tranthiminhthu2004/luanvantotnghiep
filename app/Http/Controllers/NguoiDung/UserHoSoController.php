<?php

namespace App\Http\Controllers\NguoiDung;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\NguoiDung;

class UserHoSoController extends Controller
{
   public function index()
    {
          $nguoiDung = NguoiDung::find(Auth::id());

        return view(
            'users.hoso.index',
            compact('nguoiDung')
        );
    }
    public function edit()
{
    $nguoiDung = Auth::user();

    return view(
        'users.hoso.edit',
        compact('nguoiDung')
    );
}
public function update(Request $request)
{
   $request->validate(
[
    'ho_ten' =>
        'required|max:100|regex:/^[\pL\s]+$/u',

    'so_dien_thoai' =>
        'required|digits:10|starts_with:0',

    'gioi_tinh' =>
        'required|in:Nam,Nu,Khac',

    'ngay_sinh' =>
        'nullable|date|before:today',

    'anh_dai_dien' =>
        'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
],
[
    'ho_ten.required' =>
        'Vui lòng nhập họ và tên.',

    'ho_ten.max' =>
        'Họ và tên không được quá 100 ký tự.',

    'ho_ten.regex' =>
        'Họ và tên chỉ được chứa chữ cái và khoảng trắng.',

    'so_dien_thoai.required' =>
        'Vui lòng nhập số điện thoại.',

    'so_dien_thoai.digits' =>
        'Số điện thoại phải gồm đúng 10 chữ số.',

    'so_dien_thoai.starts_with' =>
        'Số điện thoại phải bắt đầu bằng số 0.',

    'gioi_tinh.required' =>
        'Vui lòng chọn giới tính.',

    'gioi_tinh.in' =>
        'Giới tính không hợp lệ.',

    'ngay_sinh.before' =>
        'Ngày sinh phải nhỏ hơn ngày hiện tại.',

    'anh_dai_dien.image' =>
        'Ảnh đại diện phải là hình ảnh.',

    'anh_dai_dien.mimes' =>
        'Ảnh chỉ được có định dạng jpg, jpeg, png hoặc webp.',

    'anh_dai_dien.max' =>
        'Ảnh đại diện tối đa 2MB.',
]
);

    $nguoiDung = Auth::user();

    $hoTen = trim($request->ho_ten);

    $tachTen = explode(' ', $hoTen);

    $ten = array_pop($tachTen);

    $hoVaTenDem = implode(' ', $tachTen);

    if ($request->hasFile('anh_dai_dien'))
{
    // Xóa ảnh cũ
    if (
        $nguoiDung->anh_dai_dien &&
        file_exists(public_path($nguoiDung->anh_dai_dien))
    )
    {
        unlink(public_path($nguoiDung->anh_dai_dien));
    }

    // Tạo tên ảnh mới
    $tenAnh = time() . '_' . uniqid() . '.' .
        $request->file('anh_dai_dien')->getClientOriginalExtension();

    // Lưu ảnh
    $request->file('anh_dai_dien')->move(
        public_path('images/avatar'),
        $tenAnh
    );

    // Lưu đường dẫn vào database
    $nguoiDung->anh_dai_dien = 'images/avatar/' . $tenAnh;
}

    $nguoiDung->ho_va_ten_dem = $hoVaTenDem;

    $nguoiDung->ten = $ten;

    $nguoiDung->so_dien_thoai = $request->so_dien_thoai;

    $nguoiDung->gioi_tinh = $request->gioi_tinh;

    $nguoiDung->ngay_sinh = $request->ngay_sinh;


    $nguoiDung->save();

    return redirect()
        ->route('hoso.index')
        ->with(
            'success',
            'Cập nhật thông tin thành công.'
        );
}
}