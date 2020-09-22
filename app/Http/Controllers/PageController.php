<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Produk;

class PageController extends Controller
{
    public function home()
    {
        $produk = Produk::all();
        return view('index', compact('produk'));
    }


    public function search(Request $req)
    {
    	if(empty($req->q)){
    		return view('search', ['result' => Produk::all()]);
    	}
    	$result = Produk::where('nama','LIKE','%'.$req->q.'%')->get();
    	if($result->isEmpty()){
    		return view('search', ['noresult' => 'Produk tidak di temukan']);
    	} else {
    		return view('search', compact('result'));
    	}
    }
}