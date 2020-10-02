<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Produk;

class PageController extends Controller
{
    public function dashboard()
    {
    	$user = User::count();
    	$product = Produk::count();


    	return view('admin.dashboard', compact(['user','product']));
    }
}
