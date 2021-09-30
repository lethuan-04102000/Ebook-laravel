<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Customer;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class CustomerController extends Controller
{
    public function AuthLogin()
    {
        $admin_id= Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function all_customer()
    {
        $this->AuthLogin();
    	 
        $all_customer = Customer::orderBy('customer_id','DESC')->paginate(2);
    	$manager_customer  = view('admin.customers.all_customer')->with('all_customer',$all_customer);
    	return view('admin_layout')->with('admin.customers.all_customer', $manager_customer);


    }
    
   
}
