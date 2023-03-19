@extends('layout')
@section('content')
<section class="checkout_area padding_top">
    <div class="container-fluid">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-md-12">
                    <center>
                    <div class="container123 col-md-6" style="">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">CHI TIẾT ĐƠN HÀNG</h3>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="col-md-4">Thông tin khách hàng</th>
                                <th class="col-md-6"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Thông tin người đặt hàng</td>
                                <td>{{ $customerInfo->customer_name }}</td>
                            </tr>
                            <tr>
                                <td>Ngày đặt hàng</td>
                                <td>{{ $customerInfo->created_at }}</td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td>{{ $customerInfo->customer_phone }}</td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td>{{ $customerInfo->customer_address }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $customerInfo->customer_email }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    </center>
                    <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting col-md-1" >STT</th>
                            <th class="sorting_asc col-md-4">Tên sản phẩm</th>
                            <th class="sorting col-md-2">Số lượng</th>
                            <th class="sorting col-md-2">Giá tiền</th>
                        </thead>
                        <tbody>
                        @foreach($billInfo as $key => $bill)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $bill->product_name}}</td>
                                <td>{{ $bill->product_sales_quantity}}</td>
                                <td>{{$bill->product_price}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3"><b>Tổng tiền</b></td>
                            <td colspan="1"><b class="text-red">{{$customerInfo->order_total}}</b></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
            </div>
        </div>
    </div>
    </div>
</section>
@endsection