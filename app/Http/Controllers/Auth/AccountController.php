<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Models\Transactions;

class AccountController extends Controller
{
    public function update(Request $request)
    {

    	Transactions::where([
    		'email' => Auth::user()->email
    	])->update([
    		'email' => $request->email
    	]);

    	User::where([
    		'email' => Auth::user()->email
    	])->update([
    		'name' => $request->name,
    		'email' => $request->email
    	]);

    	return redirect('/account');
    }
}
