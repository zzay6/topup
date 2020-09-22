<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'item';
    protected $guarded = ['id','created_at','updated_at'];
}
