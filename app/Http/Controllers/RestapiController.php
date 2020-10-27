<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestapiController extends Controller
{
    public function checkGameId(Request $req)
    {
    	$response = [
    		'player_id' => $req->player_id,
    		'nickname' => 'TopupYukGames'
    	];

    	$response = json_encode($response);
    	return response($response);
    }


    public function callback(Request $req)
    {
    	$data = json_encode($req->data);
    	$data = json_decode($data, true);

    	$transaction = Transactions::where('order_id',$data['ref_id']);
    	$transaction->update([
    		'status' => $data['message']
    	]);


    	if ($data['status'] == 2) {
    		$kode = $transaction->first()->kode;
    		$voucher = Voucher::where('voucher',$kode);

    		$balance = $transaction->first()->harga + $voucher->first()->saldo;

    		$voucher->update([
    			'saldo' => $balance
    		]);
    	}

    	$log = new AktifityController;
        $log->create('success',$data['ref_id']); 
    }
}