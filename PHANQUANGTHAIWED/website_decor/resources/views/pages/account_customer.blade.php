@extends('layout')

@section('content')
<!--================login_part Area =================-->
<section class="login_part padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 center">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <center><h3>Thông tin cá nhân</h3></center>
                        <?php

                        use Illuminate\Support\Facades\Session;

                        $message = Session::get('message');
                        if ($message) {
                            echo '<center><span class="text-message" style="color:red">' . $message . '</span></center>';
                            Session::put('message', null);
                        }
                        ?>
                        @foreach($customer as $key => $cus)
                        <form class="row contact_form" action="{{URL::to('/chinh-sua-thong-tin-ca-nhan/'.$cus->customer_id)}}" method="post" novalidate="novalidate">
                            {{csrf_field()}}
                            <div class="col-md-4" style="margin-left: 10px">
                                <label for="staticEmail" class="col-md-12 form-group p_star col-form-label">Họ tên</label>
                                <label for="staticEmail" class="col-md-12 form-group p_star col-form-label">Email</label>
                                <label for="staticEmail" class="col-md-12 form-group p_star col-form-label">Mật khẩu</label>
                                <label for="staticEmail" class="col-md-12 form-group p_star col-form-label">Số điện thoại</label>
                                <label for="staticEmail" class="col-md-12 form-group p_star col-form-label">Địa chỉ</label>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control-plaintext" id="name" name="name" value="{{$cus->customer_name}}"
                                        placeholder="Họ tên">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control-plaintext" id="name" readonly="true" name="email" value="{{$cus->customer_email}}"
                                        placeholder="Email">
                                </div>
                                
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control-plaintext" id="password" name="password" value="{{$cus->customer_password}}"
                                        placeholder="Mật khẩu">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control-plaintext" id="name" name="phone" value="{{$cus->customer_phone}}"
                                        placeholder="Số điện thoại">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control-plaintext" id="name" name="address" value="{{$cus->customer_address}}"
                                        placeholder="Địa chỉ">
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                
                                <button type="submit" value="submit" class="btn_3">
                                    Lưu thay đổi
                                </button>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->
@endsection