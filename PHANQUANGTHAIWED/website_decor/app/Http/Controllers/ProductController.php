<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProductController extends Controller
{
    //Admin pages

    public function add_product()
    {
        $category_product = DB::table('tbl_category_product')->where('category_status', '0')->orderBy('category_id', 'desc')->get();

        return view('admin.add_product') -> with('category_product',$category_product);
    }

    public function view_product()
    {
        $all_product = DB::table('tbl_product') -> join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->get();
        $manage_product = view('admin.view_product')->with('view_product', $all_product);

        return view('admin_layout')->with('admin.view_product', $manage_product);
    }

    public function save_product(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_sold'] = $request->product_sold;
        $data['product_slug'] = $request->product_slug;
        $data['category_id'] = $request->category_id;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['product_image'] = $request->product_image;
        $data['product_status'] = $request->product_status;
        date_default_timezone_set('asia/ho_chi_minh');
        $data['created_at'] = date('Y-m-d H:i:s', time());

        $result = DB::table('tbl_product')->insert($data);
        Session::put('message', 'Bạn đã thêm sản phẩm thành công!');

        return Redirect::to('/admin/XemSP');
    }

    public function edit_product($product_id)
    {
        $edit_product = DB::table('tbl_product') -> join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('product_id', $product_id)->get();

        $category_product = DB::table('tbl_category_product')->where('category_status', '0')->orderBy('category_id', 'desc')->get();

        return view('admin.edit_product')->with('edit_product', $edit_product)-> with('category_product', $category_product);
    }

    public function update_product(Request $request, $product_id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_sold'] = $request->product_sold;
        $data['product_slug'] = $request->product_slug;
        $data['category_id'] = $request->category_id;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['product_image'] = $request->product_image;
        $data['product_status'] = $request->product_status;
        date_default_timezone_set('asia/ho_chi_minh');
        $data['updated_at'] = date('Y-m-d H:i:s', time());

        $result = DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Bạn đã cập nhật sản phẩm thành công!');

        return Redirect::to('/admin/XemSP');
    }

    public function delete_product(Request $request, $product_id)
    {
        $result = DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Bạn đã xóa sản phẩm thành công!');

        return Redirect::to('/admin/XemSP');
    }

    // Public pages
    public function details_product($product_slug){
        $category_product = DB::table('tbl_category_product')->where('category_status', '0')->orderBy('category_id', 'desc')->get();

        $product_details = DB::table('tbl_product') -> join('tbl_category_product','tbl_product.category_id','=',
                'tbl_category_product.category_id') -> where('tbl_product.product_slug', $product_slug) -> get();

        $best_seller_product = DB::table('tbl_product')->where('product_status','0')->orderBy('product_sold','desc') -> limit(5)->get();
        return view('pages.product')->with('category',$category_product)->with('product_details', $product_details) -> with('best_seller', $best_seller_product);
    }
}
