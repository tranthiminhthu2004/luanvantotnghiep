<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThanhToan extends Model
{
    protected $table = 'thanh_toan';

    protected $primaryKey = 'ma_thanh_toan';

    public $timestamps = false;

    protected $fillable = [

        'ma_don_dat_phong',

        'so_tien',

        'phuong_thuc_thanh_toan',

        'trang_thai_thanh_toan',

        'ma_giao_dich',

        'ngay_thanh_toan'
    ];

    public function datPhong()
    {
        return $this->belongsTo(
            DatPhong::class,
            'ma_don_dat_phong',
            'ma_don_dat_phong'
        );
    }
}