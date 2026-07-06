<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhuCauDuLich extends Model
{
    protected $table = 'nhu_cau_du_lich';

    protected $primaryKey = 'ma_nhu_cau';

    public $timestamps = false;

    protected $fillable = [
        'ten_nhu_cau',
        'mo_ta'
    ];

    public function nguoiDungNhuCaus()
    {
        return $this->hasMany(
            NguoiDungNhuCau::class,
            'ma_nhu_cau',
            'ma_nhu_cau'
        );
    }

    public function diaDiemNhuCaus()
    {
        return $this->hasMany(
            DiaDiemNhuCauDuLich::class,
            'ma_nhu_cau',
            'ma_nhu_cau'
        );
    }

    public function diaDiems()
    {
        return $this->belongsToMany(
            DiaDiem::class,
            'dia_diem_nhu_cau_du_lich',
            'ma_nhu_cau',
            'ma_dia_diem'
        )->withPivot('muc_do_phu_hop');
    }
}