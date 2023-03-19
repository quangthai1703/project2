<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

//use App\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{

    public function index()
    {
        //Hiển thị danh mục sản phẩm
        $category_product = DB::table('tbl_category_product') -> where('category_status', '0') -> orderBy('category_id', 'desc') -> get();

        //Hiển thị các sản phẩm mới nhất
        $all_product = DB::table('tbl_product') -> where('product_status', '0') -> orderBy('created_at', 'desc') -> limit(8) -> get();

        //Slider
        $slider = DB::table('tbl_slider') -> where('slider_status','0') -> orderByDesc('slider_id') -> get();

        return view('pages.home') ->with('category', $category_product)->with('all_product', $all_product) ->with('slider',$slider);
    }

    public function search(Request $request){
        $category_product = DB::table('tbl_category_product') -> where('category_status', '0') -> orderBy('category_id', 'desc') -> get();

        $keyword = $request->keyword_submit;

        $search_product = DB::table('tbl_product') -> where('product_name','like','%'.$keyword.'%') ->get();

        return view('pages.search') ->with('category', $category_product)->with('search', $search_product);
    }

    public function contact(){
        $category_product = DB::table('tbl_category_product') -> where('category_status', '0') -> orderBy('category_id', 'desc') -> get();

        return view('pages.contact')->with('category', $category_product);
    }

    public function about_us(){
        $category_product = DB::table('tbl_category_product') -> where('category_status', '0') -> orderBy('category_id', 'desc') -> get();

        return view('pages.about_us')->with('category', $category_product);
    }
}
