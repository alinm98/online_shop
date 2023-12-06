@extends('Client.layout.master')
@section('content')

    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <!-- Start Product -->
            <div class="dt-sn mb-5 dt-sl">
                <div class="row">
                    <!-- Product Gallery-->
                    <div class="col-lg-4 col-md-6 ps-relative">
                        <!-- Product Options-->
                        <ul class="gallery-options">
                            <li>
                                <button class="add-favorites"><i class="mdi mdi-heart"></i></button>
                                <span class="tooltip-option">افزودن به علاقمندی</span>
                            </li>
                        </ul>
                        <div class="product-gallery">
                            <span class="badge">پر فروش</span>
                            <div class="product-carousel owl-carousel" data-slider-id="1">
                                <div class="item">
                                    <a class="gallery-item"
                                       href="{{str_replace('public' , '/storage' , $product->image)}}"
                                       data-fancybox="gallery1">
                                        <img src="{{str_replace('public' , '/storage' , $product->image)}}"
                                             alt="Product">
                                    </a>
                                </div>

                                @foreach($gallery as $picture)
                                    <div class="item">
                                        <a class="gallery-item"
                                           href="{{str_replace('public' , '/storage' , $picture->image)}}"
                                           data-fancybox="gallery1">
                                            <img src="{{str_replace('public' , '/storage' , $picture->image)}}"
                                                 alt="Product">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center flex-wrap">
                                <ul class="product-thumbnails owl-thumbs ml-2" data-slider-id="1">
                                    <li class="owl-thumb-item active">
                                        <a href="">
                                            <img src="{{str_replace('public' , '/storage' , $product->image)}}"
                                                 alt="Product">
                                        </a>
                                    </li>
                                    @foreach($gallery as $picture)
                                        <li class="owl-thumb-item">
                                            <a href="">
                                                <img src="{{str_replace('public' , '/storage' , $picture->image)}}"
                                                     alt="Product">
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                                <ul class="product-thumbnails">
                                    <li>
                                        <a class="navi-link text-sm" href="./assets/video/download.mp4"
                                           data-fancybox data-width="960" data-height="640">
                                            <i class="mdi mdi-video text-lg d-block mb-1"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Product Info -->

                        <div class="col-lg-8 col-md-6 py-2">
                            <div class="product-info dt-sl">
                                <div class="product-title dt-sl">
                                    <h1>{{$product->name}}</h1>
                                </div>

                                <div class="product-params dt-sl">
                                    <ul data-title="ویژگی‌های محصول">
                                        <li>
                                            <span>{{$propertyGroups[0]->title}}: </span>
                                        </li>
                                        @foreach($propertyGroups[0]->property as $value)
                                            <li>
                                                <span>{{$value->title}} : {{$value->getPropertyValue($product)}}</span>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <div class="sum-more">
                                        <span class="show-more btn-link-border">
                                            + موارد بیشتر
                                        </span>

                                        <span class="show-less btn-link-border">
                                            - بستن
                                        </span>
                                    </div>
                                </div>
                                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                    <h2>قیمت : <span class="price">
                                        @if(!empty($product->discount))
                                                <del style="color: red">
                                        @endif
                                                    {{number_format($product->price)}}

                                        تومان
                                        @if(!empty($product->discount))
                                            </del>
                                            @endif
                                    </span></h2>
                                    @if(!empty($product->discount))
                                        <h2><span class="price">

                                            {{number_format($product->getDiscount())}}                                        تومان

                                    </span></h2>@endif
                                </div>


                                <form action="{{route('home.cart.store',$product)}}" method="post">
                                <div class="product-variant dt-sl">
                                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0">
                                        <h2>انتخاب رنگ:</h2>
                                    </div>
                                    <ul class="product-variants float-right ml-3">


                                        @foreach($colors as $color)
                                            <li class="ui-variant">
                                                <label class="ui-variant ui-variant--color">
                                                    <span class="ui-variant-shape"
                                                          style="background-color: {{$color->color}}"></span>
                                                    <input type="radio" value="{{$color->id}}" name="color"
                                                           class="variant-selector"
                                                           checked>
                                                    <span class="ui-variant--check">{{$color->title}}</span>
                                                </label>
                                            </li>
                                        @endforeach


                                    </ul>
                                </div>

                                <div class="dt-sl mt-4">

                                    @csrf
                                    <input type="submit" class="btn-primary-cm btn-with-icon"
                                           value="افزودن به سبد خرید">

                                </div>
                                </form>
                            </div>
                        </div>


                </div>
            </div>
            <div class="dt-sn mb-5 px-0 dt-sl pt-0">
                <!-- Start tabs -->
                <section class="tabs-product-info mb-3 dt-sl">
                    <div class="ah-tab-wrapper border-bottom dt-sl">
                        <div class="ah-tab dt-sl">
                            <a class="ah-tab-item" data-ah-tab-active="true" href=""><i
                                    class="mdi mdi-glasses"></i>نقد و بررسی</a>
                            <a class="ah-tab-item" href=""><i class="mdi mdi-format-list-checks"></i>مشخصات</a>
                            <a class="ah-tab-item" href=""><i
                                    class="mdi mdi-comment-text-multiple-outline"></i>نظرات کاربران</a>
                        </div>
                    </div>
                    <div class="ah-tab-content-wrapper product-info px-4 dt-sl">
                        <div class="ah-tab-content dt-sl" data-ah-tab-active="true">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>نقد و بررسی</h2>
                            </div>
                            <div class="product-title dt-sl">
                                <h1>{{$product->name}}
                                </h1>
                            </div>
                            <div class="description-product dt-sl mt-3 mb-3">
                                <div class="container">
                                    <p>
                                        {{$product->description}}
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="ah-tab-content params dt-sl">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                            </div>
                            @foreach($propertyGroups as $propertyGroup)
                                <section>
                                    <h3 class="params-title">{{$propertyGroup->title}}</h3>
                                    <ul class="params-list">
                                        @foreach($propertyGroup->property as $property)
                                            <li>
                                                <div class="params-list-key">
                                                    <span class="d-block">{{$property->title}}</span>
                                                </div>
                                                <div class="params-list-value">
                                                <span class="d-block">
                                                    {{$property->getPropertyValue($product)}}
                                                </span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </section>
                            @endforeach
                        </div>
                        <div class="ah-tab-content comments-tab dt-sl">
                            <div class="section-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>امتیاز کاربران به:</h2>
                            </div>
                            <div class="product-title dt-sl mb-3">
                                <h1>{{$product->name}}</h1>
                                <h3><span
                                        class="rate-product">({{round($data['total'], 1)}} از 5 | {{$count}} نظر)</span></h3>
                            </div>
                            <div class="dt-sl">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <ul class="content-expert-rating">
                                            <li>
                                                <div class="cell">کیفیت ساخت</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate"
                                                             data-rate-value="{{($data['quality'])*20}}%"
                                                             style="width: {{($data['quality'])*20}}%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">ارزش خرید</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate"
                                                             data-rate-value="{{($data['worth'])*20}}%"
                                                             style="width: {{($data['worth'])*20}}%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">طراحی و ظاهر</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate"
                                                             data-rate-value="{{($data['design'])*20}}%"
                                                             style="width: {{($data['design'])*20}}%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="comments-summary-note">
                                                <span>شما هم می‌توانید در مورد این کالا نظر
                                                    بدهید.</span>
                                            <p>برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود
                                                شوید. اگر این محصول را قبلا از کرون خریده
                                                باشید، نظر
                                                شما به عنوان مالک محصول ثبت خواهد شد.
                                            </p>
                                            <div class="dt-sl mt-2">
                                                <a href="{{route('home.comment.index',$product)}}"
                                                   class="btn-primary-cm btn-with-icon">
                                                    <i class="mdi mdi-comment-text-outline"></i>
                                                    افزودن نظر جدید
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="comments-area dt-sl">
                                    <div
                                        class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                        <h2>نظرات کاربران</h2>
                                        <p class="count-comment">{{$count}} نظر</p>
                                    </div>
                                    <ol class="comment-list">
                                        <!-- #comment-## -->
                                        @foreach($comments as $comment)
                                            <li>
                                                <div class="comment-body">
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            @if($comment->proposal == 0)
                                                                <div
                                                                    class="message-light message-light--opinion-positive">
                                                                    خرید این محصول را توصیه می‌کنم
                                                                </div>
                                                            @endif
                                                            @if($comment->proposal == 1)
                                                                <div
                                                                    class="message-light message-light--opinion-negative">
                                                                    خرید این محصول را پیشنهاد نمی‌کنم
                                                                </div>
                                                            @endif
                                                            @if($comment->proposal == 2)
                                                                <div
                                                                    class="message-light message-light--opinion-negative">
                                                                    نظری ندارم
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-9 col-sm-12 comment-content">
                                                            <div class="comment-title">
                                                                {{$comment->title}}
                                                            </div>
                                                            <div class="comment-author">
                                                                توسط {{$comment->user->name}}
                                                            </div>
                                                            <div class="col-12 form-comment-title--positive mt-2">
                                                                <div class="form-row-title mb-2 pr-2">
                                                                    نقطه قوت : {{$comment->good_points}}
                                                                </div>
                                                            </div>
                                                            <div class="col-12 form-comment-title--negative mt-2">
                                                                <div class="form-row-title mb-2 pr-2">
                                                                    نقطه ضعف : {{$comment->bad_points}}
                                                                </div>
                                                            </div>
                                                            <p>{{$comment->description}}</p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- End tabs -->
            </div>
            <!-- End Product -->
        </div>
    </main>
    <!-- End main-content -->

@endsection
