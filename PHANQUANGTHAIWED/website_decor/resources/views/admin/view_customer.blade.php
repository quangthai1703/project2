@extends('admin_layout')
@section('admin_content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">DANH SÁCH KHÁCH HÀNG</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="admin.html">Trang chủ Admin</a></li>
            <li class="breadcrumb-item active">Danh sách khách hàng</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                Danh sách khách hàng của cửa hàng
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Danh sách khách hàng
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
                                <th>Mã khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Mật khẩu</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Trạng thái</th>
                                <td>Ngày tạo</td>
                                <td>Ngày cập nhật</td>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($view_customer as $key => $cus)
                            <tr>
                                <td>{{$cus -> customer_id}}</td>
                                <td>{{$cus -> customer_name}}</td>
                                <td>{{$cus -> customer_email}}</td>
                                <td>{{$cus -> customer_password}}</td>
                                <td>{{$cus -> customer_phone}}</td>
                                <td>{{$cus -> customer_address}}</td>
                                <td>{{$cus -> customer_status}}</td>
                                <td>{{$cus -> created_at}}</td>
                                <td>{{$cus -> updated_at}}</td>
                                <td>
                                    <a href="{{URL::to('/admin/SuaKH/'.$cus->customer_id)}}">Sửa</a>|
                                    <a href="{{URL::to('/admin/XoaKH/'.$cus->customer_id)}}" data-confirm="Bạn có chắc chắn muốn xóa khách hàng này không?" class="delete">Xóa</a>
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