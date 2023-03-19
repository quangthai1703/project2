<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\isNull;

session_start();

class CustomerController extends Controller
{
    //Admin pages

    //public function add_customer()
    //{
    //    return view('admin.add_customer');
    //}

    public function view_customer()
    {
        $all_customer = DB::table('tbl_customers') ->get();
        $manage_customer = view('admin.view_customer')->with('view_customer', $all_customer);

        return view('admin_layout')->with('admin.view_customer', $manage_customer);
    }


    public function edit_customer($customer_id)
    {
        $edit_customer = DB::table('tbl_customers') -> where('customer_id', $customer_id)->get();

        return view('admin.edit_customer')->with('edit_customer', $edit_customer);
    }

    public function update_customer(Request $request, $customer_id)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = MD5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_address'] = $request->customer_address;
        $data['customer_status'] = $request->customer_status;
        date_default_timezone_set('asia/ho_chi_minh');
        $data['updated_at'] = date('Y-m-d H:i:s', time());

        $result = DB::table('tbl_customers')->where('customer_id', $customer_id)->update($data);
        Session::put('message', 'Bạn đã cập nhật khách hàng thành công!');

        return Redirect::to('/admin/XemKH');
    }

    public function delete_customer(Request $request, $customer_id)
    {
        $result = DB::table('tbl_customers')->where('customer_id', $customer_id)->delete();
        Session::put('message', 'Bạn đã xóa khách hàng thành công!');

        return Redirect::to('/admin/XemKH');
    }

    //Public pages
    public function login()
    {
        $category_product = DB::table('tbl_category_product') -> where('category_status', '0') -> orderBy('category_id', 'desc') -> get();

        return view('pages.login_customer')->with('category',$category_product);
    }

    public function register()
    {
        $category_product = DB::table('tbl_category_product') -> where('category_status', '0') -> orderBy('category_id', 'desc') -> get();

        return view('pages.register_customer')->with('category',$category_product);
    }


    public function register_customer(Request $request)
    {
        $check_email = DB::table('tbl_customers') -> where('customer_email', $request->email) -> count();
        if($check_email > 0){
            Session::put('message', 'Email này đã được sử dụng!');
        }
        else{
            $data = array();
            $data['customer_name'] = $request->name;
            $data['customer_email'] = $request->email;
            $data['customer_password'] = MD5($request->password);
            $data['customer_phone'] = $request->phone;
            $data['customer_address'] = $request->address;
            $data['customer_status'] = 0;
            date_default_timezone_set('asia/ho_chi_minh');
            $data['created_at'] = date('Y-m-d H:i:s', time());

            $result = DB::table('tbl_customers')->insert($data);
            Session::put('message', 'Bạn đã tạo tài khoản thành công!');
        }

        return Redirect::to('/dang-ky');
    }

    public function login_customer(Request $request)
    {
        $email = $request -> email;
        $pass = MD5($request -> password);

        $result = DB::table('tbl_customers') -> where('customer_email', $email) -> where('customer_password',$pass) -> first();
        
        if($result)
        {
            Session::put('cus_email',$request -> email);
            return Redirect::to('trang-chu');
        }
        else
        {
            Session::put('message','Bạn nhập sai tài khoản hoặc mật khẩu');
            return Redirect::to('dang-nhap');
        }
    }
    public function logout()
    {
        Session::put('cus_email',null);
        return Redirect::to('trang-chu');
    }

    public function account(){
        $category_product = DB::table('tbl_category_product') -> where('category_status', '0') -> orderBy('category_id', 'desc') -> get();
        $customer = DB::table('tbl_customers') -> where('customer_email',Session('cus_email')) ->get();

        return view('pages.account_customer')->with('category',$category_product) ->with('customer', $customer);
    }

    public function update_account_customer(Request $request, $customer_id){
            $data = array();
            $data['customer_name'] = $request->name;
            $data['customer_email'] = $request->email;
            $data['customer_password'] = MD5($request->password);
            $data['customer_phone'] = $request->phone;
            $data['customer_address'] = $request->address;
            $data['customer_status'] = 0;
            date_default_timezone_set('asia/ho_chi_minh');
            $data['updated_at'] = date('Y-m-d H:i:s', time());

            $result = DB::table('tbl_customers')->where('customer_id', $customer_id)->update($data);
            Session::put('message', 'Bạn đã cập nhật thông tin thành công!');

            return Redirect::to('/thong-tin-ca-nhan');
    }
}
