<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

//use App\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class CategoryProductController extends Controller
{
    //Admin pages

    public function add_category_product()
    {
        return view('admin.add_category_product');
    }

    public function view_category_product()
    {
        $all_category_product = DB::table('tbl_category_product')->get();
        $manage_category_product = view('admin.view_category_product')->with('view_category_product', $all_category_product);

        return view('admin_layout')->with('admin.view_category_product', $manage_category_product);
    }

    public function save_category_product(Request $request)
    {
        $data = array();
        $data['meta_keywords'] = $request->category_product_keyword;
        $data['category_name'] = $request->category_product_name;
        $data['slug_category_product'] = $request->category_product_slug;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        $data['category_image'] = $request->category_product_image;
        date_default_timezone_set('asia/ho_chi_minh');
        $data['created_at'] = date('Y-m-d H:i:s', time());

        $result = DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Bạn đã thêm loại sản phẩm thành công!');

        return Redirect::to('/admin/XemLoai');
    }

    public function edit_category_product($category_product_id)
    {
        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
        $manage_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);

        return view('admin_layout')->with('admin.edit_category_product', $manage_category_product);
    }

    public function update_category_product(Request $request, $category_product_id)
    {
        $data = array();
        $data['meta_keywords'] = $request->category_product_keyword;
        $data['category_name'] = $request->category_product_name;
        $data['slug_category_product'] = $request->category_product_slug;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        $data['category_image'] = $request->category_product_image;
        date_default_timezone_set('asia/ho_chi_minh');
        $data['updated_at'] = date('Y-m-d H:i:s', time());

        $result = DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
        Session::put('message', 'Bạn đã cập nhật loại sản phẩm thành công!');

        return Redirect::to('/admin/XemLoai');
    }

    public function delete_category_product(Request $request, $category_product_id)
    {
        //$confirm = "Bạn có chắc chắn muốn xóa loại sản phẩm này không?";
        //echo "<script type='text/javascript'>alert('$confirm');</script>";
        $result = DB::table('tbl_category_product')->where('category_id', $category_product_id)->delete();
        Session::put('message', 'Bạn đã xóa loại sản phẩm thành công!');

        return Redirect::to('/admin/XemLoai');
    }

    // Public pages
    // hiện sản phẩm theo danh mục
    public function show_category_home($slug_category_product)
    {
        $category_product = DB::table('tbl_category_product')->where('category_status', '0')->orderBy('category_id', 'desc')->get();
        $category_by_slug_all = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id'
        )->where('tbl_category_product.slug_category_product', $slug_category_product) ->get();
        $category_by_slug_5 = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id'
        )->where('tbl_category_product.slug_category_product', $slug_category_product)->limit(5)->get();

        return view('pages.shop')->with('category', $category_product)->with('category_by_slug_all', $category_by_slug_all) ->with('category_by_slug_5', $category_by_slug_5);
    }
}
