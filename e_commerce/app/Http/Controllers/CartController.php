<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function ad_cart(Request $request){
    	$qty=$request->qty;
    	$product_id=$request->product_id;
    		$product_info=DB::table('tbl_product')
    					->where('product_id',$product_id)
    					->first();


    	$data['qty']=$qty;
    	$data['id']=$product_info->product_id;
    	$data['name']=$product_info->product_name;
    	$data['price']=$product_info->product_price;
    	$data['options']['image']=$product_info->product_image;

    	Cart::add($data);
    	return Redirect::to('/show-cart');


    }


    public function show_cart(){

    	$all_published_categroy = DB::table('tbl_product')
    					->where('publication_status',1)
    					->get();

    	$manage_published_categroy=view('pages.ad_to_cart')
     				    ->with('all_published_categroy',$all_published_categroy);

     	return view('welcome')
     			->with('pages.ad_to_cart',$manage_published_categroy);

    }



    public function delete_cart($rowId){

    	Cart::update($rowId,0);
    	return Redirect::to('/show-cart');
    }

}
