<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    protected $table = 'phong';

    protected $primaryKey = 'ma_phong';

    public $timestamps = false;

    protected $fillable = [
        'ma_loai_phong',
        'so_phong',
        'tang',
        'trang_thai_phong'
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