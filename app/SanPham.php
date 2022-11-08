<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SanPham extends Authenticatable
{
    use Notifiable;

	protected $primaryKey = 'MaSP';
    protected $table = 'sanpham'; 

     protected $fillable = [
        'MaSP', 'TenSP', 'DonGia','SLuongcon','img','Sluongban'
    ];
    public $timestamps = false;
}

