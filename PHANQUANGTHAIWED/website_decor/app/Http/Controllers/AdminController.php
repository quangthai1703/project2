<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
    public function admin_login()
    {
        return view('admin.login_admin');
    }
    public function admin_register()
    {
        return view('admin.register_admin');
    }
    public function admin_password()
    {
        return view('admin.password_admin');
    }
    public function admin_index()
    {
        if(Session::get('ad_email') == null)
            return view('admin.login_admin');
        else
            return view('admin.home_admin');
    }
    public function admin_home(Request $request)
    {
        $email = $request -> admin_email;
        $pass = MD5($request -> admin_password);

        $result = DB::table('tbl_admin') -> where('admin_email', $email) -> where('admin_password',$pass) -> first();
        
        if($result)
        {
            Session::put('ad_email',$request -> admin_email);
            return Redirect::to('admin');
        }
        else
        {
            Session::put('message','Bạn nhập sai tài khoản hoặc mật khẩu');
            return Redirect::to('admin/login');
        }
    }
    public function admin_logout()
    {
        Session::put('ad_email',null);
        return Redirect::to('admin/login');
    }

    public function search(Request $request){

        $keyword = $request->keyword_submit;

        $search = DB::table('tbl_product') -> join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id') ->  where('product_name','like','%'.$keyword.'%') ->get();

        return view('admin.search_product')->with('search', $search);
    }
}
