<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Brand;
use App\Slider;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class BrandProduct extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_brand_product()
    {
        $this->AuthLogin();
    	return view('admin.brand.add_brand_product');
    }

    public function all_brand_product()
    {
        $this->AuthLogin();
    	 
        $all_brand_product = Brand::orderBy('brand_id','DESC')->paginate(2);
    	$manager_brand_product  = view('admin.brand.all_brand_product')->with('all_brand_product',$all_brand_product);
    	return view('admin_layout')->with('admin.brand.all_brand_product', $manager_brand_product);


    }
    
    public function save_brand_product(Request $request)
    {
    //    $this->AuthLogin();
    //    $data = $request->all();

    //    $brand = new Brand();
    //    $brand->brand_name = $data['brand_product_name'];
    //    $brand->brand_slug = $data['brand_slug'];
    //    $brand->brand_desc = $data['brand_product_desc'];
    //    $brand->brand_status = $data['brand_product_status'];
    //    $brand->save();
      
       $this->validate($request,
       [
        'brand_product_name'=>'required|unique:tbl_brand,brand_name|max:255',
        'brand_slug'=>'required',
        'brand_product_desc'=>'required',
        'brand_product_status'=>'required',
        ],
        [
        'brand_product_name.required' => 'nhập tên nhà xuất bản  yêu cầu',
        'brand_product_name.unique'=>'Tên Brand sách Đã Tồn Tại',
        'brand_product_name.max' =>'Ten brand Phải Có Độ Dài Từ 1 Đến 250 Kí TỰ',
        'brand_slug.required' => 'nhập slug nhà xuất bản  yêu cầu',
        'brand_product_desc.required' => 'Nhập mô tả',
        'brand_product_status.required' => 'chọn trạng thái cho nhà xuất bản',
        ]);
        
        $brand = new Brand();
        $brand->brand_name = $request->brand_product_name;
        $brand->brand_slug = $request->brand_slug;
        $brand->brand_desc = $request->brand_product_desc;
        $brand->brand_status = $request->brand_product_status;
        $brand->save();

    	Session::put('message','add brand name success');
    	return Redirect::to('add-brand-product');
    }
    // bật tắt danh mục
    public function unactive_brand_product($brand_product_id)
    {
        $this->Authlogin();

        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);

        Session::put('message','do not active status brand success ');
        return Redirect::to('all-brand-product');

    }

    public function active_brand_product($brand_product_id)
    {
        $this->Authlogin();

        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);

        Session::put('message','active status brand success');
        return Redirect::to('all-brand-product');

    }

    public function edit_brand_product($brand_product_id)
    {
        $this->Authlogin();

        //$edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
        $edit_brand_product = Brand::find($brand_product_id);
        $manager_brand_product = view('admin.brand.edit_brand_product')->with('edit_brand_product', $edit_brand_product);
        return view('admin_layout')->with('admin.brand.edit_brand_product',$manager_brand_product);
    }
    //cập nhật danh mục
    public function update_brand_product(Request $request, $brand_product_id)
    {
        $this->Authlogin();
        $data = $request->all();
        $brand = Brand::find($brand_product_id);
        $brand->brand_name= $data['brand_product_name'];
        $brand->brand_slug= $data['brand_product_slug'];
        $brand->brand_desc= $data['brand_product_desc'];
        $brand->save();
        //$data = array();
        // $data['brand_name']=$request->brand_product_name;
        // $data['brand_slug']=$request->brand_product_slug;
        // $data['brand_desc']=$request->brand_product_desc;
        // DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message','update brand success');
        return Redirect::to('all-brand-product');
    }
    
    public function delete_brand_product($brand_product_id)
    {
        $this->Authlogin();

        DB::table('tbl_product')->where('product_id',$brand_product_id)->delete();

        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();

        Session::put('message','delete brand success');
        return Redirect::to('all-brand-product');
    }

    //End Function Admin Page
     
     public function show_brand_home(Request $request, $brand_slug)
     {
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        
        
        $brand_by_id = DB::table('tbl_product')
        ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
        ->where('tbl_brand.brand_slug',$brand_slug)
        ->paginate(6);

        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_slug',$brand_slug)->limit(1)->get();

        foreach($brand_name as $key => $val){
            //seo 
            $meta_desc = $val->brand_desc; 
            $meta_keywords = $val->brand_desc;
            $meta_title = $val->brand_name;
            $url_canonical = $request->url();
            //--seo
        }
         
        return view('pages.brand.show_brand')->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('brand_by_id',$brand_by_id)
        ->with('brand_name',$brand_name)
        ->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)
        ->with('slider',$slider);;
    }
}
