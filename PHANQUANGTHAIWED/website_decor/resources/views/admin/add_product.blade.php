@extends('admin_layout')
@section('admin_content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">THÊM LOẠI SẢN PHẨM MỚI</h3>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{URL::to('/admin/LuuSP')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Tên sản phẩm</label>
                                <input name="product_name" class="form-control py-4" id="inputEmailAddress" 
                                type="text" placeholder="Nhập tên sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Số lượng</label>
                                <input name="product_quantity" class="form-control py-4" id="inputEmailAddress" 
                                type="number" placeholder="Nhập số lượng" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Đã bán</label>
                                <input name="product_sold" class="form-control py-4" id="inputEmailAddress" 
                                type="number" placeholder="Nhập số lượng đã bán" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Đã Slug</label>
                                <input name="product_slug" class="form-control py-4" id="inputEmailAddress" 
                                type="text" placeholder="Nhập slug" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputDescribe">Loại sản phẩm</label>
                                <select name="category_id" id="cars" style="height: 35px">
                                    @foreach ($category_product as $key => $cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputDescribe">Mô tả</label>
                                <textarea style="resize:none; size: 5" name="product_desc" class="form-control py-4" 
                                id="inputEmailAddress" type="text" placeholder="Nhập mô tả"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputDescribe">Nội dung</label>
                                <textarea style="resize:none; size: 5" name="product_content" class="form-control py-4" 
                                id="inputEmailAddress" type="text" placeholder="Nhập nội dung"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Giá</label>
                                <input name="product_price" class="form-control py-4" id="inputEmailAddress" 
                                type="text" placeholder="Nhập giá" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Hình ảnh</label>
                                <input name="product_image" class="form-control py-4" id="inputEmailAddress" 
                                type="text" placeholder="Nhập tên hình ảnh" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Trạng thái</label>
                                <select name="product_status" id="cars" style="height: 35px">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button class="btn btn-primary" type="submit">Thêm mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection