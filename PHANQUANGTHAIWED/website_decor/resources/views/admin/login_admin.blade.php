@extends('admin_layout_login')
@section('admin_login')

<div class="col-lg-5">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header">
            <h3 class="text-center font-weight-light my-4">ĐĂNG NHẬP</h3>
        </div>
        <div class="card-body">
            <?php
                use Illuminate\Support\Facades\Session;

                $message = Session::get('message');
                if($message)
                {
                    echo'<span class="text-message">'.$message.'</span>';
                    Session::put('message', null);
                }
            ?>
            <form action="{{URL::to('/admin/home')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                    <input name="admin_email" class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Nhập địa chỉ Email" />
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="inputPassword">Password</label>
                    <input name="admin_password" class="form-control py-4" id="inputPassword" type="password" placeholder="Nhập password" />
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                        <label class="custom-control-label" for="rememberPasswordCheck">Nhớ đăng nhập</label>
                    </div>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <a class="small" href="#">Quên Password?</a>
                    <button class="btn btn-primary" type="submit">Đăng nhập</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <div class="small"><a href="{{URL::to('admin/register')}}">Nếu chưa có tài khoản? Đăng ký!</a></div>
        </div>
    </div>
</div>
@endsection