@extends('layout')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng Nhập Bằng Tài Khoản</h2>
						<form action="{{URL::to('/login-customer')}}" method="POST"> 
							{{csrf_field()}}
							<input type="text" name="email_account" placeholder="Tài Khoản Email "  required/>
							<input type="password" name="password_account" placeholder="Mật Khẩu" required/>
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi Nhớ Đăng Nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng Nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng Ký Người Dùng Mới</h2>
						<form action="{{URL::to('/add-customer')}}" method="POST">
							{{csrf_field()}}
							<input type="text"  name="customer_name" placeholder="Tên" required />
							<input type="email"  name="customer_email" placeholder="Địa Chỉ Email" required/>
							<input type="password"  name="customer_password" placeholder="Password" required/>
							<input type="text"  name="customer_phone" placeholder="số điện thoại" required/>

							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection