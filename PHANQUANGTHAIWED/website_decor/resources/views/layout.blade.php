<!doctype html>
<html lang="vi">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>aranoz</title>
    <link rel="icon" href="{{asset('public/frontend/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/lightslider.min.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/all.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/themify-icons.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/magnific-popup.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/core-style.css')}}">
    
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">

</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu nav-fixed">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{URL::to('/trang-chu')}}"> <img src="{{asset('public/frontend/img/logo.png')}}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>
                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{URL::to('/trang-chu')}}">Trang chủ</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Danh mục
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        @foreach($category as $key => $cate)
                                            <a class="dropdown-item" href="{{URL::to('/danh-muc-san-pham/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a>
                                        @endforeach
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{URL::to('/gioi-thieu')}}">Giới thiệu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{URL::to('/lien-he')}}">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <!--<a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>-->
                            <form action="{{URL::to('/tim-kiem')}}" class="row" method="POST">
                                {{csrf_field()}}
                                <input name="keyword_submit" type="search" class="form-control rounde col-md-8" style="height: 30px;font-size: 12px" placeholder="Search" aria-label="Search"
                                aria-describedby="search-addon" />
                                <button class="col-md-3" type="submit" style="border: none; background-color:aliceblue">
                                <span class="" id="search-addon" style="margin-top: 5px; margin-left:5px">
                                  <i class="ti-search"></i>
                                </span>
                                </button>
                            </form>
                            <!--<a href="#"><i class="ti-heart"></i></a>-->
                            <a class="cart" href="{{URL::to('/gio-hang')}}" style="margin-top: 5px"><i class="ti-shopping-cart"></i></a>
                            <div class="dropdown" style="margin-top: 5px">
                                <a class="dropdown-toggle" href="blog.html" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-user"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <?php

                                        use Illuminate\Support\Facades\Session;

                                        $email = Session::get('cus_email');
                                        if ($email) {
                                            echo '<a class="dropdown-item" href="'.URL::to('/thong-tin-ca-nhan').'">Thông tin cá nhân</a>';
                                            echo '<a class="dropdown-item" href="'.URL::to('/xem-danh-sach-don-hang').'">Danh sách đơn hàng</a>';
                                            echo '<a class="dropdown-item" href="'.URL::to('/dang-xuat').'">Đăng xuất</a>';
                                            Session::put('cus_email', $email);
                                        }
                                        else {
                                            echo '<a class="dropdown-item" href="'.URL::to('/dang-nhap').'">Đăng nhập</a>
                                                <a class="dropdown-item" href="'.URL::to('/dang-ky').'">Đăng ký</a>';
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    @Yield('content')

    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Top Products</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Managed Website</a></li>
                            <li><a href="">Manage Reputation</a></li>
                            <li><a href="">Power Tools</a></li>
                            <li><a href="">Marketing Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Quick Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Jobs</a></li>
                            <li><a href="">Brand Assets</a></li>
                            <li><a href="">Investor Relations</a></li>
                            <li><a href="">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Features</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Jobs</a></li>
                            <li><a href="">Brand Assets</a></li>
                            <li><a href="">Investor Relations</a></li>
                            <li><a href="">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Resources</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Guides</a></li>
                            <li><a href="">Research</a></li>
                            <li><a href="">Experts</a></li>
                            <li><a href="">Agencies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_footer_part">
                        <h4>Newsletter</h4>
                        <p>Heaven fruitful doesn't over lesser in days. Appear creeping
                        </p>
                        <div id="mc_embed_signup">
                            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part">
                                <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address" class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '">
                                <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">subscribe</button>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P>
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            </P>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer_icon social_icon">
                            <ul class="list-unstyled">
                                <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="{{asset('public/frontend/js/jquery-1.12.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('public/frontend/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <!-- easing js -->
    <script src="{{asset('public/frontend/js/jquery.magnific-popup.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('public/frontend/js/lightslider.min.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('public/frontend/js/swiper.min.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('public/frontend/js/masonry.pkgd.js')}}"></script>
    <!-- particles js -->
    <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.nice-select.min.js')}}"></script>
    <!-- slick js -->
    <script src="{{asset('public/frontend/js/slick.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/waypoints.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/contact.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.form.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/mail-script.js')}}"></script>
    <script src="{{asset('public/frontend/js/stellar.js')}}"></script>
    <script src="{{asset('public/frontend/js/theme.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('public/frontend/js/custom.js')}}"></script>
</body>

</html>