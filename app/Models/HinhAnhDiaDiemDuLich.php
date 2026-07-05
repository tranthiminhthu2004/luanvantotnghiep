<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HinhAnhDiaDiemDuLich extends Model
{
    protected $table = 'hinh_anh_dia_diem_du_lich';

    protected $primaryKey = 'ma_hinh_anh_dia_diem';

    protected $fillable = [
        'ma_dia_diem_du_lich',
        'duong_dan_anh'
    ];

    public function diaDiemDuLich()
    {
        return $this->belongsTo(
            DiaDiemDuLich::class,
            'ma_dia_diem_du_lich',
            'ma_dia_diem_du_lich'
        );
    }
}