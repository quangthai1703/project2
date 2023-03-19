@extends('layout')

@section('content')
<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="banner_slider owl-carousel">
                    @foreach ($slider as $key => $slide )
                <div class="banner_slider owl-carousel">
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>{{$slide->slider_name}}</h1>
                                        <p>{{$slide->slider_desc}}</p>
                                        <!--<a href="#" class="btn_2">buy now</a>-->
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="{{URL('public/frontend/img/slider/'.$slide->slider_image)}}" alt="{{$slide->slider_name}}">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                    
                </div>
                <div class="slider-counter"></div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->
<section class="">
    <div class="container" style="margin-top: 8%">
        <center><h2>DANH MỤC SẢN PHẨM</h2></center>
        <br><br>
        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="row amado-pro-catagory clearfix">
                @foreach ($category as $key => $cate)
                    <!-- Single Catagory -->
                    <div class="col-sm-3 col-lg-4 single-products-catagory clearfix" style="margin-bottom: 20px">
                        <a href="{{URL::to('/danh-muc-san-pham/'.$cate -> slug_category_product)}}">
                            <img src="{{URL::to('public/frontend/img/category-img/'.$cate->category_image)}}" alt="">
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <div class="line"></div>
                                <p></p>
                                <h4>{{$cate->category_name}}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
</section>

<!-- product_list start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Sản phẩm mới nhất</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            @foreach($all_product as $key => $product)
                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_slug)}}">
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{URL::to('public/frontend/img/product/'.$product->product_image)}}" alt="">
                                    <div class="single_product_text">
                                        <h4>{{$product->product_name}}</h4>
                                        <h3>{{number_format($product->product_price).' '.'VND'}}</h3>
                                        <a href="#" id="hidden-product" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            @foreach($all_product as $key => $product)
                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_slug)}}">
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{URL::to('public/frontend/img/product/'.$product->product_image)}}" alt="">
                                    <div class="single_product_text">
                                        <h4>{{$product->product_name}}</h4>
                                        <h3>{{number_format($product->product_price).' '.'VND'}}</h3>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part start-->


<!-- subscribe_area part start-->
<section class="subscribe_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="subscribe_area_text text-center">
                    <h5>Join Our Newsletter</h5>
                    <h2>Subscribe to get Updated
                        with new offers</h2>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="enter email address" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <a href="#" class="input-group-text btn_2" id="basic-addon2">subscribe now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::subscribe_area part end::-->

@endsection