<?php

namespace App\Models;
use App\Models\LoaiPhong;
use Illuminate\Database\Eloquent\Model;


class KhachSan extends Model
{
    protected $table = 'khach_san';

    protected $primaryKey = 'ma_khach_san';

    public $timestamps = false;

    protected $fillable = [
        'ten_khach_san',
        'dia_chi',
        'thanh_pho',
        'vi_do',
        'kinh_do',
        'so_sao_khach_san',
        'mo_ta',
        'so_dien_thoai',
        'email',
        'trang_thai'
    ];
    public function hinhAnh()
{
    return $this->hasMany(
        HinhAnhKhachSan::class,
        'ma_khach_san',
        'ma_khach_san'
    );
}
public function loaiPhong()
{
    return $this->hasMany(
        LoaiPhong::class,
        'ma_khach_san',
        'ma_khach_san'
    );
}
public function tienNghis()
{
    return $this->belongsToMany(
        TienNghi::class,
        'khach_san_tien_nghi',
        'ma_khach_san',
        'ma_tien_nghi'
    );
}
}