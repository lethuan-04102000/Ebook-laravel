@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Thương hiệu sách
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
                        
                    <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                        {{csrf_field()}}    
                         <div class="form-group" >
                            <label for="exampleInputEmail1">Tên Thương Hiệu Sách</label>
                            <input type="text" class="form-control" name="brand_product_name" placeholder="Tên Danh mục">
                        </div>
                        <div class="form-group" >
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" name="brand_slug" placeholder="Tên Danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả Thương hiệu</label>
                            <textarea  type="text" style="resize:none" row="8" class="form-control" name="brand_product_desc" placeholder="mô tả danh mục"> </textarea>
                        </div>
                 
                        <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Hiện thị</label>
                        <select name="brand_product_status" class="form-control input-sm m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiện Thị </option>
                        </select>
                        </div>
      
                        <button type="submit" name="add_brand_product" class="btn btn-info">Thêm Thương hiệu sách</button>
                    </form>
                </div>

        </div>
            </section>

    </div>
           @endsection