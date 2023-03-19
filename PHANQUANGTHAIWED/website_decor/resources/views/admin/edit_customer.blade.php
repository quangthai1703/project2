@extends('admin_layout')
@section('admin_content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">SỬA THÔNG TIN KHÁCH HÀNG</h3>
                    </div>
                    @foreach($edit_customer as $key => $edit_value)
                    <div class="card-body">
                        <form action="{{URL::to('/admin/CapNhatKH/'.$edit_value->customer_id)}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Tên khách hàng</label>
                                <input name="customer_name" class="form-control py-4" id="inputEmailAddress" 
                                type="text" value="{{$edit_value->customer_name}}" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                <input value="{{$edit_value->customer_email}}" name="customer_email" class="form-control py-4" id="inputEmailAddress" 
                                type="text"/>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Mật khẩu</label>
                                <input name="customer_password" class="form-control py-4" id="inputEmailAddress" 
                                type="password" value="{{$edit_value->customer_password}}"/>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputDescribe">Số điện thoại</label>
                                <input name="customer_phone" class="form-control py-4" id="inputEmailAddress" 
                                type="text" value="{{$edit_value->customer_phone}}"/>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputDescribe">Địa chỉ</label>
                                <input name="customer_address" class="form-control py-4" id="inputEmailAddress" 
                                type="text" value="{{$edit_value->customer_address}}"/>
                            </div>
                           
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Trạng thái:  </label>
                                <select value="{{$edit_value->customer_status}}" name="customer_status" id="cars" style="height: 35px">
                                        <option <?php if($edit_value->customer_status == 0){echo("selected");}?> value="0">0</option>
                                        <option <?php if($edit_value->customer_status == 1){echo("selected");}?>  value="1">1</option>
                                </select>
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