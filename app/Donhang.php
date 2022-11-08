<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    protected $primaryKey = 'MaDH';
    protected $table = 'donhang'; 
    public $timestamps = false;
     protected $fillable = [
        'MaDH', 'TenKH', 'NgDat','Tongtien','TinhTrang',
    ];
     
}
