@extends('admin_layout')
@section('admin_content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">DANH SÁCH NHÂN VIÊN</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="admin.html">Trang chủ Admin</a></li>
            <li class="breadcrumb-item active">Danh sách nhân viên</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                Danh sách nhân viên của cửa hàng
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Danh sách nhân viên
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
                                <th>Mã nhân viên</th>
                                <th>Tên nhân viên</th>
                                <th>Email</th>
                                <th>Mật khẩu</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                                <td>Ngày tạo</td>
                                <td>Ngày cập nhật</td>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($view_staff as $key => $staff)
                            <tr>
                                <td>{{$staff -> admin_id}}</td>
                                <td>{{$staff -> admin_name}}</td>
                                <td>{{$staff -> admin_email}}</td>
                                <td>{{$staff -> admin_password}}</td>
                                <td>{{$staff -> admin_phone}}</td>
                                <td>{{$staff -> admin_status}}</td>
                                <td>{{$staff -> created_at}}</td>
                                <td>{{$staff -> updated_at}}</td>
                                <td>
                                    <a href="{{URL::to('/admin/SuaNV/'.$staff->admin_id)}}">Sửa</a>|
                                    <a href="{{URL::to('/admin/XoaNV/'.$staff->admin_id)}}" data-confirm="Bạn có chắc chắn muốn xóa nhân viên này không?" class="delete">Xóa</a>
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