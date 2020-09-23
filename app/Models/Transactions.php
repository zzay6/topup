<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transaksi';
    protected $guarded = ['id','created_at','updated_at'];
}
