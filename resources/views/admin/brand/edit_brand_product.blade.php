@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật nhà xuất bản
                </header>
                <?php
                    $message= Session::get('message');
                    if($message){
                        echo'<span class="text-alert">'.$message.'</span>' ;
                        Session::put ('message',null);

                    }
                ?>

                <div class="panel-body">
                    <div class="position-center" >
                        
                    <form role="form" action="{{URL::to('/update-brand-product/'.$edit_brand_product->brand_id)}}" method="post">
                        {{csrf_field()}}    
                        <div class="form-group" >
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" value="{{$edit_brand_product->brand_name}}" class="form-control" name="brand_product_name" placeholder="Tên Danh mục">
                        </div>
                        <div class="form-group" >
                            <label for="exampleInputEmail1">Slug Nhà Xuất Bản</label>
                            <input type="text" value="{{$edit_brand_product->brand_slug}}" class="form-control" name="brand_product_slug" placeholder="Tên Danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea  type="text" style="resize:none" row="12" class="form-control" name="brand_product_desc" >{{$edit_brand_product->brand_desc}} </textarea>
                        </div>
                 
                        
                    </div>
      
                        <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật danh mục</button>
                    </form>
                    </div>
                </div>
            </section>

    </div>
           @endsection