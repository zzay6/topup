<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;

class TransactionController extends Controller
{
    public function delete($id)
    {
    	Transactions::where('order_id',$id)->delete();
    	return redirect('/transaction');
    }
}
