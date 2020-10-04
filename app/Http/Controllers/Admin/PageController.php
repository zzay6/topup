<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pegawai;
use App\Models\Aktifity;
use App\User;

class PageController extends Controller
{
    public function dashboard()
    {
    	$user = User::count();
    	$pegawai = Pegawai::where('status','Confirmed')->count();
    	$product = Produk::count();
        $aktifity = Aktifity::all();


    	return view('admin.dashboard', compact(['user','product','pegawai','aktifity']));
    }

    public function pegawai()
    {
    	$pegawai = Pegawai::orderBy('id','desc')->get();
    	return view('admin.pegawai', compact(['pegawai']));
    }


    public function user()
    {
        $user = User::all();
        return view('admin.user', compact(['user']));
    }
}
