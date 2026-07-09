<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DatPhong extends Model
{
    protected $table = 'dat_phong';

    protected $primaryKey = 'ma_don_dat_phong';

    public $timestamps = false;

    protected $fillable = [
        'ma_dat_phong',    

        'ma_nguoi_dung',

        'ma_khach_san',

        'ho_va_ten_dem_khach',

        'ten_khach',

        'email_khach',

        'so_dien_thoai_khach',

        'ngay_nhan_phong',

        'ngay_tra_phong',

        'so_nguoi_truong_thanh',

        'so_tre_em',

        'so_nguoi_cao_tuoi',

        'tong_tien',

        'trang_thai_dat_phong',
        
        'ngay_dat' ,
        
        'ghi_chu'
        
    ];

    public function nguoiDung()
    {
        return $this->belongsTo(
            NguoiDung::class,
            'ma_nguoi_dung',
            'ma_nguoi_dung'
        );
    }

    public function khachSan()
    {
        return $this->belongsTo(
            KhachSan::class,
            'ma_khach_san',
            'ma_khach_san'
        );
    }

    public function chiTietDatPhong()
    {
        return $this->hasMany(
            ChiTietDatPhong::class,
            'ma_don_dat_phong',
            'ma_don_dat_phong'
        );
    }

    public function thanhToans()
    {
        return $this->hasMany(
            ThanhToan::class,
            'ma_don_dat_phong',
            'ma_don_dat_phong'
        );
    }
}