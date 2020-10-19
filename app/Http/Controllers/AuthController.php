<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\PasswordRests;
use App\Models\Aktifity;
use App\Models\Cookie;

class AuthController extends Controller
{
    public function register(Request $req)
    {

        if(User::where('email',$req->email)->count() > 0){
            
            return response(json_encode([
                'status' => 'failed',
                'message' => 'Alamat email telah terdaftar, harap gunakan alamat email lain'
            ]));

        } else {
        
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

            PasswordRests::create([
                'email' => $req->email,
                'token' => hash('sha256', $req->email).md5($req->password).md5($req->name)
            ]);

            Aktifity::create([
                'subjek' => 'Pengguna baru',
                'object' => $req->email,
                'content' => 'Telah mendaftar'
            ]);

            return response(json_encode([
                'status' => 'success',
                'message' => 'Pendaftaran berhasil'
            ]));

        }
    }


    public function login(Request $req)
    {
    	if(Auth::guard('web')->attempt(['email' => $req->email, 'password' => $req->password])){

            if (Auth::user()->status == 'non Active') {
                Auth::logout();
                return response(json_encode([
                    'status' => 'failed',
                    'message' => 'Akun anda telah di non aktifkan, periksa alamat email anda untuk mengetahui penyebab penonaktifan akun anda, untuk lebih lanjut hubungi bantuan via whatsapp 0896-3579-6590'
                ]));
            }

            $cookie = Cookie::where('email',Auth::user()->email)->first();
            setcookie('zvcaytpy', $cookie->cookie);


            return response(json_encode([
                'status' => 'success',
                'message' => 'Proses masuk berhasil'
            ]));
        }

        return response(json_encode([
            'status' => 'failed',
            'message' => 'Email atau kata sandi salah'
        ]));
    }


    public function logout(Request $req)
    {
    	Auth::logout();
        setcookie('zvcaytpy','');
        return redirect('/');
    }
}