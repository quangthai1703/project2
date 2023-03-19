<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class OrderController extends Controller
{
    //Admin pages

    public function add_order()
    {
        $customer = DB::table('tbl_customers')->where('customer_status', '0')->orderBy('customer_name', 'asc')->get();

        return view('admin.add_order') -> with('customer',$customer);
    }

    public function view_order()
    {
        $all_order = DB::table('tbl_order') -> join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')->get();
        $manage_order = view('admin.view_order')->with('view_order', $all_order);

        return view('admin_layout')->with('admin.view_order', $manage_order);
    }

    public function save_order(Request $request)
    {
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['shipping_id'] = $request->shipping_id;
        $data['order_status'] = $request->order_status;
        $data['order_code'] = $request->order_code;
        date_default_timezone_set('asia/ho_chi_minh');
        $data['created_at'] = date('Y-m-d H:i:s', time());

        $result = DB::table('tbl_order')->insert($data);
        Session::put('message', 'Bạn đã thêm đơn hàng thành công!');

        return Redirect::to('/admin/XemDH');
    }

    public function edit_order($order_id)
    {
        $edit_order = DB::table('tbl_order') -> join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')->where('order_id', $order_id)->get();

        $customer = DB::table('tbl_customers')->where('customer_status', '0')->orderBy('customer_name', 'asc')->get();

        $billInfo = DB::table('tbl_order')->join('tbl_order_details', 'tbl_order.order_code', '=', 'tbl_order_details.order_code')
                    ->leftjoin('tbl_product', 'tbl_order_details.product_id', '=', 'tbl_product.product_id')
                    ->where('tbl_order.order_id', '=', $order_id) ->select('tbl_order.*', 'tbl_order_details.*', 'tbl_product.product_name')
                    ->get();

        return view('admin.edit_order')->with('edit_order', $edit_order)-> with('customer', $customer) -> with('billInfo', $billInfo);
    }

    public function update_order(Request $request, $order_id)
    {
        $data = array();
        $data['order_status'] = $request->status;
        date_default_timezone_set('asia/ho_chi_minh');
        $data['updated_at'] = date('Y-m-d H:i:s', time());

        $result = DB::table('tbl_order')->where('order_id', $order_id)->update($data);
        Session::put('message', 'Bạn đã cập nhật đơn hàng thành công!');

        return Redirect::to('/admin/XemDH');
    }

    public function delete_order(Request $request, $order_id)
    {
        $result = DB::table('tbl_order')->where('order_id', $order_id)->delete();
        Session::put('message', 'Bạn đã xóa đơn hàng thành công!');

        return Redirect::to('/admin/XemDH');
    }


    public function view_details_order($order_id){

        $customerInfo = DB::table('tbl_customers')
                        ->join('tbl_order', 'tbl_customers.customer_id', '=', 'tbl_order.customer_id')
                        ->select('tbl_customers.*', 'tbl_order.order_id', 'tbl_order.order_total', 'tbl_order.order_status')
                        ->where('tbl_order.order_id', '=', $order_id)
                        ->first();

        $customer = DB::table('tbl_customers')->where('customer_status', '0')->orderBy('customer_name', 'asc')->get();

        $billInfo = DB::table('tbl_order')->join('tbl_order_details', 'tbl_order.order_code', '=', 'tbl_order_details.order_code')
                    ->leftjoin('tbl_product', 'tbl_order_details.product_id', '=', 'tbl_product.product_id')
                    ->where('tbl_order.order_id', '=', $order_id) ->select('tbl_order.*', 'tbl_order_details.*', 'tbl_product.product_name')
                    ->get();

        return view('admin.view_details_order')->with('customerInfo', $customerInfo)-> with('customer', $customer) -> with('billInfo', $billInfo);
    }

    //Public pages

    public function show_order()
    {
        $category_product = DB::table('tbl_category_product') -> where('category_status', '0') -> orderBy('category_id', 'desc') -> get();
        $customer = DB::table('tbl_customers') -> select('customer_id')-> where('customer_email', Session::get('cus_email')) ->value('customer_id');
        $all_order = DB::table('tbl_order') -> join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id') -> where('tbl_order.customer_id', $customer) ->get();

        return view('pages.view_order')->with('view_order', $all_order)->with('category',$category_product);
    }

    public function show_details_order($order_id){
        $category_product = DB::table('tbl_category_product') -> where('category_status', '0') -> orderBy('category_id', 'desc') -> get();

        $customerInfo = DB::table('tbl_customers')
                        ->join('tbl_order', 'tbl_customers.customer_id', '=', 'tbl_order.customer_id')
                        ->select('tbl_customers.*', 'tbl_order.order_id', 'tbl_order.order_total', 'tbl_order.order_status')
                        ->where('tbl_order.order_id', '=', $order_id)
                        ->first();

        $customer = DB::table('tbl_customers')->where('customer_status', '0')->orderBy('customer_name', 'asc')->get();

        $billInfo = DB::table('tbl_order')->join('tbl_order_details', 'tbl_order.order_code', '=', 'tbl_order_details.order_code')
                    ->leftjoin('tbl_product', 'tbl_order_details.product_id', '=', 'tbl_product.product_id')
                    ->where('tbl_order.order_id', '=', $order_id) ->select('tbl_order.*', 'tbl_order_details.*', 'tbl_product.product_name')
                    ->get();

        return view('pages.view_order_details')->with('customerInfo', $customerInfo)-> with('customer', $customer) -> with('billInfo', $billInfo)->with('category',$category_product);
    }
}
