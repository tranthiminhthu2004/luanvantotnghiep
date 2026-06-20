<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietDatPhong extends Model
{
    protected $table = 'chi_tiet_dat_phong';
    
    protected $primaryKey = null;

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [

        'ma_don_dat_phong',

        'ma_loai_phong',
        
        'so_luong_phong',

        'gia_dat_thuc_te',

        'so_dem',

        'thanh_tien'
    ];

    public function datPhong()
    {
        return $this->belongsTo(
            DatPhong::class,
            'ma_don_dat_phong',
            'ma_don_dat_phong'
        );
    }

    public function loaiPhong()
{
    return $this->belongsTo(
        LoaiPhong::class,
        'ma_loai_phong',
        'ma_loai_phong'
    );
}

}