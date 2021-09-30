<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Mail;
use App\http\Requests;
use App\Slider;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    //
    public function send_mail()
    {
        //send mail
        $to_name = "Lê Văn Thuận";
        $to_email = "thedanh0410@gmail.com";
        $data = array("name"=>"mail gửi từ khách hàng","body"=>'mail gửi về vấn đề hàng hóa'); //body of mail.blade.php
        Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){
        $message->to($to_email)->subject('alo');//send this mail with subject
        $message->from($to_email,$to_name);//send from this mail
        });
        return redirect('/')->with('message','');
    }

    public function index(Request $request)
    {   
        //slider
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc ="chuyên bán sách và truyện số một VN, là một người Yêu Thích đọc sách, bạn nên ghe thăm '
        website của chúng tôi";
        $meta_keywords ="sản phẩm sách";
        $meta_title ="Shop Bán sách số 1 Việt Nam";
        $url_canonical =$request->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id',"=",'tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id',"=",'tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(4)->get();

        return view('pages.home')->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('all_product',$all_product)
        ->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)
        ->with('slider',$slider);
    }
    
    public function search(Request $request)
    {
        $meta_desc ="chuyên bán sách và truyện số một VN, là một người Yêu Thích đọc sách, bạn nên ghe thăm '
        website của chúng tôi";
        $meta_keywords ="sản phẩm sách";
        $meta_title ="Shop Bán sách số 1 Việt Nam";
        $url_canonical =$request->url();
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $keywords = $request-> keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id',"=",'tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id',"=",'tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();

        return view('pages.sanpham.search')->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('search_product',$search_product)
        ->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)
        ->with('slider',$slider);;
    }
}
