<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaDiemNhuCauDuLich extends Model
{
    protected $table = 'dia_diem_nhu_cau_du_lich';

    public $timestamps = false;

    protected $fillable = [
        'ma_dia_diem',
        'ma_nhu_cau',
        'muc_do_phu_hop'
    ];

    public function diaDiem()
    {
        return $this->belongsTo(
            DiaDiem::class,
            'ma_dia_diem',
            'ma_dia_diem'
        );
    }

    public function nhuCau()
    {
        return $this->belongsTo(
            NhuCauDuLich::class,
            'ma_nhu_cau',
            'ma_nhu_cau'
        );
    }
}