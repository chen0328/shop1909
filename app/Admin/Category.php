<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //指定表名
    protected $table = 'category';
    
    //指定主键
    protected $primaryKey = 'cate_id';
    
    //是否开启时间戳
    public $timestamps = false;
}
