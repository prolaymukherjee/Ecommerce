<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use app\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class SuperAdminController extends Controller
{
    public function logout(){
    	Session::put('admin_name',null);
    	Session::put('admin_id',null);
    	return Redirect::to('/admin');
    }


    public function index(){
    	 $this->authCheck();
    	 return view('admin.dashbord');
    }


     public function authCheck(){
     	$admin_id=Session::get('admin_id');

     	if ($admin_id) {
     		return;
     	}else{
     		return Redirect::to('/admin')->send();
     	}
    	 
    }
     	


}
