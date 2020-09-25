<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'PageController@home');
Route::get('/search','PageController@search');
Route::get('/games/{nama}','PageController@show');
Route::get('/payment/{type}/{order_id}','PageController@payment');
Route::post('/transaction/delete/{id}','TransactionController@delete');
Route::get('/transaction','PageController@transaction');

Route::group(['middleware' => 'auth'], function(){
	Route::get('/account','PageController@account');
});