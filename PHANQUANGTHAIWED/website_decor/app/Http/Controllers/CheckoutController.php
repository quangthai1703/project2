<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


session_start();

class CheckoutController extends Controller
{
    public function checkout(){
        $category_product = DB::table('tbl_category_product') -> where('category_status', '0') -> orderBy('category_id', 'desc') -> get();

        $user = Session::get('cus_email');
        if($user){
            $customer = DB::table('tbl_customers')->where('customer_email',$user) -> get();
            return view('pages.checkout')->with('customer', $customer)->with('category',$category_product);
        }
        else{
            return Redirect::to('/dang-nhap');
        }
    }
    public function save_checkout(Request $request){
        $data = array();
        $data['customer_id'] = $request->id;
        $data['order_status'] = 1;
        $data['order_code'] = date('YmdHis', time()).$request->id;
        $data['order_total'] = $request->total;
        date_default_timezone_set('asia/ho_chi_minh');
        $data['created_at'] = date('Y-m-d H:i:s', time());
        $result = DB::table('tbl_order')->insert($data);
        
        //$count = $request->count;
        //for($i=1; $i<=$count;$i++){
            $dt = array();
            $dt['order_code'] = $data['order_code'];
            $dt['product_id'] = $request->product_id;
            $dt['product_name'] = $request->name;
            $dt['product_price'] = $request->subtotal;
            $dt['product_sales_quantity'] = $request->cart_quantity;
            date_default_timezone_set('asia/ho_chi_minh');
            $dt['created_at'] = date('Y-m-d H:i:s', time());
            $result = DB::table('tbl_order_details')->insert($dt);
        //}
        $category_product = DB::table('tbl_category_product') -> where('category_status', '0') -> orderBy('category_id', 'desc') -> get();

        return view('pages.confirm_order')->with('category',$category_product);
    }
}
