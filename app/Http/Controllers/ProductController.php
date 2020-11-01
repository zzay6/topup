<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use \App\Models\Produk;
use \App\Models\Items;
use \App\Models\Logs;
use \App\Models\Transactions;
use \App\User;

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
            'developer' => 'required'
        ]);


        $img = $req->product_image;
        $ext = ['PNG','JPG','JPEG','jpeg','jpg','png'];

        if(!in_array($img->extension(), $ext)){
            return redirect('admin/product')->with('gagal','Ekstensi gambar tidak valid');
        }

        $imgName = hash('sha256', uniqid()).'.'.$img->extension();
        $img->storeAs('public/products_img/',$imgName);

        Produk::create([
            'gambar' => $imgName,
            'nama' => $req->product_name,
            'developer' => $req->developer,
            'pulsa_op' => $req->product_code,
            'visitor' => 0
        ]);

        if (!empty($req->item_name)) {
            foreach ($req->item_name as $i => $x) {
                Items::create([
                    'pulsa_op' => $req->product_code,
                    'pulsa_code' => $req->item_code[$i],
                    'pulsa_price'=> $req->item_price[$i],
                    'pulsa_nominal' => $x
                ]);
            }
        }

        return redirect('admin/product')->with('success','Produk berhasil ditambahkan');
    }


    public function view($id)
    {
        $url = url('games/'.$id);
        
        $product = Produk::where('pulsa_op',$id)->first();
        $productName = $product->nama;
        
        $selled = Transactions::where([
            'provider' => $productName,
            'status' => 'success'
        ])->count();

        $items = Items::where('pulsa_op',$id)->get();

        return view('admin.product-view', compact(['product','selled','items']));
    }


    public function delete(Request $req,$product)
    {
        Produk::where('pulsa_op',$product)->delete();
        return redirect('admin/product');
    }


    public function updateitem(Request $req, $id)
    {
        Items::where([
            'id' => $id
        ])->update([
            'pulsa_code' => $req->item_code,
            'pulsa_price' => $req->item_price,
            'pulsa_nominal' => $req->item_nominal
        ]);

        return redirect(url()->previous());
    }


    public function deleteitem(Request $req)
    {
        if(!$level == 'Admin'){
            return false;
        }

        Items::where([
            'id' => $req->item
        ])->delete();

        return response(json_encode([
            'status' => 'Item berhasil di hapus'
        ]));
    }
}