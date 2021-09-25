@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục
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
                        
                    <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                        {{csrf_field()}}    
                    <div class="form-group" >
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" name="category_product_name" placeholder="Tên Danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea  type="text" style="resize:none" row="8" class="form-control" name="category_product_desc" placeholder="mô tả danh mục"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ Khóa danh mục</label>
                            <textarea  type="text" style="resize:none" row="8" class="form-control" name="category_product_keywords" placeholder="mô tả danh mục"> </textarea>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Hiện thị</label>
                        <select name="category_product_status" class="form-control input-sm m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiện Thị </option>
                        </select>
                    </div>
      
                        <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
           @endsection