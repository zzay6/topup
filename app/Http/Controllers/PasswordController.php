<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use App\User;
use App\PasswordReset;
use App\Mail\SendLinkForResetPassword;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.passwords.email');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('email',$request->email);
        
        if($user->count() < 1 ){

            return response(json_encode([
                'status' => 'failed',
                'message' => 'Alamat e-mail tidak ditemukan, harap periksa kembali alamat email anda'
            ]));

        } else {

            $user = $user->first();
            $token = PasswordReset::where('email',$request->email)->first()->token;
            $url = url('/password/reset').'/'.$token;

            Mail::to($request->email)->send(new SendLinkForResetPassword($url, $user));

            return response(json_encode([
                'status' => 'success',
                'message' => 'Link berhasil dikirim melalui alamat e-mail anda'
            ]));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($token)
    {
        $token = PasswordReset::where('token',$token)->firstOrFail()->token;
        return view('auth.passwords.reset', compact(['token']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $token)
    {
        $email = PasswordReset::where('token',$token)->first('email')->email;
        User::where('email',$email)->update([
            'password' => bcrypt($request->password)
        ]);

        return response(json_encode([
            'status' => 'success',
            'message' => 'Kata sandi berhasil di ubah'
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
