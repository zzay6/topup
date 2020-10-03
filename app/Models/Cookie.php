<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cookie extends Model
{
    protected $table = 'cookie';
    protected $guarded = ['id','created_at','updated_at'];
}
