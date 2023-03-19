@extends('admin_layout')
@section('admin_content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">THỐNG KÊ DANH MỤC CÁC LOẠI SẢN PHẨM</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="admin.html">Trang chủ Admin</a></li>
            <li class="breadcrumb-item active">Thống kê danh mục các loại sản phẩm</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                Thống kê danh mục các loại sản phẩm của cửa hàng
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Thống kê danh mục các loại sản phẩm
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
                                <th>Mã loại sản phẩm</th>
                                <th>Meta Keyword</th>
                                <th>Tên loại sản phẩm</th>
                                <th>Slug</th>
                                <th>Mô tả loại sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Hình ảnh</th>
                                <td>Ngày tạo</td>
                                <td>Ngày cập nhật</td>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($view_category_product as $key => $cate_pro)
                            <tr>
                                <td>{{$cate_pro -> category_id}}</td>
                                <td>{{$cate_pro -> meta_keywords}}</td>
                                <td>{{$cate_pro -> category_name}}</td>
                                <td>{{$cate_pro -> slug_category_product}}</td>
                                <td>{{$cate_pro -> category_desc}}</td>
                                <td>{{$cate_pro -> category_status}}</td>
                                <td>{{$cate_pro -> category_image}}</td>
                                <td>{{$cate_pro -> created_at}}</td>
                                <td>{{$cate_pro -> updated_at}}</td>
                                <td>
                                    <a href="{{URL::to('/admin/SuaLoai/'.$cate_pro->category_id)}}">Sửa</a>|
                                    <a href="{{URL::to('/admin/XoaLoai/'.$cate_pro->category_id)}}" data-confirm="Bạn có chắc chắn muốn xóa loại sản phẩm này không?" class="delete">Xóa</a>
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