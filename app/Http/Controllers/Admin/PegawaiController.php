<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function pegawaiPost(Request $req, $commands)
    {
    	if($commands === 'add') {
    		Pegawai::create([
    			'name' => $req->name,
    			'email' => $req->email,
    			'roll' => $req->roll,
    			'status' => 'Pendding'
    		]);
    	} else if ($commands === 'delete') {
    		Pegawai::where('id',$req->pegawai)->delete();
    	} else if ($commands === 'accept') {
    		pegawai::where('id',$req->pegawai)->update([
                'status' => 'Confirmed'
            ]);
    	}


    	return redirect(url('admin/pegawai'));
    }


    public function pegawaiGet(Request $req)
    {
    	if ($req->key == '') {
    		$pegawai = Pegawai::all();
    	} else {
    		$pegawai = Pegawai::where('name','LIKE','%'.$req->key.'%')->orderBy('id','desc')->get();
    	}
    	return response($pegawai);
    }
}