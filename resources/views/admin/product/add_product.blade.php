@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Sách
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
                        
                    <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}    
                        <div class="form-group" >
                            <label for="exampleInputEmail1" >Tên Sách</label>
                            <input type="text" class="form-control" name="product_name" placeholder="Tên Danh mục" 
                            data-validation="length" data-validation-length="min4"  data-validation-error-msg="tối thiểu 3  ký tự">
                        </div>
                        <div class="form-group" >
                            <label for="exampleInputEmail1">Hình ảnh Sách</label>
                            <input type="file" class="form-control" name="product_image" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả Sách</label>
                            <textarea  type="text" style="resize:none" row="8" class="form-control" id="ckeditor1"
                             name="product_desc" placeholder="mô tả sách" 
                             data-validation="length" data-validation-length="min9"  data-validation-error-msg="tối thiểu 3 ký tự"> 
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Tác Giả</label>
                            <textarea  type="text" style="resize:none" row="8" class="form-control" name="product_content"
                             placeholder="Tóm tắt sách"
                             > 
                            </textarea>
                        </div>
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Thể loại sách</label>
                        <select name="product_cate" class="form-control input-sm m-bot15">
                           @foreach($cate_product as $key =>$cate)
                                <option value="{{($cate->category_id)}}">{{($cate->category_name)}} </option>
                            @endforeach
                        </select>
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Nhà Xuất Bản</label>
                        <select name="product_brand" class="form-control input-sm m-bot15">
                              @foreach($brand_product as $key =>$brand)
                                <option value="{{($brand->brand_id)}}">{{($brand->brand_name)}} </option>
                            @endforeach
                           
                        </select>
                        <div class="form-group" >
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="text" class="form-control" name="product_price" placeholder="Giá Sản phẩm">
                        </div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Hiện thị</label>
                        <select name="product_status" class="form-control input-sm m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiện Thị </option>
                        </select>
                    </div>
      
                        <button type="submit" name="add_product" class="btn btn-info">Thêm danh mục</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
           @endsection