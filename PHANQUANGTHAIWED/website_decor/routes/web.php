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

//CUSTOMER PAGES

//GET
Route::get('/', 'HomeController@index');

Route::get('/trang-chu', 'HomeController@index');

Route::get('/danh-muc-san-pham/{slug_category_product}', 'CategoryProductController@show_category_home');

Route::get('/chi-tiet-san-pham/{product_slug}', 'ProductController@details_product');

Route::get('/dang-nhap', 'CustomerController@login');

Route::get('/dang-ky', 'CustomerController@register');

Route::get('/quen-mat-khau', 'CustomerController@password');

Route::get('/dang-xuat', 'CustomerController@logout');

Route::get('/thong-tin-ca-nhan', 'CustomerController@account');

Route::get('/gio-hang', 'CartController@show_cart');

Route::get('/xoa-gio-hang/{rowId}', 'CartController@delete_to_cart');

Route::get('/dat-hang', 'CheckoutController@checkout');

Route::get('/xem-danh-sach-don-hang', 'OrderController@show_order');

Route::get('/xem-chi-tiet-don-hang/{order_id}', 'OrderController@show_details_order');

Route::get('/lien-he', 'HomeController@contact');

Route::get('/gioi-thieu', 'HomeController@about_us');

//POST
Route::post('/dang-ky-tai-khoan', 'CustomerController@register_customer');

Route::post('/dang-nhap-tai-khoan', 'CustomerController@login_customer');

Route::post('/chinh-sua-thong-tin-ca-nhan/{customer_id}', 'CustomerController@update_account_customer');

Route::post('/luu-gio-hang', 'CartController@save_cart');

Route::post('/cap-nhat-gio-hang', 'CartController@update_quantity');

Route::post('/xac-nhan-dat-hang', 'CheckoutController@save_checkout');

Route::post('/tim-kiem', 'HomeController@search');

//ADMIN PAGES

    //GET

Route::get('/admin/login', 'AdminController@admin_login');

Route::get('/admin/register', 'AdminController@admin_register');

Route::get('/admin/password', 'AdminController@admin_password');

Route::get('admin/logout', 'AdminController@admin_logout');

Route::get('/admin', 'AdminController@admin_index');

        //category
Route::get('/admin/ThemLoai', 'CategoryProductController@add_category_product');

Route::get('/admin/XemLoai', 'CategoryProductController@view_category_product');

Route::get('/admin/SuaLoai/{category_product_id}', 'CategoryProductController@edit_category_product');

Route::get('/admin/XoaLoai/{category_product_id}', 'CategoryProductController@delete_category_product');

        //product
Route::get('/admin/ThemSP', 'ProductController@add_product');

Route::get('/admin/XemSP', 'ProductController@view_product');

Route::get('/admin/SuaSP/{product_id}', 'ProductController@edit_product');

Route::get('/admin/XoaSP/{product_id}', 'ProductController@delete_product');

        //customer
Route::get('/admin/ThemKH', 'CustomerController@add_customer');

Route::get('/admin/XemKH', 'CustomerController@view_customer');

Route::get('/admin/SuaKH/{customer_id}', 'CustomerController@edit_customer');

Route::get('/admin/XoaKH/{customer_id}', 'CustomerController@delete_customer');

        //staff
Route::get('/admin/ThemNV', 'StaffController@add_staff');

Route::get('/admin/XemNV', 'StaffController@view_staff');

Route::get('/admin/SuaNV/{staff_id}', 'StaffController@edit_staff');

Route::get('/admin/XoaNV/{staff_id}', 'StaffController@delete_admin');

        //order
Route::get('/admin/ThemDH', 'OrderController@add_order');

Route::get('/admin/XemDH', 'OrderController@view_order');

Route::get('/admin/XoaDH/{order_id}', 'OrderController@delete_order');

Route::get('/admin/XemCTDH/{order_id}', 'OrderController@view_details_order');

    //POST

Route::post('/admin/home', 'AdminController@admin_home');

        //category
Route::post('/admin/LuuLoai', 'CategoryProductController@save_category_product');

Route::post('/admin/CapNhatLoai/{category_product_id}', 'CategoryProductController@update_category_product');

        //product
Route::post('/admin/LuuSP', 'ProductController@save_product');

Route::post('/admin/CapNhatSP/{product_id}', 'ProductController@update_product');

        //customer

Route::post('/admin/CapNhatKH/{customer_id}', 'CustomerController@update_customer');

        //staff
Route::post('/admin/LuuNV', 'StaffController@save_staff');

Route::post('/admin/CapNhatNV/{staff_id}', 'StaffController@update_staff');

        //order
Route::post('/admin/LuuDH', 'OrderController@save_order');

Route::post('/admin/CapNhatDH/{order_id}', 'OrderController@update_order');

Route::post('/admin/search', 'AdminController@search');