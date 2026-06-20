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
    public function hinhAnh()
{
    return $this->hasMany(
        HinhAnhLoaiPhong::class,
        'ma_loai_phong',
        'ma_loai_phong'
    );
}
    public function phongs()
{
    return $this->hasMany(
        Phong::class,
        'ma_loai_phong',
        'ma_loai_phong'
    );
}
public function tienNghis()
{
    return $this->belongsToMany(
        TienNghi::class,
        'loai_phong_tien_nghi',
        'ma_loai_phong',
        'ma_tien_nghi'
    );
}
public function lichPhongs()
{
    return $this->hasMany(
        LichPhong::class,
        'ma_phong',
        'ma_phong'
    );
}
   
}