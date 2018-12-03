<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use app\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();


class SliderController extends Controller
{
    public function index(){
    	return view('admin.add_slider');
    }


    public function save_slider(Request $request){
    	$data=array();
    	$data['slider_image']=$request->slider_image;
        $data['publication_status']=$request->publication_status;


        $image=$request->file('slider_image');

    	if ($image) {
    		$image_name=str_random(20);
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path="image/";
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);

    	if ($success) {
    		$data['slider_image']=$image_url;

    		DB::table('tbl_slider1')->insert($data);
    	    Session::put('message','product added successfully!!!');
    	    return Redirect::to('/add-slider');
    	}


    	}


    	$data['product_image']='';
    		DB::table('tbl_slider1')->insert($data);
    	    Session::put('message','product added successfully without image!!!');
    	    return Redirect::to('/add-slider');

    }

        public function all_slider(){

     	$all_slider_info=DB::table('tbl_slider1')->get();
     	$manage_slider=view('admin.all_slider')
     					->with('all_slider_info',$all_slider_info);


     	return view('admin_layout')
     			->with('admin.all_slider',$manage_slider);

    	//return view('admin.all_categroy');
    }


    public function delete_slider($slider_id){
     	 DB::table('tbl_slider1')
    	     ->where('slider_id',$slider_id)
    	     ->delete();


        Session::put('message','categroy delete successfully!!!');
    	return Redirect::to('/all-slider');
     }



      public function unctive_slide($slider_id){
   		DB::table('tbl_slider1')
   			->where('slider_id',$slider_id)
   			->update(['publication_status'=>0]);
   			 return Redirect::to('/all-slider');
   }


       public function active_slide($slider_id){
   		DB::table('tbl_slider1')
   			->where('slider_id',$slider_id)
   			->update(['publication_status'=>1]);
   			 return Redirect::to('/all-slider');
   }





  }

