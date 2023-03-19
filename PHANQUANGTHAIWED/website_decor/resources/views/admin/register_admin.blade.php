@extends('admin_layout_login')
@section('admin_login')
<div class="col-lg-7">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header">
            <h3 class="text-center font-weight-light my-4">ĐĂNG KÝ TÀI KHOẢN</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputFirstName">Họ lót</label>
                            <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Nhập họ và lót" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputLastName">Tên</label>
                            <input class="form-control py-4" id="inputLastName" type="text" placeholder="Nhập tên" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                    <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Nhập địa chỉ email" />
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputPassword">Password</label>
                            <input class="form-control py-4" id="inputPassword" type="password" placeholder="Nhập password" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputConfirmPassword">Xác nhận mật khẩu</label>
                            <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Xác nhận password" />
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="{{URL('/admin/register')}}">Tạo tài khoản</a></div>
            </form>
        </div>
        <div class="card-footer text-center">
            <div class="small"><a href="{{URL::to('admin/login')}}">Nếu bạn đã có một tài khoản? Đăng nhập</a></div>
        </div>
    </div>
</div>
@endsection