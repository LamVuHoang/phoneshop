<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamModel extends Model
{
    protected $table = 'san_pham';
    protected $primaryKey = 'ma_san_pham';

    public function BangSanPham()
    {
        return $this->belongsTo('App\Models\ThuongHieuModel', 'ma_thuong_hieu', 'ma_thuong_hieu');
    }
}
