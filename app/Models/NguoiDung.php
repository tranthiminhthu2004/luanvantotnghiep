<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class NguoiDung extends Authenticatable
{
    use Notifiable;

    protected $table = 'nguoi_dung';

    protected $primaryKey = 'ma_nguoi_dung';

    public $timestamps = false;

    protected $fillable = [
        'ho_va_ten_dem',
        'ten',
        'email',
        'mat_khau',
        'ma_google',
        'ma_vai_tro',
        'trang_thai',
        'anh_dai_dien',
        'so_dien_thoai',
        'gioi_tinh',
        'ngay_sinh'
    ];

    protected $hidden = [
        'mat_khau',
        'remember_token',

    ];

    public function getAuthPassword()
    {
        return $this->mat_khau;
    }
}