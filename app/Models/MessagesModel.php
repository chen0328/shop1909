<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessagesModel extends Model
{
    protected $table = 'messages';
    protected $primaryKey='msg_id';
    public $timestamps = false;
}
