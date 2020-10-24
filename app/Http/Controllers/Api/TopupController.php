<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Aktifity;
use App\Models\Voucher;
use AktifityLog;

class TopupController extends Controller
{
	public $apiKey = '4045f0deea502227';
	public $phoneNumbers = '089635796590';

    public function SendRequest($id)
    {
    	$apiKey = $this->apiKey;
    	$username = $this->phoneNumbers;

    	$order = Transactions::where('order_id',$id)->first();
    	$code = $order->pulsa_code;
    	$ref_id = $order->order_id;
    	$hp = $order->player_id;

    	$json = json_encode([
    		'commands' => 'topup',
    		'username' => $username,
    		'ref_id' => $ref_id,
    		'hp' => $hp,
    		'pulsa_code' => $code,
    		'sign' => md5($username.$apiKey.$ref_id)
    	]);

		$url = "https://testprepaid.mobilepulsa.net/v1/legacy/index";

		$ch  = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = json_decode(curl_exec($ch), 1);
		curl_close($ch);

		if($response['data']['status'] == 0 or $response['data']['status'] == 1){

			$data = json_encode([
				'status' => 'success',
				'message' => 'Transaksi berhasil dilakukan, Detail Transaksi akan dikirim melalui email'
			]);

		} else if($response['data']['status'] == 2){

			$data = json_encode([
				'status' => 'gagal',
				'message' => $response['data']['message']
			]);

		}

		Transactions::where('order_id',$id)->update([
			'status' => $response['data']['message']
		]);

		return response($data);
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
