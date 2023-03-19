@extends('layout')

@section('content')
<!--================Checkout Area =================-->
<section class="checkout_area padding_top">
    <div class="container">
      <div class="billing_details">
        <form class="row contact_form" action="{{URL::to('/xac-nhan-dat-hang')}}" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-4 center">
                    <center><h3 class="">Thông tin khách hàng</h3></center>

                    @foreach($customer as $key => $cus)
                        {{csrf_field()}}
                    
                    <div class="col-md-12 form-group p_star">
                        <input type="hidden" class="form-control" id="first" name="id" value="{{$cus->customer_id}}"/>
                        <input type="hidden" class="form-control" id="first" name="total" value="{{Cart::total()}}"/>
                        <input type="text" class="form-control" id="first" name="name" value="{{$cus->customer_name}}"/>
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <input type="text" class="form-control" id="number" name="phone" value="{{$cus->customer_phone}}"/>
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <input type="text" class="form-control" id="number" name="address" value="{{$cus->customer_address}}"/>
                    </div>
                    <center><button class="btn_1 checkout_btn_1" type="submit">Đặt hàng</button></center>

                    @endforeach
                </div>
                <div class="cart_area padding_top col-lg-8">
                    <div class="container">
                        <div class="cart_inner">
                            <div class="table-responsive order_box">
                                <center><h2>Đơn hàng của bạn</h2></center>
                                <?php
                                    $content = Cart::content();
                                ?>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Sản phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Tổng tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                        
                                    @foreach($content as $key => $pro)
                                        <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{URL::to('public/frontend/img/product/'.$pro->options->image)}}"  style="width: 40%; height:40%" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <input name="product_id" type="hidden" value="{{$pro->id}}"/>
                                                    <p name="name">{{$pro->name}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>{{number_format($pro->price).' '.'VND'}}</h5>
                                        </td>
                                        <form action="{{URL::to('/cap-nhat-gio-hang')}}" method="POST">
                                            {{ csrf_field() }}
                                            <td>
                                            <div class="product_count">
                                                <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                                                <input name="cart_quantity" class="input-number" value="{{$pro->qty}}"/>
                                                <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                                            </div>
                                            </td>
                                            <input name="rowId_cart" type="hidden" value="{{$pro->rowId}}"/>
                                            <td>
                                            <h5>
                                                <?php
                                                $subtotal = $pro->price * $pro->qty;
                                                echo number_format($subtotal).' '.'VND';
                                                echo '<input name="subtotal" type="hidden" value="'.$subtotal.'"/>';
                                                ?>
                                            </h5>
                                            </td>
                                            <td>
                                            <button style="border: none; background-color:#ffff" type="submit" name="update_qty"><i class="ti-reload"></i></button>
                                            </td>
                                            <td>
                                            <a href="{{URL::to('/xoa-gio-hang/'.$pro->rowId)}}"><i class="ti-close"></i></a>
                                            </td>
                                        </form>
                                        
                                        </tr>
                                        
                                    @endforeach

                                        <!--
                                    <tr class="bottom_button">
                                        <td>
                                        <a class="btn_1" href="#">Cập nhật</a>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                        <div class="cupon_text float-right">
                                            <a class="btn_1" href="#">Đóng phiếu mua hàng</a>
                                        </div>
                                        </td>
                                    </tr>
                                    -->
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                        <h5>Tổng tiền</h5>
                                        </td>
                                        <td>
                                        <h5>{{Cart::subtotal().' '.'VND'}}</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                        <h5>Thuế</h5>
                                        </td>
                                        <td>
                                            <h5>{{Cart::tax().' '.'VND'}}</h5>
                                        </td>
                                    </tr>
                                    <tr class="shipping_area">
                                        <td></td>
                                        <td></td>
                                        <td>
                                        <h5>Phí vận chuyển</h5>
                                        </td>
                                        <td>
                                            <h5>Miễn phí</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                        <h5>Thành tiền</h5>
                                        </td>
                                        <td>
                                            <h5 name="total">{{Cart::total().' '.'VND'}}</h5>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
</section>
  <!--================End Checkout Area =================-->
@endsection