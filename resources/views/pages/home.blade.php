@extends('layout')
@section('content')
<div class="features_items">
						<h2 class="title text-center">Sản Phẩm Mới Nhất</h2>
						@foreach($all_product as $key =>$product)
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<form>
												@csrf
											<input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
											<input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
											<input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
											<input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
											<input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

											<a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
												<img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" width="150" height="150" alt="" />
												<h2>{{number_format($product->product_price).' '.'VND'}}</h2>
												<p>{{$product->product_name}}</p>
											</a>
											<button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">Add to card</button>
											</form>
										</div>
	
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>

						@endforeach
</div>


@endsection					