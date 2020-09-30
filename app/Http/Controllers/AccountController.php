<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AccountController extends Controller
{
    public function update(Request $req)
    {
    	User::where('id',Auth::user()->id)->update([
    		'name' => $req->name,
    		'email' => $req->email
    	]);

    	return redirect('/account')->with('success','');
    }
}
