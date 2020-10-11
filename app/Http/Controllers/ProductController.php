<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use \App\Models\Produk;
use \App\Models\Items;
use \App\Models\Logs;

class ProductController extends Controller
{
    public function getItems(Request $req)
    {
    	if($req->channel == 'voucher'){
    		return response(Items::where('pulsa_op',$req->product)->get());
    	}

    	if($req->channel == 'indomaret' or $req->channel == 'alfamart'){
    		$result = Items::where([
    			['pulsa_price','>=',50000],
    			['pulsa_op','=',$req->product]
    		])->get();
    		return response($result);
    	}
    }


    public function getItem(Request $req)
    {
    	return response(Items::where('id',$req->item)->get());
    }


    public function product(Request $req)
    {
        return Produk::where('nama','LIKE','%'.$req->key.'%')->orderBy('id','desc')->get();
    }

    public function add(Request $req)
    {

        $req->validate([
            'product_name' => 'required',
            'product_image' => 'required',
            'product_code' => 'required',
            'developer' => 'required',
            'item_name' => 'required',
            'item_code' => 'required',
            'item_price' => 'required'
        ]);


        $img = $req->product_image;
        $ext = ['PNG','JPG','JPEG','jpeg','jpg','png'];

        if(!in_array($img->extension(), $ext)){
            return redirect('admin/product')->with('gagal','Ekstensi gambar tidak valid');
        }

        $imgName = hash('sha256', uniqid()).'.'.$img->extension();
        $img->storeAs('public/images/products',$imgName);

        Produk::create([
            'gambar' => $imgName,
            'nama' => $req->product_name,
            'developer' => $req->developer,
            'pulsa_op' => $req->product_code
        ]);

        foreach ($req->item_name as $i => $x) {
            Items::create([
                'pulsa_op' => $req->product_code,
                'pulsa_code' => $req->item_code[$i],
                'pulsa_price'=> $req->item_price[$i],
                'pulsa_nominal' => $x
            ]);
        }

        return redirect('admin/product')->with('success','Produk berhasil ditambahkan');
    }


    public function view($id)
    {
        $url = url('').'/games/'.$id;
        
        $product = Produk::where('pulsa_op',$id)->first();
        $visitor = Logs::where('url',$url)->count();

        return view('admin.product-view', compact(['product','visitor']));
    }


    public function delete(Request $req,$product)
    {
        Produk::where('pulsa_op',$product)->delete();
        return redirect('admin/product');
    }
}