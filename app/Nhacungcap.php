<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Nhacungcap extends Authenticatable
{
    use Notifiable;


    protected $table = 'nhacungcap'; 

    
    public $timestamps = false;
}

