<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Produk;
use App\Models\Items;

class PaymentController extends Controller
{
	// Handle payment request from user
    public function paymentRequest(Request $req){
    	$item = Items::where('id',$req->item)->first();
    	$product = Produk::where('pulsa_op',$item->pulsa_op)->first();

    	$transaction = Transactions::max('id');

    	$transactionId = 'TY'.sprintf('%08s', $transaction + 1);
    	$transaction = ['transaction id' => $transactionId];
    	return response($transaction);
    }
}
