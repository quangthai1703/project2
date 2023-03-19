@extends('layout')

@section('content')
 <!--================Cart Area =================-->
 <section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
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

              @foreach($content as $key)
                <tr>
                  <td>
                    <div class="media">
                      <div class="d-flex">
                        <img src="{{URL::to('public/frontend/img/product/'.$key->options->image)}}" style="width: 40%; height:40%" alt="">
                      </div>
                      <div class="media-body">
                        <p>{{$key->name}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h5>{{number_format($key->price).' '.'VND'}}</h5>
                  </td>
                  <form action="{{URL::to('/cap-nhat-gio-hang')}}" method="POST">
                    {{ csrf_field() }}
                    <td>
                      <div class="product_count">
                        <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                        <input name="cart_quantity" class="input-number" type="text" value="{{$key->qty}}"/>
                        <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                      </div>
                    </td>
                    <input name="rowId_cart" type="hidden" value="{{$key->rowId}}"/>
                    <td>
                      <h5>
                        <?php
                        $subtotal = $key->price * $key->qty;
                        echo number_format($subtotal).' '.'VND';
                      ?>
                      </h5>
                    </td>
                    <td>
                      <button style="border: none; background-color:#ffff" type="submit" name="update_qty"><i class="ti-reload"></i></button>
                    </td>
                    <td>
                      <a href="{{URL::to('/xoa-gio-hang/'.$key->rowId)}}"><i class="ti-close"></i>
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
                    <h5>{{Cart::total().' '.'VND'}}</h5>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="{{URL::to('/trang-chu')}}">Tiếp tục mua sắm</a>
            <a class="btn_1 checkout_btn_1" href="{{URL::to('/dat-hang')}}">Tiến hành đặt hàng</a>
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->
@endsection