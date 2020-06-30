<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoleModel extends Model
{
    protected $table='user_role';
    protected $primaryKey='id';
    public $timestamps = false;
}
