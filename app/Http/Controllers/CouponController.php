<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Coupon;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();
class CouponController extends Controller
{
    //
    public function unset_coupon()
    {
        $coupon = Session::get('coupon');
        if($coupon==true){
          
            Session::forget('coupon');
            return redirect()->back()->with('message','delete coupon success');
        }
    }

    public function insert_coupon()
    {
        return view('admin.coupon.insert_coupon');
    }

    public function delete_coupon($coupon_id){
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        Session::put('message','coupon success');
        return Redirect::to('list-coupon');
    }

    public function insert_coupon_code(Request $request)
    {
        $data =$request->all();
        
        $coupon = new Coupon();
        $coupon ->coupon_name =$data['coupon_name'];
        $coupon ->coupon_number =$data['coupon_number'];
        $coupon ->coupon_code =$data['coupon_code'];
        $coupon ->coupon_time =$data['coupon_time'];
        $coupon ->coupon_condition =$data['coupon_condition'];

        $coupon->save();
        Session::put('message','add coupon success');
        return Redirect::to('list-coupon');

    }
    
    public function list_coupon()
    {
        $coupon = Coupon::orderby('coupon_id','DESC')->get();
        return view('admin.coupon.list_coupon')->with(compact('coupon'));
    }
}
