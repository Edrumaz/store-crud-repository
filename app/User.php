<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Authenticatable 
{    
    protected $fillable = [
        'name',
        'telephone',
        'date_of_birth',
        'username',
        'email',
        'password'
    ];
}
