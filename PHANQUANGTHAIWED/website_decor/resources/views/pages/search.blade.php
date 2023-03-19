@extends('layout')

@section('content')
<section class="cat_product_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <br><br><br><br>
                        <div class="l_w_title">
                            <h3>Danh mục</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                @foreach($category as $key => $cate)
                                <li>
                                    <a href="{{URL::to('/danh-muc-san-pham/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a>
                                </li>
                              @endforeach
                            </ul>
                        </div>
                    </aside>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product_top_bar d-flex justify-content-between align-items-center">
                            <!--<div class="single_product_menu">
                                <p><span>10000 </span> Prodict Found</p>
                            </div>-->
                            <div class="single_product_menu d-flex">
                                <!--<h5>short by : </h5>
                                <select>
                                    <option data-display="Select">name</option>
                                    <option value="1">price</option>
                                    <option value="2">product</option>
                                </select>-->
                            </div>
                            <div class="single_product_menu d-flex">
                                <!--<h5>show :</h5>
                                <div class="top_pageniation">
                                    <ul>
                                        <li>1</li>
                                        <li>2</li>
                                        <li>3</li>
                                    </ul>
                                </div>-->
                            </div>
                            <div class="single_product_menu d-flex">
                              
                            </div>
                        </div>
                    </div>
                </div>
                <center><h2>Kết quả tìm kiếm</h2><center>

                <div class="row align-items-center latest_product_inner">
                    @foreach($search as $key => $product)
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_slug)}}">
                    <div class="col-lg-4 col-sm-6">
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
                    <div class="col-lg-12">
                        <div class="pageination">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <i class="ti-angle-double-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <i class="ti-angle-double-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection