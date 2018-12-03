<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use app\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();




class HomeController extends Controller
{
    public function index(){


    	$all_published_product=DB::table('tbl_product')
    						  ->join('tbl_categroy','tbl_product.categroy_id','=',
    						  	'tbl_categroy.categroy_id')
    						  ->join('tbl_manufacture','tbl_product.manufacture_id','=','tbl_manufacture.manufacture_id')
    						  ->select('tbl_product.*','tbl_categroy.categroy_name','tbl_manufacture.manufacture_name')
    						  ->limit(9)
    		                  ->get();
     	$manage_published_product=view('pages.home_content')
     					->with('all_published_product',$all_published_product);


     	return view('welcome')
     			->with('pages.home_content',$manage_published_product);

       // return view('pages.home_content');
    }

    public function show_product_categroy($categroy_id){


        $product_by_categroy=DB::table('tbl_product')
                              ->join('tbl_categroy','tbl_product.categroy_id','=',
                                'tbl_categroy.categroy_id')
                              ->select('tbl_product.*','tbl_categroy.categroy_name')
                              -> where('tbl_categroy.categroy_id', $categroy_id)
                              ->where('tbl_product.publication_status',1)
                              ->limit(9)
                              ->get();
        $manage_product_by_categroy=view('pages.categroy_by_product')
                        ->with('product_by_categroy',$product_by_categroy);


        return view('welcome')
                ->with('pages.categroy_by_product',$manage_product_by_categroy);

    }

    public function show_product_details($product_id){


        $product_by_details=DB::table('tbl_product')
                              ->join('tbl_categroy','tbl_product.categroy_id','=',
                                'tbl_categroy.categroy_id')
                              ->join('tbl_manufacture','tbl_product.manufacture_id','=','tbl_manufacture.manufacture_id')
                              ->select('tbl_product.*','tbl_categroy.categroy_name','tbl_manufacture.manufacture_name')
                              -> where('tbl_product.product_id', $product_id)
                              ->where('tbl_product.publication_status',1)
                              ->first();
                              
        $manage_product_by_details=view('pages.product_details')
                        ->with('product_by_details',$product_by_details);


        return view('welcome')
                ->with('pages.product_details',$manage_product_by_details);


  }


}

