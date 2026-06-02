<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = NguoiDung::where('email', $googleUser->getEmail())->first();

        if (!$user) { 
            $fullName = trim($googleUser->getName()); 
            $nameParts = explode(' ', $fullName); 
            $ten = array_pop($nameParts); 
            $hoVaTenDem = implode(' ', $nameParts); 
            $user = NguoiDung::create([ 
                'ho_va_ten_dem' => $hoVaTenDem, 
                'ten' => $ten, 
                'email' => $googleUser->getEmail(), 
                'mat_khau' => bcrypt(uniqid()), 
                'ma_google' => $googleUser->getId(), 
                'ma_vai_tro' => 4, 
                'trang_thai' => 1, 
            ]); 
        }

        Auth::login($user);
        if ($user->ma_vai_tro == 4) {
            return redirect()->intended('/admin/dashboard');
        }
        return redirect('/');
    }
}