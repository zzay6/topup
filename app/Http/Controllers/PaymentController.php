<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Produk;
use App\Models\Items;
use App\Models\Voucher;
use Auth;

class PaymentController extends Controller
{
	// Handle payment request from user
    public function paymentRequest(Request $req)
    {
    	$item = Items::where('id',$req->item)->first();
    	$product = Produk::where('pulsa_op',$item->pulsa_op)->first();

    	$transaction = Transactions::max('id');

    	$transactionId = 'TY'.sprintf('%08s', $transaction + 1);

        if(Auth::user()){
            $email = Auth::user()->email;
        } else {
            $email = 'zacky29gaming@gmail.com';
        }
    	
    	Transactions::create([
    		'order_id' => $transactionId,
    		'email' => $email,
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


    public function payment(Request $req)
    {
        if(empty($req->voucher)) {
            return false;
        }

    	$voucher = Voucher::where('voucher',$req->voucher);
    	$transaction = Transactions::where('order_id',$req->order_id);

    	if($voucher->doesntExist()){
    		$response = json_encode([
    			'status' => 'Gagal',
    			'message' => 'Voucher tidak di temukan'
    		]);

    		return response($response);
    	} else {

            if($voucher->first()->saldo < $transaction->first()->harga){
                $response = json_encode([
                    'status' => 'Gagal',
                    'message' => 'Saldo voucher tidak mencukupi'
                ]);

                return response($response);
            } else {

        		$transactionGet = $transaction->first();
        		$voucherGet = $voucher->first();
        		
        		$balance = $voucherGet->saldo - $transactionGet->harga;

        		$voucher->update([
        			'saldo' => $balance
        		]);

        		$transaction->update([
        			'status' => 'success'
        		]);

        		$response = [
            	   	'status' => 'Berhasil',
            	   	'data' => [
                        'provider' => $transactionGet->provider,
            	    	'item' => $transactionGet->nominal,
            	    	'harga' => $transactionGet->harga,
            	    	'nickname' => $transactionGet->nickname,
            	    	'saldo_voucher' => $balance
            	    ],
            	    'message' => 'Transaksi berhasil'
            	];

        		return response(json_encode($response));
            }

    	}
    }
}