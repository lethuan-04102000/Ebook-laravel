<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\http\Requests;
use App\Slider;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProduct extends Controller
{
    //
    public function Authlogin()
    {
        $admin_id= Session::get('admin_id');
       if ($admin_id)
       {
          return Redirect::to('dashboard');
       }else
       {
           return  Redirect::to('admin')->send();
       }
    }

    public function add_category_product()
    {
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

        $this->validate($request,
            [
                'category_product_name'=>'required|unique:tbl_category_product,category_name|max:255',
                'category_product_keywords'=>'required',
                'slug_category_product'=>'required',
                'category_product_desc'=>'required',
                'category_product_status'=>'required',

            ],
            [
                'category_product_name.required' => 'nhập tên nhà xuất bản  yêu cầu',
                'category_product_name.unique' => 'nhập tên nhà xuất bản  yêu cầu',
                'category_product_name.max' => 'tối đa 255 ký tự',
                
                'category_product_keywords.required' => 'nhập slug nhà xuất bản  yêu cầu',
                'slug_category_product.required' => 'Nhập mô tả',
                'category_product_desc.required' => 'chọn trạng thái cho nhà xuất bản',
                'category_product_status.required' => 'chọn trạng thái cho nhà xuất bản',

            ]
        );

        $data['category_name']=$request->category_product_name;
        $data['meta_keywords']=$request->category_product_keywords;
        $data['slug_category_product'] = $request->slug_category_product;
        $data['category_desc']=$request->category_product_desc;
        $data['category_status']=$request->category_product_status;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message','add product success');
        return Redirect::to('add-category-product');
    }

    public function unactive_category_product($category_product_id)
    {
        $this->Authlogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);

        Session::put('message','active category succes');
        return Redirect::to('all-category-product');

    }

    public function active_category_product($category_product_id)
    {
        $this->Authlogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);

        Session::put('message','unactive category succes');
        return Redirect::to('all-category-product');
    }

    public function edit_category_product($category_product_id)
    {
        $this->Authlogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.category.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('admin.category.eit_category_product',$manager_category_product);
    }
    
    public function update_category_product(Request $request, $category_product_id)
    {
        $this->Authlogin();
        $data = array();
        $data['category_name']=$request->category_product_name;
        $data['meta_keywords']=$request->category_product_keywords;
        $data['slug_category_product'] = $request->slug_category_product;
        $data['category_desc']=$request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','update category succes');
        return Redirect::to('all-category-product');
    }

    public function delete_category_product($category_product_id)
    {
        $this->Authlogin();

        DB::table('tbl_product')->where('product_id',$category_product_id)->delete();

        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','delete category succes');
        return Redirect::to('all-category-product');
    }
    //end funtion cho admin

    // funtion font end cho use
    public function show_category_home(Request $request ,$slug_category_product)
    {
    //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
    //end slide
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $category_by_id = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_category_product.slug_category_product',$slug_category_product)->paginate(6);
    
        $category_name = DB::table('tbl_category_product'
        )->where('tbl_category_product.slug_category_product',$slug_category_product)->limit(1)->get();
        foreach($category_name as $key => $val){
                //seo 
                $meta_desc = $val->category_desc; 
                $meta_keywords = $val->meta_keywords;
                $meta_title = $val->category_name;
                $url_canonical = $request->url();
                //--seo
                }
          

        return view('pages.category.show_category')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('category_by_id',$category_by_id)
        ->with('category_name',$category_name)
        ->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)
        ->with('slider',$slider);;
     }


}
