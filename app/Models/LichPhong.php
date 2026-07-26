<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LichPhong extends Model
{
    protected $table = 'lich_phong';

    protected $primaryKey = 'ma_lich_phong';

    public $timestamps = false;

   protected $fillable = [
    'ma_don_dat_phong',
    'ma_phong',
    'ngay',
    'trang_thai'
];

    public function phong()
    {
        return $this->belongsTo(
            Phong::class,
            'ma_phong',
            'ma_phong'
        );
    }

    public function datPhong()
{
    return $this->belongsTo(
        DatPhong::class,
        'ma_don_dat_phong',
        'ma_don_dat_phong'
    );
}
}