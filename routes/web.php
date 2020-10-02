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


Route::post('/register','AuthController@register');
Route::get('/register','PageController@register')->name('register');
Route::post('/login','AuthController@login');
Route::get('/login','PageController@login')->name('login');
Route::get('/', 'PageController@home');
Route::get('/search','PageController@search');
Route::get('/games/{nama}','PageController@show');
Route::get('/payment/{type}/{order_id}','PageController@payment');

Route::group(['middleware' => 'auth'], function(){
	Route::post('/logout','AuthController@logout')->name('logout');
	Route::post('/transaction/delete/{id}','TransactionController@delete');
	Route::get('/transaction','PageController@transaction');
	Route::post('/account','AccountController@update');
	Route::get('/account','PageController@account');
});

Route::get('/admin/dashboard','Admin\PageController@dashboard');
Route::get('/admin/pegawai','Admin\PageController@pegawai');