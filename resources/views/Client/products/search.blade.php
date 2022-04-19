@extends('Client.layout.master')
@section('content')

    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <div class="row">
                <!-- Start Sidebar -->
                <div class="col-lg-3 col-md-12 col-sm-12 sticky-sidebar filter-options-sidebar">
                    <div class="d-md-none">
                        <div class="header-filter-options">
                            <span>جستجوی پیشرفته <i class="fad fa-sliders-h"></i></span>
                            <button class="btn-close-filter-sidebar"><i class="fal fa-times"></i></button>
                        </div>
                    </div>
                    <div class="dt-sn dt-sn--box mb-3">
                        <form action="{{route('home.product.search')}}" method="post">
                            @csrf
                            <div class="col-12">
                                <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide">
                                    <h2>فیلتر محصولات</h2>
                                </div>
                            </div>
                            <div class="col-12 filter-product mb-3">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-block text-right collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseOne"
                                                        aria-expanded="false" aria-controls="collapseOne">
                                                    دسته بندی
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck1">
                                                    <label class="custom-control-label"
                                                           for="customCheck1">همه</label>
                                                </div>

                                                @foreach($category_data as $key=>$category)
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="customCheck{{$key+2}}" name="categories[]" value="{{$category->id}}">
                                                        <label class="custom-control-label"
                                                               for="customCheck{{$key+2}}">{{$category->title}}</label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-block text-right collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                    برند
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck1000">
                                                    <label class="custom-control-label"
                                                           for="customCheck1000">همه</label>
                                                </div>
                                                @foreach($brands_data as $key=>$brand)
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="customCheck100{{$key+1}}" name="brands[]" value="{{$brand->id}}">
                                                        <label class="custom-control-label"
                                                               for="customCheck100{{$key+1}}">{{$brand->title}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="parent-switcher">
                                    <label class="ui-statusswitcher">
                                        <input type="checkbox" id="switcher-1">
                                        <span class="ui-statusswitcher-slider">
                                                <span class="ui-statusswitcher-slider-toggle"></span>
                                            </span>
                                    </label>
                                    <label class="label-switcher" for="switcher-1">فقط کالاهای موجود</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-info btn-block" type="submit">
                                    فیلتر
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Sidebar -->
                <!-- Start Content -->
                <div class="col-lg-9 col-md-12 col-sm-12 search-card-res">
                    <div class="d-md-none">
                        <button class="btn-filter-sidebar">
                            جستجوی پیشرفته <i class="fad fa-sliders-h"></i>
                        </button>
                    </div>
                    <div class="dt-sl dt-sn px-0 search-amazing-tab">
                        <div class="ah-tab-wrapper dt-sl">
                            <div class="ah-tab dt-sl">
                                <a class="ah-tab-item" data-ah-tab-active="true" href="">مرتبط ترین</a>
                                <a class="ah-tab-item" href="">پربازدید ترین</a>
                                <a class="ah-tab-item" href="">جدید ترین</a>
                                <a class="ah-tab-item" href="">پرفروش ترین</a>
                                <a class="ah-tab-item" href="">ارزان ترین</a>
                                <a class="ah-tab-item" href="">گران ترین</a>
                            </div>
                        </div>
                        <div class="ah-tab-content-wrapper dt-sl px-res-0">
                            <div class="ah-tab-content dt-sl" data-ah-tab-active="true">
                                <div class="row mb-3 mx-0 px-res-0">
                                    @foreach($products_data as $product)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                            <div class="product-card mb-2 mx-res-0">
                                                <div class="product-head">
                                                    <div class="rating-stars">
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
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
                            <div class="ah-tab-content dt-sl">
                                <div class="row mb-3 mx-0 px-res-0">
                                    @foreach($products_most_view as $product)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                            <div class="product-card mb-2 mx-res-0">
                                                <div class="product-head">
                                                    <div class="rating-stars">
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
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
                            <div class="ah-tab-content dt-sl">
                                <div class="row mb-3 mx-0 px-res-0">
                                    @foreach($products_most_new as $product)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                            <div class="product-card mb-2 mx-res-0">
                                                <div class="product-head">
                                                    <div class="rating-stars">
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
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
                            <div class="ah-tab-content dt-sl">
                                <div class="row mb-3 mx-0 px-res-0">
                                    @foreach($products_most_buy as $product)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                            <div class="product-card mb-2 mx-res-0">
                                                <div class="product-head">
                                                    <div class="rating-stars">
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
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
                            <div class="ah-tab-content dt-sl">
                                <div class="row mb-3 mx-0 px-res-0">
                                    @foreach($products_lowest_price as $product)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                            <div class="product-card mb-2 mx-res-0">
                                                <div class="product-head">
                                                    <div class="rating-stars">
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
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
                            <div class="ah-tab-content dt-sl">
                                <div class="row mb-3 mx-0 px-res-0">
                                    @foreach($products_most_price as $product)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                            <div class="product-card mb-2 mx-res-0">
                                                <div class="product-head">
                                                    <div class="rating-stars">
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
                                                        <i class="mdi mdi-star active"></i>
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
                        </div>
                    </div>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </main>
    <!-- End main-content -->

@endsection
