<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- seo -->
    <meta name="description" content="{{$meta_desc}}">
	<meta name="keywords" content="{{$meta_keywords}}"/>
	<meta name="robots" content="INDEX FOLLOW"/>
	<link rel="canonical" href="{{$url_canonical}}">
    <meta name="author" content="">
	<link rel="icon" href="" type="image/x-icon">
	
	<meta property="og:site_name" content="http://localhost/bookstore/trang-chu/">
    <title>{{$meta_title}}</title>
    <link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/sweetalert.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="BSBUgu7x"></script>
</head><!--/head-->

<body>

	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 0393347178</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> thedanh0410@mail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::to('/trang-chu')}}"><img src="{{('public/fontend/images/logo.png')}}" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-star"></i>Sản Phẩm Yêu Thích</a></li>
								<?php
									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									if($customer_id!=NULL ) {
								?>
								<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh Toán</a></li>
								<?php	
									}else {
								?>
								<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh Toán</a></li>
									
								<?php
									}
								?>



								<li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i>Giỏ Hàng</a></li>
								<?php
									$customer_id = Session::get('customer_id');
									if($customer_id!=NULL ){
								?>
								<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i>Đăng Xuất</a></li>
								<?php	
									}else {
								?>
									<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i>Đăng Nhập</a></li>
									
								<?php
									}
								?>
							

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trang-chu')}}" class="active">Trang Chủ</a></li>
								<li class="dropdown"><a href="#">Sách<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>

                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Tin Tức<i class="fa fa-angle-down"></i></a>
              
                                </li> 
								<li><a href="{{URL::to('/gio-hang')}}">Giỏ Hàng</a></li>
								<li><a href="contact-us.html">Liên Hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<form action="{{URL::to('/tim-kiem')}}" method="POST">
						{{csrf_field()}}
							<div class="search_box pull-right">
								<input type="text" name="keywords_submit" placeholder="Tìm Kiếm Sản Phẩm"/>
								<input type="submit" style="margin-top:0;color:#666" name="search_items" class="btn btn-primary"  value="Tìm Kiếm "/>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
    
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        <style type="text/css">
                            img.img.img-responsive.img-slider {
                                height: 350px;
                            }
                        </style>
                        <div class="carousel-inner">
                        @php 
                            $i = 0;
                        @endphp
                        @foreach($slider as $key => $slide)
                            @php 
                                $i++;
                            @endphp
                            <div class="item {{$i==1 ? 'active' : '' }}">
                                
                                <div class="col-sm-12">
                                    <img alt="{{$slide->slider_desc}}" src="{{asset('public/uploads/slider/'.$slide->slider_image)}}" height="200" width="100%" class="img img-responsive img-slider">
                                   
                                </div>
                            </div>
                        @endforeach  
                          
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục các sách</h2>
						<div class="panel-group category-products" id="accordian">
						@foreach($category as $key =>$cate)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a></h4>
								</div>
							</div>
					
						@endforeach
						</div>
						<div class="brands_products"><!--brands_products-->
							<h2>NHà xuất bản</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach($brand as $key => $brand)
										<li><a href="{{URL::to('/danh-muc-thuong-hieu/'.$brand->brand_slug)}}"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li>
									@endforeach

								</ul>
							</div>
						</div><!--/brands_products-->
						
						<!-- <div class="price-range">
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div>
						 -->
						<!-- <div class="shipping text-center">
							<img src="images/home/shipping.jpg" alt="" />
						</div> -->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
                    @yield('content')
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer">
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2021 Bookstore Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Lê Văn THuận</a></span></p>
				</div>
			</div>
		</div>
		
	</footer>
	

  
    <script src="{{asset('public/fontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/fontend/js/main.js')}}"></script>
	<script src="{{asset('public/fontend/js/sweetalert.min.js')}}"></script>

	<script type="text/javascript">
    $(document).ready(function(){
        
        load_comment();

        function load_comment(){
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{url('/load-comment')}}",
              method:"POST",
              data:{product_id:product_id, _token:_token},
              success:function(data){
              
                $('#comment_show').html(data);
              }
            });
        }
        $('.send-comment').click(function(){
            var product_id = $('.comment_product_id').val();
            var comment_name = $('.comment_name').val();
            var comment_content = $('.comment_content').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{url('/send-comment')}}",
              method:"POST",
              data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content, _token:_token},
              success:function(data){
                
                $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công</span>');
                load_comment();
                $('#notify_comment').fadeOut(2000);
                $('.comment_name').val('');
                $('.comment_content').val('');
              }
            });
        });
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
  $('.send_order').click(function(){
	  swal({
		title: "Xác nhận đơn hàng",
		text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Cảm ơn, Mua hàng",

		  cancelButtonText: "Đóng,chưa mua",
		  closeOnConfirm: false,
		  closeOnCancel: false
	  },
	  function(isConfirm){
		   if (isConfirm) {
			  var shipping_email = $('.shipping_email').val();
			  var shipping_name = $('.shipping_name').val();
			  var shipping_address = $('.shipping_address').val();
			  var shipping_phone = $('.shipping_phone').val();
			  var shipping_notes = $('.shipping_notes').val();
			  var shipping_method = $('.payment_select').val();
			  var order_fee = $('.order_fee').val();
			  var order_coupon = $('.order_coupon').val();
			  var _token = $('input[name="_token"]').val();

			  $.ajax({
				  url: '{{url('/confirm-order')}}',
				  method: 'POST',
				  data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
				  success:function(){
					 swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
				  }
			  });

			  window.setTimeout(function(){ 
				  location.reload();
			  } ,3000);

			} else {
			  swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

			}
	
	  });

	 
  });
});


</script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){

                var id = $(this).data('id_product');
                // alert(id);
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                    alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
                }else{

                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                        success:function(){

                            swal({
                                    title: "Đã thêm sản phẩm vào giỏ hàng",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến giỏ hàng",
                                    closeOnConfirm: false
                                },
                                function() {
                                    window.location.href = "{{url('/gio-hang')}}";
                                });

                        }

                    });
                }

                
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
        });
          
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if(matp == '' && maqh =='' && xaid ==''){
                    alert('Làm ơn chọn để tính phí vận chuyển');
                }else{
                    $.ajax({
                    url : '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                       location.reload(); 
                    }
                    });
                } 
        });
    });
    </script>
</body>
</html>