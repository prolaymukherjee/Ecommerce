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
//frontend route......................................

Route::get('/','HomeController@index');

//show product by all categroy
Route::get('/product_by_categroy/{categroy_id}','HomeController@show_product_categroy');
Route::get('/view_product/{product_id}','HomeController@show_product_details');

//cartcontroller

Route::post('/ad-to-cart','CartController@ad_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-cart/{rowID}','CartController@delete_cart');

//checkout
Route::get('/login-account','CheckoutController@login_accout');
Route::post('/customer-regi','CheckoutController@customer_regi');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/shipping','CheckoutController@shipping');



//shipping details
Route::get('/all-shipping-details','CheckoutController@all_shipping_details');






//backend route..............................
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashbord','AdminController@dashboard');



//categroy route
Route::get('/add-categroy','CategroyController@index');
Route::get('/all-categroy','CategroyController@all_categroy');
Route::post('/save-categroy','CategroyController@save_categroy');
Route::get('/unactive_categroy/{categroy_id}','CategroyController@unctive_categ');
Route::get('/active_categroy/{categroy_id}','CategroyController@active_categ');
Route::get('/edit-categroy/{categroy_id}','CategroyController@edit_category');
Route::post('/update-categroy/{categroy_id}','CategroyController@update_category');
Route::get('/delete-categroy/{categroy_id}','CategroyController@delete_category');


//manufacure
Route::get('/add-Manufacture','ManufactureController@index');
Route::post('/save-manufacture','ManufactureController@save_manufacture');
Route::get('/all-manufacture','ManufactureController@all_manufacture');
Route::get('/active_manufacture/{manufacture_id}','ManufactureController@active_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}','ManufactureController@unctive_manufacture');
Route::get('/edit-manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}','ManufactureController@update_manufacture');
Route::get('/delete-manufacture/{manufacture_id}','ManufactureController@delete_manufacture');


//product
Route::get('/add-product','ProductController@index');
Route::post('/save-product','ProductController@save_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/unactive_product/{product_id}','ProductController@unctive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');



//slider route
Route::get('/add-slider','SliderController@index');
Route::post('/save-slider','SliderController@save_slider');
Route::get('/all-slider','SliderController@all_slider');
Route::get('/unactive_slider/{slider_id}','SliderController@unctive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');

//delivery

Route::get('/add-delivery','DeliveryController@index');
Route::post('/save-delivery','DeliveryController@save_delivery');

