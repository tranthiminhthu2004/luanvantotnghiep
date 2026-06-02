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
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:nguoidung,email'],
            'password' => ['required', Rules\Password::defaults()],
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
            'ma_vai_tro' => 1,
            'trang_thai' => 1,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}