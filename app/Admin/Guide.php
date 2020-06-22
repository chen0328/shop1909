<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    
//指定表名
protected $table = 'guide';
 
//指定主键
protected $primaryKey = 'id';
 
//是否开启时间戳
public $timestamps = false;
}
