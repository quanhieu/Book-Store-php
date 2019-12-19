<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','FrontendController@getHome') ;

// Route::get('detail/{id}/{slug}.html','FrontendController@getDetail') ;

// Route::post('detail/{id}/{slug}.html','FrontendController@postComment') ;

// Route::get('category/{id}/{slug}.html','FrontendController@getCategory') ;

// Route::get('search','FrontendController@getSearch') ;

// Route::group(['prefix'=>'cart'], function(){
// 	Route::get('add/{id}','CartController@getAddCart') ;
// 	Route::get('show','CartController@getShowCart') ;
// 	Route::get('delete/{id}','CartController@getDeleteCart') ;
// 	Route::get('update','CartController@getUpdateCart') ;
// 	Route::post('show','CartController@postComplete') ;
// });

// Route::get('complete','CartController@getComplete') ;

Route::group(['namespace'=>'Admin'],function(){
	Route::group(['prefix'=>'login', 'middleware'=>'CheckLogedIn'],function(){
		Route::get('/','LoginController@getLogin');
		Route::post('/','LoginController@postLogin');

		
	});
		Route::get('logout','HomeController@getLogout');

		Route::group(['prefix'=>'admin', 'middleware'=>'CheckLogedOut'], function(){
			Route::get('home','HomeController@getHome');

			Route::group(['prefix'=>'category'], function(){
				// Route::get('/','CategoryController@getCate');

				Route::get('/','CategoryController@getCate');
				Route::post('/','CategoryController@postCate');


				Route::get('edit/{id}','CategoryController@getEditCate');
				Route::post('edit/{id}','CategoryController@postEditCate');

				Route::get('delete/{id}','CategoryController@getDeleteCate');

				Route::get('search','CategoryController@getSearch');
				// Route::get('search','CategoryController@postSearch');
			});

			//Product
			Route::group(['prefix'=>'product'], function(){
				Route::get('/','ProductController@getProduct');

				Route::get('add','ProductController@getAddProduct');
				Route::post('add','ProductController@postAddProduct');


				Route::get('edit/{id}','ProductController@getEditProduct');
				Route::post('edit/{id}','ProductController@postEditProduct');

				Route::get('delete/{id}','ProductController@getDeleteProduct');
			});
			//End Product

			//Slide
			Route::group(['prefix'=>'slide'], function(){

				Route::get('/','SlideController@getSlide');
				Route::post('/','SlideController@postSlide');


				Route::get('edit/{id}','SlideController@getEditSlide');
				Route::post('edit/{id}','SlideController@postEditSlide');

				Route::get('delete/{id}','SlideController@getDeleteSlide');
			});			
			// end slide

			//New
			Route::group(['prefix'=>'new'], function(){
				Route::get('/','NewController@getNew');

				Route::get('add','NewController@getAddNew');
				Route::post('add','NewController@postAddNew');


				Route::get('edit/{id}','NewController@getEditNew');
				Route::post('edit/{id}','NewController@postEditNew');

				Route::get('delete/{id}','NewController@getDeleteNew');
			});
			//End New

			// Customer
			Route::group(['prefix'=>'customer'], function(){
				Route::get('/','CustomerController@getCustomer');

				Route::get('add','CustomerController@getAddCustomer');
				Route::post('add','CustomerController@postAddCustomer');


				Route::get('edit/{id}','CustomerController@getEditCustomer');
				Route::post('edit/{id}','CustomerController@postEditCustomer');

				Route::get('delete/{id}','CustomerController@getDeleteCustomer');
			});

			// End customer

			// Bill
			Route::group(['prefix'=>'bill'], function(){
				Route::get('/','BillController@getBill');

				Route::get('add','BillController@getAddBill');
				Route::post('add','BillController@postAddBill');


				Route::get('edit/{id}','BillController@getEditBill');
				Route::post('edit/{id}','BillController@postEditBill');

				Route::get('delete/{id}','BillController@getDeleteBill');
			});

			// End bill

			// Bill detail
			Route::group(['prefix'=>'billdetail'], function(){
				Route::get('/','BillDetailController@getBillDetail');
				Route::get('daterange','BillDetailController@getBillDetailDateRange');

				Route::get('chart','BillDetailController@getChart');

				Route::get('add','BillDetailController@getAddBillDetail');
				Route::post('add','BillDetailController@postAddBillDetail');


				Route::get('edit/{id}','BillDetailController@getEditBillDetail');
				Route::post('edit/{id}','BillDetailController@postEditBillDetail');

				Route::get('delete/{id}','BillDetailController@getDeleteBillDetail');
			});

			// End bill detail

			Route::group(['prefix'=>'comment'], function(){

				Route::get('/','CommentController@getComment');
				Route::post('/','CommentController@postComment');


				Route::get('edit/{id}','CommentController@getEditComment');
				Route::post('edit/{id}','CommentController@postEditComment');

				Route::get('delete/{id}','CommentController@getDeleteComment');
			});

			// End bill comment

			Route::group(['prefix'=>'admin'], function(){

				Route::get('/','AdminController@getAdmin');
				Route::post('/','AdminController@postAdmin');

				Route::get('edit/{id}','AdminController@getEditAdmin');
				Route::post('edit/{id}','AdminController@postEditAdmin');

				Route::get('delete/{id}','AdminController@getDeleteAdmin');
			
			});

		});
});