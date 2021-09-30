<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Comment;
use Auth;
use App\http\Requests;
use App\Slider;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    public function Authlogin()
    {
        $admin_id= Auth::id();
       if ($admin_id){
          return Redirect::to('dashboard');
       }else{
           return  Redirect::to('admin')->send();
       }
    }
    //
    public function add_product()
    {
        $this->Authlogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get(); 
        return view('admin.product.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }

    public function all_product()
    {
        $this->Authlogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id',"=",'tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id',"=",'tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
        $manager_product = view('admin.product.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.product.all_product',$manager_product);
    }

    public function save_product(Request $request)
    {
        $this->AuthLogin();
        //$data = array();
        $data = $request->validate(
        [
            'product_name'=>'required|unique:tbl_product|max:255',
            
            'product_quantity'=>'required',
            'product_slug'=>'required',
            'product_price'=>'required',
            'product_desc'=>'required',
            'product_content'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            'product_status'=>'required',
            'product_image'=>'required',
        ],
        [
            'product_name.required' => 'Tiêu đề sản phẩm yêu cầu',
            'product_name.unique' => 'Tiêu đề sản phẩm đã có, vui lòng điền tiêu đề khác',

            'product_quantity.required' => 'Nhập số lượng sản phẩm',
            'product_slug.required' => 'Nhập đường dẫn sản phẩm',
            'product_price.required' => 'Nhập giá sản phẩm',
            'product_desc.required' => 'Nhập mô tả sản phẩm',
            'product_content.required' => 'Nhập nội dung sản phẩm',
            'category_id.required' => 'Nhập id sản phẩm',
            'brand_id.required' => 'Nhập id thương hiệu sản phẩm',
            'product_status.required' => 'Nhập trạng thái sản phẩm',
            'product_image.required' => 'chọn ảnh sản phẩm',



        ]
    );

        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_slug'] = $request->product_slug;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $data['product_image'] = $request->product_status;
        $get_image = $request->file('product_image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function unactive_product($product_id)
    {
        $this->Authlogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);

        Session::put('message',' Đổi trạng thái hiện thị cho sách thành công');
        return Redirect::to('all-product');

    }

    public function active_product($product_id)
    {
        $this->Authlogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);

        Session::put('message','Đổi trạng thái hiện thị cho sách thành công');
        return Redirect::to('all-product');

    }

    public function edit_product($product_id)
    {
        $this->Authlogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get(); 

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.product.edit_product')->with('edit_product', $edit_product)
        ->with('cate_product',$cate_product)
        ->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.product.edit_product',$manager_product);
    }

    public function update_product(Request $request, $product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_slug'] = $request->product_slug;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        
        if($get_image)
        {
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/uploads/product',$new_image);
                    $data['product_image'] = $new_image;
                    DB::table('tbl_product')->where('product_id',$product_id)->update($data);
                    Session::put('message','Cập nhật sản phẩm thành công');
                    return Redirect::to('all-product');
        }
            
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
    }
    
    public function delete_product($product_id)
    {
        $this->Authlogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','xóa Sách thành  công');
        return Redirect::to('all-product');
    }

    public function details_product($product_slug ,Request $request)
    {
        //slider
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(8)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_slug',$product_slug)->get();

        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
                //seo 
                $meta_desc = $value->product_desc;
                $meta_keywords = $value->product_slug;
                $meta_title = $value->product_name;
                $url_canonical = $request->url();
                //--seo
            }
       
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)
        ->whereNotIn('tbl_product.product_slug',[$product_slug])
        ->orderby(DB::raw('RAND()'))->paginate(3);


        return view('pages.sanpham.show_details')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('product_details',$details_product)
        ->with('relate',$related_product)
        ->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)
        ->with('slider',$slider);

    }
    //comment
    public function load_comment(Request $request)
    {
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id',$product_id)->get();
        $output = '';
        foreach($comment as $key => $comm){
            $output.= ' 
            <div class="row style_comment">

            <div class="col-md-2">
                <img width="100%" src="'.url('/public/frontend/images/batman-icon.png').'" class="img img-responsive img-thumbnail">
            </div>
            <div class="col-md-10">
                <p style="color:green;">@'.$comm->comment_name.'</p>
                <p style="color:#000;">'.$comm->comment_date.'</p>
                <p>'.$comm->comment.'</p>
            </div>
        </div><p></p>
        ';
        }
        echo $output;
    }
    public function send_comment(Request $request){
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_product_id = $product_id;
        $comment->save();
    }


}
