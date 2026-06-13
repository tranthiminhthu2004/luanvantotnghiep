<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HinhAnhKhachSan extends Model
{
    protected $table = 'hinh_anh_khach_san';

    protected $primaryKey = 'ma_hinh_anh_khach_san';

    public $timestamps = false;

    protected $fillable = [
        'ma_khach_san',
        'duong_dan_anh'
    ];

    public function khachSan()
    {
        return $this->belongsTo(
            KhachSan::class,
            'ma_khach_san',
            'ma_khach_san'
        );
    }
}