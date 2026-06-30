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
            'ho_ten' => 'required|max:100',

            'email' => 'required|email|max:100|unique:nguoi_dung,email,' . Auth::id() . ',ma_nguoi_dung',

            'so_dien_thoai' => 'required|regex:/^[0-9]{10}$/',

            'gioi_tinh' => 'required|in:Nam,Nu,Khac',

            'ngay_sinh' => 'nullable|date',

         'anh_dai_dien' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ],
        [
            'ho_ten.required' => 'Vui lòng nhập họ và tên.',

            'ho_ten.max' => 'Họ và tên không được quá 100 ký tự.',

            'email.required' => 'Vui lòng nhập email.',

            'email.email' => 'Email không đúng định dạng.',

            'email.unique' => 'Email đã tồn tại.',

            'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại.',

            'so_dien_thoai.regex' => 'Số điện thoại không hợp lệ.',

            'gioi_tinh.required' => 'Vui lòng chọn giới tính.',

            'ngay_sinh.date' => 'Ngày sinh không hợp lệ.',

            'anh_dai_dien.image' => 'Ảnh đại diện phải là hình ảnh.',

            'anh_dai_dien.mimes' => 'Ảnh chỉ được có định dạng jpg, jpeg hoặc png.',

            'anh_dai_dien.max' => 'Ảnh đại diện tối đa 2MB.',
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

    $nguoiDung->email = $request->email;

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