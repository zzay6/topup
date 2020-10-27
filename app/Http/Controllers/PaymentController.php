<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\TopupController; // This controller for Call Topup Functions
use Illuminate\Http\Request;
use Auth;
use App\Models\Transactions;
use App\Models\Produk;
use App\Models\Items;
use App\Models\Aktifity;
use App\Models\Voucher;
use AktifityLog;

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
    			'status' => 'failed',
    			'message' => 'Voucher tidak di temukan'
    		]);

    		return response($response);
    	} else {

            if($voucher->first()->saldo < $transaction->first()->harga){
                $response = json_encode([
                    'status' => 'failed',
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

                $log = new AktifityController;
                $log->create('Payment',$transactionGet->order_id);

                $transactionGet->update(['kode' => $req->voucher]);

                $topup = new TopupController;
                return $topup->SendRequest($transactionGet->order_id);
            }

    	}
    }
}