@extends('admin_layout_login')
@section('admin_login')
<div class="col-lg-5">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header">
            <h3 class="text-center font-weight-light my-4">QUÊN PASSWORD</h3>
        </div>
        <div class="card-body">
            <div class="small mb-3 text-muted">Hãy nhập địa chỉ email của bạn, chúng tôi sẽ gửi cho bạn một đường link để reset lại mật khẩu.</div>
            <form>
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                    <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Nhập địa chỉ Emails" />
                </div>
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <a class="small" href="login.html">Quay lại trang Login</a>
                    <a class="btn btn-primary" href="login.html">Reset Password</a>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <div class="small"><a href="register.html">Cần một tài khoản mới? Đăng ký!</a></div>
        </div>
    </div>
</div>
@endsection