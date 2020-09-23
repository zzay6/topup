<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table = 'logs';
    protected $guarded = ['id','created_at','updated_at'];
}
