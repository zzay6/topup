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

    	json_encode($response);
    	return response($response);
    }
}
