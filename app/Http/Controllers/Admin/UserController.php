<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pegawai;
use App\Models\Aktifity;
use App\User;

class UserController extends Controller
{
    public function view($user)
    {
    	$user = User::where('hash',$user)->first();
    	return view('admin.user-view', compact(['user']));
    }


    public function delete($user)
    {
    	$data = User::where('hash',$user);
        if($data->first('status')->status === 'Active'){
            $data->update([
                'status' => 'non Active'
            ]);
        } else {
            $data->update([
                'status' => 'Active'
            ]);
        }


    	return redirect('/admin/user');
    }


    public function get(Request $req)
    {
        if(!$level == 'Admin'){
            return false;
        }
        
        if(empty($req->key)){
            $data = User::orderBy('id','desc')->get();
            return response($data);
        } else {
            $data = User::where('name','LIKE','%'.$req->key.'%')->orderBy('id','desc')->get();
            return response($data);
        }
    }
}
