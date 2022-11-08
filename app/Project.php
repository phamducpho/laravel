<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Project extends Authenticatable
{
    use Notifiable;


    protected $table = 'nhacungcap'; 

     protected $fillable = [
        'MaNhaCC', 'TennhaCC', 'SDT','Diachi'
    ];
    public $timestamps = false;
}

