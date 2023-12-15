@extends('Client.layout.master')
@section('content')

    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <!-- Start Main-Slider -->
            <div class="row mb-5">
                <aside class="sidebar col-lg-4 hidden-md order-2 pr-0 hidden-md">
                    <!-- Start banner -->
                    <div class="sidebar-inner dt-sl">
                        <div class="sidebar-banner">
                            <div class="row">
                                <div class="col-12 mb-1">
                                    <div class="widget-banner">
                                            <img src="{{str_replace('public','/storage',$left_top_banner->image)}}" alt="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="widget-banner">
                                            <img src="{{str_replace('public','/storage',$left_bottom_banner->image)}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End banner -->
                </aside>
                <div class="col-lg-8 col-md-12 order-1">
                    <!-- Start main-slider -->
                    <section id="main-slider"
                             class="main-slider main-slider-cs mt-1 carousel slide carousel-fade card hidden-sm"
                             data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($main_banners as $key=>$banner)
                                <li data-target="#main-slider" data-slide-to="{{$key}}"
                                    @if($key==0)
                                    class="active"
                                    @endif
                                ></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($main_banners as $key=>$banner)
                                <div class="carousel-item
                                @if($key==0)
                                    active
                                @endif
                                    ">
                                    <a class="main-slider-slide" >
                                        <img src="{{str_replace('public','/storage',$banner->image)}}" alt=""
                                             class="img-fluid">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                        <a class="carousel-control-next" href="#main-slider" data-slide="next">
                            <i class="mdi mdi-chevron-left"></i>
                        </a>
                    </section>
                    <section id="main-slider-res"
                             class="main-slider carousel slide carousel-fade card d-none show-sm" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($main_banners as $key=>$banner)
                                <li data-target="#main-slider-res" data-slide-to="{{$key}}"
                                    @if($key==0)
                                    class="active"
                                    @endif></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">

                            @foreach($main_banners as $key=>$banner)
                                <div class="carousel-item
                                    @if($key==0)
                                    active
                                @endif
                                ">
                                    <a class="main-slider-slide" href="#">
                                        <img src="{{str_replace('public','/storage',$banner->image)}}" alt=""
                                             class="img-fluid">
                                    </a>
                                </div>
                            @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#main-slider-res" role="button" data-slide="prev">
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                        <a class="carousel-control-next" href="#main-slider-res" data-slide="next">
                            <i class="mdi mdi-chevron-left"></i>
                        </a>
                    </section>
                    <!-- End main-slider -->
                </div>
            </div>
            <!-- End Main-Slider -->
        </div>
        <div class="container main-container">
            <!-- Start Product-Slider -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <section class="slider-section dt-sl mb-5">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="section-title text-sm-title title-wide no-after-title-wide">
                                    <h2>پر فروش ترینها</h2>
                                    <a href="{{route('home.product.search.index')}}">مشاهده همه</a>
                                </div>
                            </div>

                            <!-- Start Product-Slider -->
                            <div class="col-12 px-res-0">
                                <div class="product-carousel carousel-md owl-carousel owl-theme">
                                    @foreach($top_buy_products as $product)
                                        <div class="item">
                                            <div class="product-card">
                                                <div class="product-head">
                                                    <div class="rating-stars">
                                                        <i class="fa fa-eye" aria-hidden="true">{{$product->visit}}    </i>
                                                    </div>
                                                    @if(!empty($product->discount))
                                                        <div class="discount">
                                                            <span>{{$product->discount->value}}%</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <a class="product-thumb"
                                                   href="{{route('home.product.show' , $product)}}">
                                                    <img src="{{str_replace('public' , '/storage' , $product->image)}}"
                                                         alt="Product Thumbnail">
                                                </a>
                                                <div class="product-card-body">
                                                    <h5 class="product-title">
                                                        <a href="{{route('home.product.show' , $product)}}">{{$product->name}}</a>
                                                    </h5>
                                                    <a class="product-meta"
                                                       href="{{route('home.product.show' , $product)}}">{{$product->name}}</a>
                                                    <span class="product-price">
                                                        @if(!empty($product->discount))
                                                            <del style="color: red">
                                                        @endif
                                                                {{number_format($product->price)}} تومان</span>
                                                    @if(!empty($product->discount))
                                                    </del>
                                                    @endif

                                                    @if(!empty($product->discount))
                                                        <span class="product-price">
                                                            {{number_format($product->getDiscount())}} تومان
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <!-- End Product-Slider -->

                        </div>
                    </section>
                </div>
            </div>
            <!-- End Product-Slider -->

            <!-- Start random-Product-Slider -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <section class="slider-section dt-sl mb-5">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="section-title text-sm-title title-wide no-after-title-wide">
                                    <h2>پیشنهادات ویژه</h2>
                                    <a href="{{route('home.product.search.index')}}">مشاهده همه</a>
                                </div>
                            </div>

                            <!-- Start Product-Slider -->
                            <div class="col-12 px-res-0">
                                <div class="product-carousel carousel-md owl-carousel owl-theme">
                                    @foreach($random_products as $product)
                                        <div class="item">
                                            <div class="product-card">
                                                <div class="product-head">
                                                    <div class="rating-stars">
                                                        <i class="fa fa-eye" aria-hidden="true">{{$product->visit}}    </i>
                                                    </div>
                                                    @if(!empty($product->discount))
                                                        <div class="discount">
                                                            <span>{{$product->discount->value}}%</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <a class="product-thumb"
                                                   href="{{route('home.product.show' , $product)}}">
                                                    <img src="{{str_replace('public' , '/storage' , $product->image)}}"
                                                         alt="Product Thumbnail">
                                                </a>
                                                <div class="product-card-body">
                                                    <h5 class="product-title">
                                                        <a href="{{route('home.product.show' , $product)}}">{{$product->name}}</a>
                                                    </h5>
                                                    <a class="product-meta"
                                                       href="{{route('home.product.show' , $product)}}">{{$product->name}}</a>
                                                    <span class="product-price">
                                                        @if(!empty($product->discount))
                                                            <del style="color: red">
                                                        @endif
                                                                {{number_format($product->price)}} تومان</span>
                                                    @if(!empty($product->discount))
                                                    </del>
                                                    @endif

                                                    @if(!empty($product->discount))
                                                        <span class="product-price">
                                                            {{number_format($product->getDiscount())}} تومان
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <!-- End Product-Slider -->

                        </div>
                    </section>
                </div>
            </div>
            <!-- End random-Product-Slider -->
        </div>
        <div class="container main-container">

            <!-- Start Brand-Slider -->
            <section class="slider-section dt-sl mb-5">
                <div class="row">
                    <!-- Start Product-Slider -->
                    <div class="col-12">
                        <div class="brand-slider carousel-lg owl-carousel owl-theme">
                            @foreach($brands as $brand)
                                <div class="item">
                                    <img src="{{str_replace('public' , '/storage' , $brand->image)}}" class="img-fluid"
                                         alt="{{$brand->title}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Product-Slider -->

                </div>
            </section>
            <!-- End Brand-Slider -->
        </div>
    </main>
    <!-- End main-content -->

@endsection
