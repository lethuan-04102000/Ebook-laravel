@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa Sách
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
                        @foreach($edit_product as $key =>$pro)
                    <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}    
                        <div class="form-group" >
                            <label for="exampleInputEmail1">Tên Sách</label>
                            <input type="text" class="form-control" name="product_name" value="{{$pro->product_name}}" >
                        </div>
                        <div class="form-group" >
                            <label for="exampleInputEmail1">Hình ảnh  Sách</label>
                            <input type="file" class="form-control" name="product_image" >
                            <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" height="150" width="150">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Tóm Tắt Sách</label>
                            <textarea  type="text" style="resize: none" row="8" class="form-control" name="product_desc"  id="ckeditor1"> {{$pro->product_desc}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Tác Giả Sách</label>
                            <textarea  type="text" style="resize:none" row="8" class="form-control" name="product_content" placeholder="Tóm tắt sách"> {{$pro->product_content}}</textarea>
                        </div>
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Thể loại sách</label>
                        <select name="product_cate" class="form-control input-sm m-bot15">
                           @foreach($cate_product as $key =>$cate)
                                @if($cate->category_id==$pro->category_id)
                                <option selected value="{{($cate->category_id)}}">{{($cate->category_name)}} </option>
                                @else
                                <option value="{{($cate->category_id)}}">{{($cate->category_name)}} </option>
                                @endif
                            @endforeach
                        </select>
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Nhà Xuất Bản</label>
                        <select name="product_brand" class="form-control input-sm m-bot15">
                              @foreach($brand_product as $key =>$brand)
                              @if($cate->category_id==$pro->category_id)
                                    <option selected value="{{($brand->brand_id)}}">{{($brand->brand_name)}} </option>
                              @else
                                    <option value="{{($brand->brand_id)}}">{{($brand->brand_name)}} </option>
                               @endif
                              @endforeach
                           
                        </select>
                        <div class="form-group" >
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="text" class="form-control" name="product_price"  value="{{$pro->product_price}}">
                        </div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Hiện thị</label>
                        <select name="product_status" class="form-control input-sm m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiện Thị </option>
                        </select>
                    </div>
      
                        <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                    @endforeach
                    </div>

                </div>
            </section>

    </div>
           @endsection