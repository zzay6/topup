<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Produk;

class PageController extends Controller
{
    public function home()
    {
        $produk = Produk::all();
        return view('index', compact('produk'));
    }
}
