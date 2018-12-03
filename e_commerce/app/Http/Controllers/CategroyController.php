<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use DB;
use app\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();



class CategroyController extends Controller
{
    public function index(){
    	return view('admin.add_categroy');
    }

     public function all_categroy(){

     	$all_categroy_info=DB::table('tbl_categroy')->get();
     	$manage_categroy=view('admin.all_categroy')
     					->with('all_categroy_info',$all_categroy_info);


     	return view('admin_layout')
     			->with('admin.all_categroy',$manage_categroy);

    	//return view('admin.all_categroy');
    }

     public function save_categroy(Request $request){
    	$data=array();
    	$data['categroy_id']=$request->categroy_id;
    	$data['categroy_name']=$request->categroy_name;
    	$data['categroy_description']=$request->categroy_description;
    	$data['publication_status']=$request->publication_status;


    	DB::table('tbl_categroy')->insert($data);
    	Session::put('message','categroy added successfully!!!');
    	return Redirect::to('/add-categroy');
    }


    public function unctive_categ($categroy_id){
   		DB::table('tbl_categroy')
   			->where('categroy_id',$categroy_id)
   			->update(['publication_status'=>0]);
   			 return Redirect::to('/all-categroy');
   }


       public function active_categ($categroy_id){
   		DB::table('tbl_categroy')
   			->where('categroy_id',$categroy_id)
   			->update(['publication_status'=>1]);
   			 return Redirect::to('/all-categroy');
   }

   public function edit_category($categroy_id){
   			$categroy_info = DB::table('tbl_categroy')
   			        ->where('categroy_id',$categroy_id)
   			        ->first();

   			       $categroy_info = view('admin.edit_categroy')
     					->with('categroy_info',$categroy_info);
              	return view('admin_layout')
     			      ->with('admin.edit_categroy',$categroy_info);
   }


   public function update_category(Request $request,$categroy_id){

        $data=array();
    	$data['categroy_name']=$request->categroy_name;
    	$data['categroy_description']=$request->categroy_description;


    	 DB::table('tbl_categroy')
    	     ->where('categroy_id',$categroy_id)
    	     ->update($data);

    	Session::put('message','categroy update successfully!!!');
    	return Redirect::to('/all-categroy');
   }    



     public function delete_category($categroy_id){
     	 DB::table('tbl_categroy')
    	     ->where('categroy_id',$categroy_id)
    	     ->delete();


        Session::put('message','categroy delete successfully!!!');
    	return Redirect::to('/all-categroy');
     }




}
