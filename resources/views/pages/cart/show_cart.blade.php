@extends('layout')
@section('content')
<section id="cart_items">
		<div class="">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">TRang chủ</a></li>
				  <li class="active">Giỏ Hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				 <?php	
					$content = Cart::content();

				?> 
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image"> Hình Ảnh Sản Phẩm</td>
							<td class="description">Mô Tả Sản Phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số Lượng</td>
							<td class="total">Tổng tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $v_content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="150" height="150" alt=""/></a>
							</td>
							<td class="cart_description">
								<h4><a href=""> {{$v_content->name}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>{{ number_format( $v_content->price).' '.'VNĐ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
									{{csrf_field()}}
										<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{ $v_content->qty}}" >
										<input type="hidden" value="{{$v_content->rowId}} " name="rowId_cart" class="form-control">
										<input type="submit" value="cập nhật giá " name="update_qty" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									 <?php
										$subtotal= $v_content->price * $v_content->qty;
										echo number_format($subtotal). ' ' . 'VNĐ' ;
									?> 
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</section> 
	<section id="do_action">
		<div class="">
			<!-- <div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div> -->
			<div class="row">

				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span>{{Cart::pricetotal(0 , ',' , ' .').' '.'VNĐ'}}</span></li>

							<li>Thuế<span>{{Cart::tax(0 , ',' , ' .').' '.'VNĐ'}}</span></li>
						
							<li>Phí Vận Chuyển <span>Free</span></li>
							<li>Thành Tiền <span>{{Cart::total(0 , ',' , ' .').' '.'VNĐ'}}</span></li>
						</ul>
						<?php
							$customer_id = Session::get('customer_id');
							$shipping_id = Session::get('shipping_id');
							if($customer_id!=NULL && $shipping_id!=NULL){
						?>
							<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh Toán</a>

						<?php	
							}else {
						?>
							<a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh Toán</a>

						<?php
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection