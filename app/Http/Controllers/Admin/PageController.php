<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pegawai;
use App\User;

class PageController extends Controller
{
    public function dashboard()
    {
    	$user = User::count();
    	$pegawai = Pegawai::count();
    	$product = Produk::count();


    	return view('admin.dashboard', compact(['user','product','pegawai']));
    }

    public function pegawai()
    {
    	return view('admin.pegawai');
    }
}
