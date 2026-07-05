<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaDiemDuLich extends Model
{
    protected $table = 'dia_diem_du_lich';

    protected $primaryKey = 'ma_dia_diem_du_lich';

    protected $fillable = [
        'ma_dia_diem',
        'ten_dia_diem',
        'dia_chi',
        'vi_do',
        'kinh_do',
        'mo_ta'
    ];
    
    public function diaDiem()
    {
        return $this->belongsTo(
            DiaDiem::class,
            'ma_dia_diem',
            'ma_dia_diem'
        );
    }

    public function hinhAnhs()
    {
        return $this->hasMany(
            HinhAnhDiaDiemDuLich::class,
            'ma_dia_diem_du_lich',
            'ma_dia_diem_du_lich'
        );
    }

}