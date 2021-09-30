<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//font end
Route::get('/','HomeController@index' );
Route::get('/trang-chu','HomeController@index') ;
Route::post('/tim-kiem','HomeController@search') ;

// danh muc san pham
Route::get('/danh-muc-san-pham/{slug_category_product}','CategoryProduct@show_category_home') ;
Route::get('/danh-muc-thuong-hieu/{brand_slug}','BrandProduct@show_brand_home') ;

//chi tiet san pham
Route::get('/chi-tiet/{product_slug}','ProductController@details_product');

//backend(quản lý phần admin)
Route::get('/admin','Admincontroller@index') ;
Route::get('/dashboard','Admincontroller@show_dashboard') ;
Route::get('/logout','Admincontroller@logout') ;
Route::post('/admin-dashboard','Admincontroller@dashboard') ;

//Loai sach
Route::get('/add-category-product','CategoryProduct@add_category_product') ;
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product') ;
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product') ;
Route::get('/all-category-product','CategoryProduct@all_category_product') ;
Route::get('/active-category-product/{category_product_id}','CategoryProduct@unactive_category_product') ;
Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@active_category_product') ;

Route::post('/save-category-product','CategoryProduct@save_category_product') ;
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product') ;

//Nha xuat ban
Route::get('/add-brand-product','BrandProduct@add_brand_product') ;
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product') ;
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product') ;
Route::get('/all-brand-product','BrandProduct@all_brand_product') ;
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product') ;
Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@active_brand_product') ;

Route::post('/save-brand-product','BrandProduct@save_brand_product') ;
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product') ;

//send mail
Route::get('/send-mail','HomeController@send_mail') ;

// product
Route::group(['middleware' => 'auth.roles'], function () {
	Route::get('/add-product','ProductController@add_product');
	Route::get('/edit-product/{product_id}','ProductController@edit_product');
});
Route::get('/delete-product/{product_id}','ProductController@delete_product') ;
Route::get('/all-product','ProductController@all_product') ;
Route::get('/active-product/{product_id}','ProductController@unactive_product') ;
Route::get('/unactive-product/{product_id}','ProductController@active_product') ;
Route::post('/save-product','ProductController@save_product') ;
Route::post('/update-product/{product_id}','ProductController@update_product') ;
// comment 
Route::post('/load-comment','ProductController@load_comment');
Route::post('/send-comment','ProductController@send_comment');

// mã giảm giá
Route::post('/check-coupon','CartController@check_coupon') ;

// quản lý phần cho admin 
Route::get('/insert-coupon','CouponController@insert_coupon') ;
Route::get('/unset-coupon','CouponController@unset_coupon') ;
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon') ;
Route::post('/insert-coupon-code','CouponController@insert_coupon_code') ;
Route::get('/list-coupon','CouponController@list_coupon') ;
// kết thúc mã giảm giá

//cart (them gia hang cho khach)
Route::post('/save-cart','CartController@save_cart') ;
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::post('/update-cart','CartController@update_cart');
Route::post('/add-cart-ajax','CartController@add_cart_ajax') ;
Route::get('/show-cart','CartController@show_cart') ;
Route::get('/gio-hang','CartController@gio_hang') ;
Route::get('/del-all-product','CartController@delete_all_product') ;
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart') ;
Route::get('/del-product/{seesion_id}','CartController@delete_product') ;

// check out gio hang 
Route::get('/login-checkout','CheckoutController@login_checkout') ;
Route::get('/logout-checkout','CheckoutController@logout_checkout') ;
Route::post('/add-customer','CheckoutController@add_customer') ;
Route::post('/order-place','CheckoutController@order_place') ;
Route::post('/login-customer','CheckoutController@login_customer') ;
Route::get('/checkout','CheckoutController@checkout') ;
Route::get('/payment','CheckoutController@payment') ;
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer') ;
Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
Route::post('/calculate-fee','CheckoutController@calculate_fee');
Route::get('/del-fee','CheckoutController@del_fee');
Route::post('/confirm-order','CheckoutController@confirm_order');

// quan ly gio hang o trang admin
Route::get('/delete-order/{order_code}','OrderController@order_code');
Route::get('/print-order/{checkout_code}','OrderController@print_order');
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}','OrderController@view_order');
Route::post('/update-order-qty','OrderController@update_order_qty');
Route::post('/update-qty','OrderController@update_qty');
// Route::get('/manage-order','CheckoutController@manage_order') ;
// Route::get('/view-order/{orderId}','CheckoutController@view_order') ;

// vận chuyển (deliverry)
Route::get('/delivery','DeliveryController@delivery') ;
Route::post('/select-delivery','DeliveryController@select_delivery');
Route::post('/insert-delivery','DeliveryController@insert_delivery');
Route::post('/select-feeship','DeliveryController@select_feeship');
Route::post('/update-delivery','DeliveryController@update_delivery');

//banner
Route::get('/manage-slider','SliderController@manage_slider');
Route::get('/add-slider','SliderController@add_slider');
Route::get('/delete-slide/{slide_id}','SliderController@delete_slide');
Route::post('/insert-slider','SliderController@insert_slider');
Route::get('/unactive-slide/{slide_id}','SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}','SliderController@active_slide');

//authencation
Route::get('/register-auth','AuthController@register_auth');
Route::get('/login-auth','AuthController@login_auth');
Route::get('/logout-auth','AuthController@logout_auth');

Route::post('/register','AuthController@register');
Route::post('/login','AuthController@login');
//user
Route::get('users','UserController@index')->middleware('auth.roles');
Route::get('add-users','UserController@add_users')->middleware('auth.roles');
Route::get('delete-user-roles/{admin_id}','UserController@delete_user_roles')->middleware('auth.roles');
Route::post('store-users','UserController@store_users');
Route::post('assign-roles','UserController@assign_roles')->middleware('auth.roles');

Route::get('impersonate/{admin_id}','UserController@impersonate');
Route::get('impersonate-destroy','UserController@impersonate_destroy');
//customer
Route::get('customer','CustomerController@all_customer');

