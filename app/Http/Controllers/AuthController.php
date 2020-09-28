<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\User;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'level' => 'User',
            'password' => bcrypt($req->password)
        ]);

        return redirect('/login');
    }


    public function login(Request $req)
    {
    	if(Auth::attempt($req->only('email','password'))){
            setcookie('tpyidzcy',Auth::user()->id);
            setcookie('tpynvam', hash('sha256',Auth::user()->email));
    		return redirect('/');
        }
    }


    public function logout(Request $req)
    {
    	Auth::logout();
        setcookie('tpyidzcy','');
        setcookie('tpynvam','');
        return redirect('/');
    }
}