<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsModel extends Model
{
    protected $table = 'details';
    protected $primaryKey = 'details_id';
    public $timestamps = false;
}
