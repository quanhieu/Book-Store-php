<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', [
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('category', [
	'as'=>'all',
	'uses'=>'PageController@getAll'
]);

Route::get('category/low', [
	'as'=>'low',
	'uses'=>'PageController@getLow'
]);
Route::get('category/up', [
	'as'=>'up',
	'uses'=>'PageController@getUp'
]);
Route::get('category/abc', [
	'as'=>'abc',
	'uses'=>'PageController@getAbc'
]);
Route::get('category/zyx', [
	'as'=>'zyx',
	'uses'=>'PageController@getZyx'
]);
Route::get('category/latest', [
	'as'=>'latest',
	'uses'=>'PageController@getLatest'
]);
Route::get('category/popular', [
	'as'=>'popular',
	'uses'=>'PageController@getPopular'
]);

Route::get('category/{type}', [
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('categoryDetail/{id}', [
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);

// Route::get('categoryDetail/{id}', [
// 	'as'=>'comment',
// 	'uses'=>'PageController@getComment'
// ]);
Route::post('categoryDetail/{id}', [
	'as'=>'comment',
	'uses'=>'PageController@postComment'
]);


Route::get('contact', [
	'as'=>'lienhe',
	'uses'=>'PageController@getLienhe'
]);

Route::get('about', [
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioithieu'
]);

Route::get('addtocart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('delcart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);

Route::get('checkout',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('checkout',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('login',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);

Route::post('login',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('signin',[
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);

Route::post('signin',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);

Route::get('logout',[
	'as'=>'logout',
	'uses'=>'PageController@getLogout'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);

Route::post('mail',[
	'as'=>'mail',
	'uses'=>'PageController@postMail'
]);

