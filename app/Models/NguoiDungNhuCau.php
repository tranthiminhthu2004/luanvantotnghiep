<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiDungNhuCau extends Model
{
    protected $table = 'nguoi_dung_nhu_cau';

    public $timestamps = false;

    protected $fillable = [
        'ma_nguoi_dung',
        'ma_nhu_cau',
        'muc_do_uu_tien'
    ];

    public function nguoiDung()
    {
        return $this->belongsTo(
            NguoiDung::class,
            'ma_nguoi_dung',
            'ma_nguoi_dung'
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