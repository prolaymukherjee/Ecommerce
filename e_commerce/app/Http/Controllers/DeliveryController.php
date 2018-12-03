<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use DB;
use app\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();


class DeliveryController extends Controller
{
   


  public function index(){
    	return view('admin.add_delivery');
    }



    public function save_delivery(Request $request){
    	$data=array();
    	$data['delivery_man_image']=$request->delivery_man_image;
       


        $image=$request->file('delivery_man_image');

    	if ($image) {
    		$image_name=str_random(20);
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path="image/";
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);

    	if ($success) {
    		$data['delivery_man_image']=$image_url;

    		DB::table('tbl_delivery_man')->insert($data);
    	    Session::put('message','product added successfully!!!');
    	    return Redirect::to('/add-delivery');
    	}


    	}


    	$data['delivery_man_image']='';
    		DB::table('tbl_delivery_man')->insert($data);
    	    Session::put('message','product added successfully without image!!!');
    	    return Redirect::to('/add-delivery');

    }
}
