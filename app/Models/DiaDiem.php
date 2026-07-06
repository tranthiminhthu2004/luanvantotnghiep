<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaDiem extends Model
{
    protected $table = 'dia_diem';

    protected $primaryKey = 'ma_dia_diem';

    public $timestamps = false;

    protected $fillable = [
        'ten_dia_diem'
    ];

    public function khachSans()
    {
        return $this->hasMany(
            KhachSan::class,
            'ma_dia_diem',
            'ma_dia_diem'
        );
    }

    public function diaDiemDuLichs()
    {
        return $this->hasMany(
            DiaDiemDuLich::class,
            'ma_dia_diem',
            'ma_dia_diem'
        );
    }

    public function nhuCaus()
    {
        return $this->belongsToMany(
            NhuCauDuLich::class,
            'dia_diem_nhu_cau_du_lich',
            'ma_dia_diem',
            'ma_nhu_cau'
        )->withPivot('muc_do_phu_hop');
    }

    public function diaDiemNhuCauDuLichs()
    {
        return $this->hasMany(
            DiaDiemNhuCauDuLich::class,
            'ma_dia_diem',
            'ma_dia_diem'
        );
    }
}