<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aktifity extends Model
{
    protected $table = 'aktivity';
    protected $guarded = ['id','created_at','updated_at'];
}
