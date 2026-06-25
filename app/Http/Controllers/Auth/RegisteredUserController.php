<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\NguoiDung;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register'); //view => load resources/views + đường dẫn bên trong
        //load resources/views/auth/register.blade.php
    }

    public function store(Request $request): RedirectResponse
    {
       $request->validate([
    'name' => [
        'required',
        'string',
        'max:255',
        'regex:/^[\pL\s]+$/u'
    ],

    'email' => [
        'required',
        'string',
        'lowercase',
        'email',
        'max:255',
        'unique:nguoi_dung,email'
    ],

    'password' => [
        'required',
        'confirmed',
        Rules\Password::defaults()
    ],

], [
    'name.regex' => 'Họ và tên chỉ được chứa chữ cái và khoảng trắng.',
    'email.unique' => 'Email đã tồn tại.',
    'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
]);

        $fullName = trim($request->name);

        $nameParts = explode(' ', $fullName);

        $ten = array_pop($nameParts);

        $hoVaTenDem = implode(' ', $nameParts);

        $user = NguoiDung::create([
            'ho_va_ten_dem' => $hoVaTenDem,
            'ten' => $ten,
            'email' => $request->email,
            'mat_khau' => Hash::make($request->password),
            'ma_vai_tro' => 2,
            'trang_thai' => 1,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('users.index');
    }
}