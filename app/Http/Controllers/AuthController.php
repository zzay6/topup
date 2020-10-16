<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\User;
use App\Models\Aktifity;
use App\Models\Cookie;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        if(User::where('email',$req->email)->count() > 0){
            return redirect('/register')->with('failed','Alamat email telah terdaftar, Harap gunakan alamat email lain');
        }
        User::create([
            'hash' => md5($req->email).md5($req->password),
            'name' => $req->name,
            'email' => $req->email,
            'level' => 'User',
            'roll' => 'User',
            'password' => bcrypt($req->password),
            'status' => 'Active'
        ]);

        Cookie::create([
            'cookie' => hash('sha256', $req->email),
            'email' => $req->email
        ]);

        Aktifity::create([
            'subjek' => 'Pengguna baru',
            'object' => $req->email,
            'content' => 'Telah mendaftar'
        ]);

        return redirect('/login');
    }


    public function login(Request $req)
    {
    	if(Auth::attempt($req->only('email','password'))){

            $cookie = Cookie::where('email',Auth::user()->email)->first();
            setcookie('zvcaytpy', $cookie->cookie);

            
    		return redirect('/');
        }

        return redirect('/login')->with('failed','Email ata password salah, harap coba lagi');
    }


    public function logout(Request $req)
    {
    	Auth::logout();
        setcookie('zvcaytpy','');
        return redirect('/');
    }
}