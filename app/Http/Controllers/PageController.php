<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Items;
use App\Models\Transactions;
use App\User;
use Illuminate\Support\Facades\Cookie;
use Auth;

class PageController extends Controller
{
    public function register(Request $req)
    {
        if(Auth::check()){
            return redirect('/');
        }
        return view('auth.register');
    }


    public function login()
    {
        if(Auth::check()){
            return redirect('/');
        }
        return view('auth.login');
    } 


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

    	if( $result->isEmpty() ){
    		return view('search', ['noresult' => 'Produk tidak di temukan']);
    	} else {
    		return view('search', ['result' => $result]);
    	}
    }


    public function show($nama)
    {
        $visitor = Produk::where('pulsa_op',$nama)->first('visitor')->visitor;
        $visitor = $visitor + 1;

        Produk::where('pulsa_op',$nama)->update([
            'visitor' => $visitor
        ]);

        $produk = Produk::where('pulsa_op',$nama)->first();
        return view('view', ['produk' => $produk]);
    }


    public function payment($type, $order_id)
    {
        $data = Transactions::where([
            'order_id' => $order_id,
            'status' => 'pendding'
        ])->firstOrFail();


        if($type = 'voucher'){
            return view('payment.voucher', ['data' => $data]);
        }
    }


    public function transaction()
    {

        $last = Transactions::where('auth',Auth::user()->id)->orderBy('id','desc')->take(3)->get();
        $trans = Transactions::where('auth',Auth::user()->id)->get();
        return view('transaction', compact(['last','trans']));
    }


    public function account()
    {
        $transactions = Transactions::where(['email' => Auth::user()->email])->count();
        $success = Transactions::where(['email' => Auth::user()->email,'status' => 'success'])->count();
        $pendding = Transactions::where(['email' => Auth::user()->email, 'status' => 'pendding'])->count();
        $failed = Transactions::where(['email' => Auth::user()->email,'status' => 'failed'])->count();
        return view('account', [
            'transactions' => $transactions,
            'success' => $success,
            'pendding' => $pendding,
            'failed' => $failed
        ]);
    }
}