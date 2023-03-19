@extends('admin_layout')
@section('admin_content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">SỬA LOẠI SẢN PHẨM</h3>
                    </div>
                    @foreach($edit_category_product as $key => $edit_value)
                    <div class="card-body">
                        <form action="{{URL::to('/admin/CapNhatLoai/'.$edit_value->category_id)}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Từ khóa Meta</label>
                                <input name="category_product_keyword" class="form-control py-4" id="inputEmailAddress" 
                                type="text" placeholder="Nhập từ khóa" value="{{$edit_value->meta_keywords}}" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Tên loại sản phẩm</label>
                                <input value="{{$edit_value->category_name}}" name="category_product_name" class="form-control py-4" id="inputEmailAddress" 
                                type="text"/>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Slug</label>
                                <input name="category_product_slug" class="form-control py-4" id="inputEmailAddress" 
                                type="text" placeholder="Nhập tên hiện trên URL" value="{{$edit_value->slug_category_product}}"/>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputDescribe">Mô tả loại sản phẩm</label>
                                <textarea style="resize:none; size: 5" name="category_product_desc" class="form-control py-4" id="inputEmailAddress" type="text">{{$edit_value->category_desc}}</textarea>
                            </div>
                           
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Trạng thái:  </label>
                                <select value="{{$edit_value->category_status}}" name="category_product_status" id="cars" style="height: 35px">
                                        <option <?php if($edit_value->category_status == 0){echo("selected");}?> value="0">0</option>
                                        <option <?php if($edit_value->category_status == 1){echo("selected");}?>  value="1">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Hình ảnh</label>
                                <input name="category_product_image" class="form-control py-4" id="inputEmailAddress" 
                                type="text" placeholder="Nhập tên hình ảnh" value="{{$edit_value->category_image}}"/>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button class="btn btn-primary" type="submit">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection