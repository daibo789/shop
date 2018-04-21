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

// Route::get('/', function () {
//     return view('welcome');
// });



//前台路由 
Route::get('/','home\IndexController@index');

// Route::group(['namespace'=>'/','prefix'=>'home'],function(){
// 	Route::get('index','IndexController@index');
// 	// Route::resource('shop','ShopController');
// 	// Route::resource('admin','AdminController');
// 	// Route::resource('products','ProductsController');
// 	// Route::resource('order','OrderController');
// 	// Route::resource('user','UserController');
	
// });



//后台路由 

Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){
	Route::get('/','IndexController@index');
	Route::resource('shop','ShopController');
	Route::resource('admin','AdminController');
	Route::resource('products','ProductsController');
	Route::resource('order','OrderController');
	Route::resource('user','UserController');
	Route::resource('category','CategoryController');
	//系统管理
	Route::resource('sys/configMine','sys\ConfigMineController');
		//1。广告管理
	Route::resource('sys/ads','sys\AdsController');
		//2。分类广告广告管理
	Route::resource('sys/adsType','sys\AdsTypeController');
		//3。轮播管理
	Route::resource('sys/slider','sys\SliderController');
	//后台公共目录
	Route::resource('shangchuan','CommonMineController@upload');
	
});

