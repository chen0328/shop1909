<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    protected $table = 'login';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
