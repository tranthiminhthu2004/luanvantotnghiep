<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiPhong extends Model
{
    protected $table = 'loai_phong';

    protected $primaryKey = 'ma_loai_phong';

    public $timestamps = false;

    protected $fillable = [
        'ma_khach_san',
        'ten_loai_phong',
        'mo_ta',
        'so_nguoi_toi_da',
        'dien_tich',
        'so_giuong',
        'gia_co_ban',
        'trang_thai'
    ];

    public function khachSan()
    {
        return $this->belongsTo(
            KhachSan::class,
            'ma_khach_san',
            'ma_khach_san'
        );
    }
   
}