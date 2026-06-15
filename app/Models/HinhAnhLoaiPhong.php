<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HinhAnhLoaiPhong extends Model
{
    protected $table = 'hinh_anh_loai_phong';

    protected $primaryKey = 'ma_hinh_anh_phong';
   
    public $timestamps = false;
     
    protected $fillable = [
        'ma_loai_phong',
        'duong_dan_anh'
    ];

    public function loaiPhong()
    {
        return $this->belongsTo(
            LoaiPhong::class,
            'ma_loai_phong',
            'ma_loai_phong'
        );
    }
}