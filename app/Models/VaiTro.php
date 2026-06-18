<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaiTro extends Model
{
    protected $table = 'vai_tro';

    protected $primaryKey = 'ma_vai_tro';

    public $timestamps = false;

    protected $fillable = [
        'ten_vai_tro'
    ];

    public function nguoiDungs()
    {
        return $this->hasMany(
            NguoiDung::class,
            'ma_vai_tro',
            'ma_vai_tro'
        );
    }
}