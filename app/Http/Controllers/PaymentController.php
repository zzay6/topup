<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Transactions;
use App\Models\Produk;
use App\Models\Items;
use App\Models\Aktifity;
use App\Models\Voucher;

class PaymentController extends Controller
{
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

                Aktifity::create([
                    'subjek' => 'Transaksi berhasil',
                    'object' => $transactionGet->order_id,
                    'content' => 'Transaksi selesai'
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