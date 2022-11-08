<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taikhoan extends Model
{
    protected $primaryKey = 'MaND';
    protected $table = 'nguoidung'; 
protected $fillable = [
        'HoTen', 'level', 
    ];
     
}
