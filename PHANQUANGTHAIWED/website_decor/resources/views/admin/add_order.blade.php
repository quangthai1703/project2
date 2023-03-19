@extends('admin_layout')
@section('admin_content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">THÊM ĐƠN HÀNG</h3>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{URL::to('/admin/LuuDH')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="small mb-1" for="inputDescribe">Khách hàng:</label><br>
                                <select name="customer_id" id="cars" style="height: 35px; width: auto">
                                    @foreach ($customer as $key => $cus)
                                        <option value="{{$cus->customer_id}}">{{$cus->customer_name}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Mã ship</label>
                                <input name="shipping_id" class="form-control py-4" id="inputEmailAddress" 
                                type="text" placeholder="Nhập mã ship"/>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Trạng thái:  </label>
                                <select name="order_status" id="cars" style="height: 35px">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputDescribe">Mã đặt hàng</label>
                                <input name="order_code" class="form-control py-4" id="inputEmailAddress" 
                                type="text" placeholder="Nhập mã đặt hàng"/>
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