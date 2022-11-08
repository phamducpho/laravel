<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class  Loaihang extends Authenticatable
{
    use Notifiable;


    protected $table = 'loaihang'; 
protected $primaryKey = 'MaLoai';

    
    public $timestamps = false;
}

