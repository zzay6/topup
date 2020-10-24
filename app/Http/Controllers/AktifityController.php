<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aktifity;

class AktifityController extends Controller
{
    public function create($to, $object)
    {


    	if($to == 'New Order'){
    		$message = 'Selamat, Terdapat transaksi baru';
    		$subject = 'Transaksi baru';
    	} else if($to == 'Payment'){
    		$message = 'Pembayaran telah di lakukan';
    		$subject = 'Pembayaran';
    	}  else if($to == 'New User'){
    		$message = 'Transaksi berhasil dilakukan';
    		$subject = 'Transaksi berhasil';
    	}

    	Aktifity::create([
            'subjek' => $subject,
            'object' => $object,
            'content' => $message
        ]);
    }
}
