<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class StaffController extends Controller
{
    //Admin pages

    public function add_admin()
    {
        return view('admin.add_staff');
    }

    public function view_staff()
    {
        $all_admin = DB::table('tbl_admin') ->get();
        $manage_admin = view('admin.view_staff')->with('view_staff', $all_admin);

        return view('admin_layout')->with('admin.view_staff', $manage_admin);
    }

    public function save_staff(Request $request)
    {
        $data = array();
        $data['admin_name'] = $request->staff_name;
        $data['admin_email'] = $request->staff_email;
        $data['admin_password'] = MD5($request->staff_password);
        $data['admin_phone'] = $request->staff_phone;
        $data['admin_status'] = $request->staff_status;
        date_default_timezone_set('asia/ho_chi_minh');
        $data['created_at'] = date('Y-m-d H:i:s', time());

        $result = DB::table('tbl_admin')->insert($data);
        Session::put('message', 'Bạn đã thêm nhân viên thành công!');

        return Redirect::to('/admin/XemNV');
    }

    public function edit_staff($staff_id)
    {
        $edit_staff = DB::table('tbl_admin') -> where('admin_id', $staff_id)->get();

        return view('admin.edit_staff')->with('edit_staff', $edit_staff);
    }

    public function update_staff(Request $request, $staff_id)
    {
        $data = array();
        $data['admin_name'] = $request->staff_name;
        $data['admin_email'] = $request->staff_email;
        $data['admin_password'] = MD5($request->staff_password);
        $data['admin_phone'] = $request->staff_phone;
        $data['admin_status'] = $request->staff_status;
        date_default_timezone_set('asia/ho_chi_minh');
        $data['updated_at'] = date('Y-m-d H:i:s', time());

        $result = DB::table('tbl_admin')->where('admin_id', $staff_id)->update($data);
        Session::put('message', 'Bạn đã cập nhật nhân viên thành công!');

        return Redirect::to('/admin/XemNV');
    }

    public function delete_admin(Request $request, $staff_id)
    {
        $result = DB::table('tbl_admin')->where('admin_id', $staff_id)->delete();
        Session::put('message', 'Bạn đã xóa nhân viên thành công!');

        return Redirect::to('/admin/XemNV');
    }
}
