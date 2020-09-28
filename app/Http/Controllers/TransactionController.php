<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Transactions;

class TransactionController extends Controller
{
	public function create(Request $req)
	{
		$item = Items::where('id',$req->item)->first();
    	$product = Produk::where('pulsa_op',$item->pulsa_op)->first();

    	$transaction = Transactions::max('id');

    	$transactionId = 'XX'.sprintf('%08s', $transaction + 1);


    	Transactions::create([
    		'order_id' => $transactionId,
    		'email' => $req->email,
    		'provider' => $product->nama,
    		'player_id' => $req->player_id,
    		'player_zona' => $req->player_zona,
    		'nickname' => $req->nickname,
    		'pulsa_code' => $item->pulsa_code,
    		'nominal' => $item->pulsa_nominal,
    		'harga' => $item->pulsa_price,
    		'pembayaran' => $req->payment,
    		'status' => 'pendding'
    	]);

    	$url = [
    		'url' => url('/payment/voucher').'/'.$transactionId
    	];
    	return response($url);
	}


    public function index(Request $req)
    {
        return $req;
    }


    public function delete($id)
    {
    	Transactions::where('order_id',$id)->delete();
    	return redirect('/transaction');
    }
}
