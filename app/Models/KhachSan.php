<?php

namespace App\Models;

use App\Models\DiaDiem;
use App\Models\LoaiPhong;
use App\Models\NguoiDung;
use Illuminate\Database\Eloquent\Model;

class KhachSan extends Model
{
    protected $table = 'khach_san';

    protected $primaryKey = 'ma_khach_san';

    public $timestamps = false;

    protected $fillable = [
        'ma_nguoi_dung',
        'ten_khach_san',
        'dia_chi',
        'ma_dia_diem',
        'vi_do',
        'kinh_do',
        'so_sao_khach_san',
        'mo_ta',
        'so_dien_thoai',
        'email',
        'trang_thai',
        'trang_thai_duyet',
        'ly_do_tu_choi',
        'ngay_gui_duyet',
        'ngay_duyet',
        'gio_check_in',
        'gio_check_out',
        'so_gio_huy_mien_phi',
    ];
    protected function casts(): array
{
    return [

        'ngay_gui_duyet' => 'datetime',

        'ngay_duyet' => 'datetime',

    ];
}

    public function nguoiDung()
    {
        return $this->belongsTo(
            NguoiDung::class,
            'ma_nguoi_dung',
            'ma_nguoi_dung'
        );
    }

    public function hinhAnh()
    {
        return $this->hasMany(
            HinhAnhKhachSan::class,
            'ma_khach_san',
            'ma_khach_san'
        );
    }

    public function loaiPhongs()
    {
        return $this->hasMany(
            LoaiPhong::class,
            'ma_khach_san',
            'ma_khach_san'
        );
    }

    public function tienNghis()
    {
        return $this->belongsToMany(
            TienNghi::class,
            'khach_san_tien_nghi',
            'ma_khach_san',
            'ma_tien_nghi'
        );
    }

    public function diaDiem()
    {
        return $this->belongsTo(
            DiaDiem::class,
            'ma_dia_diem',
            'ma_dia_diem'
        );
    }

    public function datPhongs()
    {
        return $this->hasMany(
            DatPhong::class,
            'ma_khach_san',
            'ma_khach_san'
        );
    }
}