@extends('admin_layout')
@section('admin_content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">DANH SÁCH ĐƠN HÀNG</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="admin.html">Trang chủ Admin</a></li>
            <li class="breadcrumb-item active">Danh sách đơn hàng</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                Danh sách đơn hàng của cửa hàng
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Danh sách đơn hàng
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <?php

                        use Illuminate\Support\Facades\Session;

                        $message = Session::get('message');
                        if ($message) {
                            echo '<span class="text-message">' . $message . '</span>';
                            Session::put('message', null);
                        }
                        ?>
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Khách hàng</th>
                                <th>Mã ship</th>
                                <th>Tình trạng</th>
                                <th>Mã đặt hàng</th>
                                <th>Ngày tạo</th>
                                <td>Ngày cập nhật</td>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($view_order as $key => $order)
                            <tr>
                                <td>{{$order -> order_id}}</td>
                                <td>{{$order -> customer_name}}</td>
                                <td>{{$order -> shipping_id}}</td>
                                <td>
                                    <?php
                                        $status = $order->order_status;
                                        if($status == 0){
                                            echo 'Chưa giao';
                                        }
                                        else if($status == 1){
                                            echo 'Đang giao';
                                        }
                                        else{
                                            echo 'Đã giao';
                                        }
                                    ?>
                                    </td>
                                <td>{{$order -> order_code}}</td>
                                <td>{{$order -> created_at}}</td>
                                <td>{{$order -> updated_at}}</td>
                                <td>
                                    <a href="{{URL::to('/admin/XemCTDH/'.$order->order_id)}}">Xem</a>|
                                    <a href="{{URL::to('/admin/XoaDH/'.$order->order_id)}}" data-confirm="Bạn có chắc chắn muốn xóa đơn hàng này không?" class="delete">Xóa</a>
                                    <script>
                                        var deleteLinks = document.querySelectorAll('.delete');

                                        for (var i = 0; i < deleteLinks.length; i++) {
                                            deleteLinks[i].addEventListener('click', function(event) {
                                                event.preventDefault();

                                                var choice = confirm(this.getAttribute('data-confirm'));

                                                if (choice) {
                                                    window.location.href = this.getAttribute('href');
                                                }
                                            });
                                        }
                                    </script>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection