<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/getitems', 'ProductController@getItems');
Route::post('/getitem', 'ProductController@getItem');
Route::post('/checkgameid','RestapiController@checkGameId');
Route::post('/payment/request','TransactionController@create');
Route::post('/payment/payment','PaymentController@payment');

Route::group(['middleware' => ['adminCookie']], function(){
	Route::post('/pegawai/get','Admin\PegawaiController@pegawaiGet');
	Route::post('/user/get','Admin\UserController@get');
	Route::post('/product/get','ProductController@product');
	Route::post('/deleteitem','ProductController@deleteItem');
	Route::get('/http/get','Admin\PageController@getHttp');
});