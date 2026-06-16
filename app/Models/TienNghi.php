<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TienNghi extends Model
{
    protected $table = 'tien_nghi';

    protected $primaryKey = 'ma_tien_nghi';

    public $timestamps = false;

    protected $fillable = [
        'ten_tien_nghi',
        'icon',
        'mo_ta',
        'trang_thai'
    ];
    public function khachSans()
{
    return $this->belongsToMany(
        KhachSan::class,
        'khach_san_tien_nghi',
        'ma_tien_nghi',
        'ma_khach_san'
    );
}

public function loaiPhongs()
{
    return $this->belongsToMany(
        LoaiPhong::class,
        'loai_phong_tien_nghi',
        'ma_tien_nghi',
        'ma_loai_phong'
    );
}
}