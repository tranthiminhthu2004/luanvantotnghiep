<?php

namespace App\Http\Controllers\DoiTac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PartnerHoSoController extends Controller
{
    public function index()
    {
        $nguoiDung = Auth::user();

        return view(
            'doitac.hoso.index',
            compact('nguoiDung')
        );
    }

    public function edit()
    {
        $nguoiDung = Auth::user();

        return view(
            'doitac.hoso.edit',
            compact('nguoiDung')
        );
    }

   public function update(Request $request)
{
    $nguoiDung = Auth::user();

    $request->validate([

        'ho_ten' =>
            'required|max:100|regex:/^[\pL\s]+$/u',

        'so_dien_thoai' =>
            'required|digits:10|starts_with:0',

        'gioi_tinh' =>
            'nullable|in:Nam,Nu,Khac',

        'ngay_sinh' =>
            'nullable|date|before:today',

        'anh_dai_dien' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

    ], [

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

        'gioi_tinh.in' =>
            'Giới tính không hợp lệ.',

        'ngay_sinh.before' =>
            'Ngày sinh phải nhỏ hơn ngày hiện tại.',

        'anh_dai_dien.image' =>
            'Tệp tải lên phải là hình ảnh.',

        'anh_dai_dien.mimes' =>
            'Ảnh phải có định dạng jpg, jpeg, png hoặc webp.',

        'anh_dai_dien.max' =>
            'Ảnh đại diện không được vượt quá 2MB.',

    ]);

    $hoTen = trim($request->ho_ten);

    $tachTen = explode(' ', $hoTen);

    $ten = array_pop($tachTen);

    $hoVaTenDem = implode(' ', $tachTen);

    $nguoiDung->ho_va_ten_dem = $hoVaTenDem;

    $nguoiDung->ten = $ten;

    $nguoiDung->so_dien_thoai = $request->so_dien_thoai;

    $nguoiDung->gioi_tinh = $request->gioi_tinh;

    $nguoiDung->ngay_sinh = $request->ngay_sinh;

    if ($request->hasFile('anh_dai_dien'))
    {
        $file = $request->file('anh_dai_dien');

        $tenFile =
            time().'_'.$file->getClientOriginalName();

        $file->move(
            public_path('uploads/avatar'),
            $tenFile
        );

        $nguoiDung->anh_dai_dien =
            'uploads/avatar/'.$tenFile;
    }

    $nguoiDung->save();

    return redirect()
        ->route('doitac.hoso.index')
        ->with(
            'success',
            'Cập nhật thông tin thành công.'
        );
}
}