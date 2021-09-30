<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Admincontroller extends Controller
{
    //kiem tra admin
    public function Authlogin()
    {
        $admin_id= Auth::id();
       if ($admin_id){
          return Redirect::to('dashboard');
       }else{
           return  Redirect::to('admin')->send();
       }
    }
    
    public function index()
    {
        return view ('admin_login');
    }

    public function show_dashboard()
    {
        $this->Authlogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result==true){
                Session::put('admin_name', $result->admin_name);
                Session::put('admin_id', $result->admin_id);
                return Redirect::to('/dashboard');
        }else{
            Session::put('message', 'wrong password or gmail, check again');
            return Redirect::to('/admin');

        }      
    }

    public function logout()
    {
        $this->Authlogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');

    }

}
