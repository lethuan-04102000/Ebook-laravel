@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm mã giảm giá
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
                        
                    <form role="form" action="{{URL::to('/insert-coupon-code')}}" method="post"> 
                        @csrf  
                    <div class="form-group" >
                            <label for="exampleInputEmail1">Tên mã giảm giá</label>
                            <input type="text" class="form-control" name="coupon_name"  id="exampleInputEmail">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Code giảm gá</label>
                            <input type="text" class="form-control" name="coupon_code" id="exampleInputEmail">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số lượng mã</label>
                            <input type="text" class="form-control" name="coupon_time" id="exampleInputEmail">

                        </div>
                        <div class="form-group">
                             <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Tính Năng Mã</label>
                            <select name="coupon_condition" class="form-control input-sm m-bot15">
                            <option value="0">-----Chọn-----</option>
                            <option value="1">Giảm Theo Phần Trăm </option>
                            <option value="2">Giảm Theo Tiền</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nhập số % hoặ số Tiền</label>
                            <input type="text" class="form-control" name="coupon_number" id="exampleInputEmail"> 
                            </textarea>
                        </div>
      
                        <button type="submit" name="add_coupon" class="btn btn-info">Thêm mã</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
           @endsection
