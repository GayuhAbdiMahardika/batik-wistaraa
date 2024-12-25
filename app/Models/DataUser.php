<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class DataUser extends Authenticatable
{
    protected $table = 'data_user';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'email', 'password','role'];

    protected $hidden = ['password'];
}
