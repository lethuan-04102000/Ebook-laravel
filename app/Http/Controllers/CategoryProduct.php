<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProduct extends Controller
{
    //
    public function Authlogin(){
        $admin_id= Session::get('admin_id');
       if ($admin_id){
          return Redirect::to('dashboard');
       }else{
           return  Redirect::to('admin')->send();
       }
    }
    public function add_category_product(){
        $this->Authlogin();
        return view('admin.category.add_category_product');
    }

    public function all_category_product()
    {
        $this->Authlogin();

        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.category.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('admin.category.all_category_product',$manager_category_product);
    }

    public function save_category_product(Request $request)
    {
        $this->Authlogin();
        $data= array();
        $this->validate($request,
        [
            'category_product_name'=>'required',
            'category_product_keywords'=>'required',
            'category_product_desc'=>'required',

        ],
        [
            'category_product_name.required'=>'Bạn chưa nhập ',
            'category_product_keywords.required'=>'Bạn chưa nhập ',
            'category_product_desc.required'=>'Bạn chưa nhập ',
        ]);

      
        $data['category_name']=$request->category_product_name;
        $data['meta_keywords']=$request->category_product_keywords;

        $data['category_desc']=$request->category_product_desc;
        $data['category_status']=$request->category_product_status;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message','them danh muc thanh cong');
        return Redirect::to('add-category-product');
    }

    public function unactive_category_product($category_product_id){
        $this->Authlogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);

        Session::put('message','kich hoat danh muc thanh cong');
        return Redirect::to('all-category-product');

    }

    public function active_category_product($category_product_id)
    {
        $this->Authlogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);

        Session::put('message','kich hoat danh muc thanh cong');
        return Redirect::to('all-category-product');
    }

    public function edit_category_product($category_product_id){
        $this->Authlogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('admin.eit_category_product',$manager_category_product);
    }
    
    public function update_category_product(Request $request, $category_product_id){
        $this->Authlogin();
        $data = array();
        $data['category_name']=$request->category_product_name;
        $data['meta_keywords']=$request->category_product_keywords;
        $data['category_desc']=$request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','cap nhat danh muc thanh cong');
        return Redirect::to('all-category-product');
    }

    public function delete_category_product($category_product_id){
        $this->Authlogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','xoa danh muc thanh cong');
        return Redirect::to('all-category-product');
    }
    //end funtion cho admin

    // funtion font end cho use
    public function show_category_home(REQUEST $request, $category_id){

        //seo

        //end seo
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_product.category_id',$category_id)->get();
        foreach ($category_by_id as $key =>$val){
            $meta_desc = $val->category_desc;
            $meta_keywords = $val->meta_keywords;
            $meta_title = $val->category_name;
            $url_canonical =$request->url();
        }

        $category_name=DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();

        return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('category_by_id',$category_by_id)
        ->with('category_name',$category_name)
        ->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical);

    }


}
