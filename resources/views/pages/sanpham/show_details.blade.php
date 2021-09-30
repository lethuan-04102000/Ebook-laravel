@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" height="50" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->product_name}}</h2>
								<p>Mã ID: {{$value->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								
								<form action="{{URL::to('/save-cart')}}" method="POST">
									@csrf
									<input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">


                                            <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                          
								<span>
									<span>{{number_format($value->product_price,0,',','.').'VNĐ'}}</span>
								
									<label>Số lượng:</label>
									<input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}"  value="1" />
									<input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
								</span>
								<input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
								</form>

								<p><b>Tình trạng:</b> Còn hàng</p>
								<p><b>Điều kiện:</b> Mơi 100%</p>
								<p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
								<p><b>Danh mục:</b> {{$value->category_name}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li ><a href="#details" data-toggle="tab">Tóm tắt nội dung sách</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Tác Giả Viết Sách</a></li>
								<li class="active" ><a href="#reviews" data-toggle="tab">Đánh Giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade " id="details" >
								<p> {!!$value->product_desc!!}</p>
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<p> {!!$value->product_content!!}</p>
							</div>

							
							<div class="tab-pane fade active in " id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>Admin</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>28 SEP 2021</a></li>
									</ul>
									<style>
										.style_comment
										{
											border : 1px solid #ddd;
											border-radius: 10px;
											background :#F0F0E9;
										}
									</style>
									<form>
										 @csrf
										<input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value->product_id}}">
										 <div id="comment_show"></div>
									
									</form>

									<p><b>Viết Bình Luận của bạn</b></p>
									
									<form action="#">
										<span>
											<input style="width:100%;margin-left:0" type="text" class="comment_name" placeholder="Tên Bình Luận"/>
										</span>
										<textarea name="" class="comment_content" placeholder="Nội Dung Bình Luận"></textarea>
										<!-- <div id="notify_comment">thêm bình luận thành công</div> -->
										<b>Đánh giá sao: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right send_comment">
											Thêm Bình Luận
										</button>
										
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
@endforeach				
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản Phẩm Gợi Ý</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									@foreach($relate as $key => $lienquan)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
													<div class="productinfo text-center">
														<img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" width="150" height="150" alt="" />
														<h2>{{number_format($lienquan->product_price).' '.'VND'}}</h2>
														<p>{{$lienquan->product_name}}</p>
														<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
													</div>
												
											</div>
											<div class="choose">
												<ul class="nav nav-pills nav-justified">
													<li><a href="#"><i class="fa fa-plus-square"></i>Yêu Thích</a></li>
													<li><a href="#"><i class="fa fa-plus-square"></i>So Sánh</a></li>
												</ul>
											</div>
										</div>
									</div>
									@endforeach

								</div>
		
			
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div>

@endsection