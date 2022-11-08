<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Chitietphieunhap extends Authenticatable
{
    use Notifiable;
	protected $primaryKey = 'MaSP';

    protected $table = 'ctphieunhap'; 

    
    public $timestamps = false;
}

