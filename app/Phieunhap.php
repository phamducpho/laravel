<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class phieunhap extends Authenticatable
{
    use Notifiable;
	protected $primaryKey = 'IdPN';

    protected $table = 'phieunhap'; 

    
    public $timestamps = false;
}

