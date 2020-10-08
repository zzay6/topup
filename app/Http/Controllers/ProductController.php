<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Produk;
use \App\Models\Items;

class ProductController extends Controller
{
    public function getItems(Request $req)
    {
    	if($req->channel == 'voucher'){
    		return response(Items::where('pulsa_op',$req->product)->get());
    	}

    	if($req->channel == 'indomaret' or $req->channel == 'alfamart'){
    		$result = Items::where([
    			['pulsa_price','>=',50000],
    			['pulsa_op','=',$req->product]
    		])->get();
    		return response($result);
    	}
    }


    public function getItem(Request $req)
    {
    	return response(Items::where('id',$req->item)->get());
    }


    public function product(Request $req)
    {
        return Produk::where('nama','LIKE','%'.$req->key.'%')->orderBy('id','desc')->get();
    }

    public function add(Request $req)
    {
        return $req;
    }
}