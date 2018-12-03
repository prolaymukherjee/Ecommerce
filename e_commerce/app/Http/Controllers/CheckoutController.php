<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use app\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();



class CheckoutController extends Controller
{
   public function login_accout(){
   	  return view('pages.login');
   }


   public function customer_regi(Request $request){
   	  $data=array();
    	$data['customer_id']=$request->customer_id;
    	$data['customer_name']=$request->customer_name;
    	$data['customer_email']=$request->customer_email;
    	$data['password']=$request->password;
    	$data['mobile_number']=$request->mobile_number;


    	$customer_id=DB::table('tbl_customer')->insertGetId($data);

    	Session::put('customer_id','$customer_id');
    	Session::put('customer_name','$customer_name');
    	return Redirect::to('/checkout');
   }

   public function checkout(){
   	return view('pages.checkout');
   }



   public function shipping(Request $request){

        $data=array();
    	$data['name']=$request->name;
    	$data['f_name']=$request->f_name;
    	$data['l_name']=$request->l_name;
    	$data['address']=$request->address;
    	$data['phone']=$request->phone;
    	$data['city']=$request->city;


    	DB::table('tbl_shipping')->insert($data);
    	Session::put('message','ahipping details added successfully!!!');
    	return Redirect::to('/checkout');

   }


   public function all_shipping_details(){


          $all_shipping_info=DB::table('tbl_shipping')->get();
             $manage_shipping=view('admin.all_shipping')
              ->with('all_shipping_info',$all_shipping_info);


      return view('admin_layout')
          ->with('admin.all_shipping',$manage_shipping);


   }




}
