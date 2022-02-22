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
                        <div class="product-timeout position-relative pt-5 mb-3">
                            <div class="promotion-badge">
                                فروش ویژه
                            </div>
                            <div class="countdown-timer" countdown data-date="10 24 2019 20:20:22">
                                <span data-days>0</span>:
                                <span data-hours>0</span>:
                                <span data-minutes>0</span>:
                                <span data-seconds>0</span>
                            </div>
                        </div>
                        <div class="product-gallery">
                            <span class="badge">پر فروش</span>
                            <div class="product-carousel owl-carousel" data-slider-id="1">
                                <div class="item">
                                    <a class="gallery-item" href="{{str_replace('public' , '/storage' , $product->image)}}"
                                       data-fancybox="gallery1">
                                        <img src="{{str_replace('public' , '/storage' , $product->image)}}" alt="Product">
                                    </a>
                                </div>

                                @foreach($gallery as $picture)
                                <div class="item">
                                    <a class="gallery-item" href="{{str_replace('public' , '/storage' , $picture->image)}}"
                                       data-fancybox="gallery1">
                                        <img src="{{str_replace('public' , '/storage' , $picture->image)}}" alt="Product">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center flex-wrap">
                                <ul class="product-thumbnails owl-thumbs ml-2" data-slider-id="1">
                                    <li class="owl-thumb-item active">
                                        <a href="">
                                            <img src="{{str_replace('public' , '/storage' , $product->image)}}" alt="Product">
                                        </a>
                                    </li>
                                    @foreach($gallery as $picture)
                                    <li class="owl-thumb-item">
                                        <a href="">
                                            <img src="{{str_replace('public' , '/storage' , $picture->image)}}" alt="Product">
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
                            <div class="product-variant dt-sl">
                                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0">
                                    <h2>انتخاب رنگ:</h2>
                                </div>
                                <ul class="product-variants float-right ml-3">
                                    <li class="ui-variant">
                                        <label class="ui-variant ui-variant--color">
                                            <span class="ui-variant-shape" style="background-color: #212121"></span>
                                            <input type="radio" value="1" name="color" class="variant-selector"
                                                   checked>
                                            <span class="ui-variant--check">مشکی</span>
                                        </label>
                                    </li>
                                    <li class="ui-variant">
                                        <label class="ui-variant ui-variant--color">
                                            <span class="ui-variant-shape" style="background-color: #f6f6f6"></span>
                                            <input type="radio" value="3" name="color" class="variant-selector">
                                            <span class="ui-variant--check">سفید</span>
                                        </label>
                                    </li>
                                    <li class="ui-variant">
                                        <label class="ui-variant ui-variant--color">
                                            <span class="ui-variant-shape" style="background-color: #2196f3"></span>
                                            <input type="radio" value="4" name="color" class="variant-selector">
                                            <span class="ui-variant--check">آبی</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-params dt-sl">
                                <ul data-title="ویژگی‌های محصول">
                                    <li>
                                        <span>حافظه داخلی: </span>
                                        <span> 256 گیگابایت </span>
                                    </li>

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
                                    </span> </h2>
                                @if(!empty($product->discount))
                                <h2><span class="price">

                                            {{number_format($product->getDiscount())}}                                        تومان

                                    </span> </h2>@endif
                            </div>
                            <div class="dt-sl mt-4">
                                <form action="{{route('home.cart.store',$product)}}" method="post">
                                    @csrf
                                    <input type="submit" class="btn-primary-cm btn-with-icon" value="افزودن به سبد خرید">
                                </form>
                            </div>
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
                                <h1>گوشی موبایل سامسونگ مدل Galaxy A50 SM-A505F/DS دو سیم کارت ظرفیت 128گیگابایت
                                </h1>
                                <h3>Samsung Galaxy A50 SM-A505F/DS Dual SIM 128GB Mobile Phone</h3>
                            </div>
                            <div class="description-product dt-sl mt-3 mb-3">
                                <div class="container">
                                    <p> که این
                                        یعنی جزئیات و وضوح تصویر عالی است. همچنین روکش این نمایشگر لایه‌ی محافظ
                                        Corning Gorilla Glass ا بود حافظه
                                        داخلی را تا یک ترابایت دیگر هم افزایش دهید. دوربین اصلی A50 سنسور
                                        25مگاپیکسلی دارد و از نوع عریض (Wide) است. دو سنسور 8 و 5 مگاپیکسلی دیگر هم
                                        در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A50 را تشکیل داده‌اند.
                                        دوربین سلفی 25مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری
                                        4000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C
                                        و حسگر اثرانگشت در زیر قاب اصلی هم از دیگر ویژگی‌های این تازه‌وارد است.
                                        سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است
                                        تا میان‌رده‌ای با قابلیت‌های نزدیک به یک بالارده خوش‌ساخت را روانه بازار
                                        کند.</p>
                                </div>
                            </div>
                            <div class="accordion dt-sl accordion-product" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="false"
                                                    aria-controls="collapseOne">
                                                Face ID (کسی به‌غیراز تو را نمی‌شناسم)
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <img src="assets/img/single-product/1406986.jpg" alt="">
                                            <p>
                                                در فناوری تشخیص چهره‌ی اپل، یک دوربین و
                                                فرستنده‌ی مادون‌قرمز در بالای نمایشگر قرار داده
                                                ‌شده‌ است؛ هنگامی‌که آیفون
                                                می‌خواهد چهره‌ی شما را تشخیص دهد، فرستنده‌ی نوری
                                                نامرئی را به ‌صورت شما می‌تاباند. دوربین
                                                مادون‌قرمز، این نور را تشخیص
                                                داده و با الگویی که قبلا از صورت شما ثبت کرده،
                                                مطابقت می‌دهد و در صورت یکی‌بودن، قفل گوشی را
                                                باز می‌کند. اپل ادعا کرده،
                                                الگوی صورت را با استفاده از سی هزار نقطه ذخیره
                                                می‌کند که دورزدن آن اصلا کار ساده‌ای نیست.
                                                استفاده از ماسک، عکس یا موارد
                                                مشابه نمی‌تواند امنیت اطلاعات شما را به خطر
                                                اندازد؛ اما اگر برادر یا خواهر دوقلو دارید، باید
                                                برای امنیت اطلاعاتتان نگران
                                                باشید.
                                            </p>
                                            <img src="assets/img/single-product/1431842.jpg" alt="">
                                            <p>
                                                فقط یک نکته‌ی مثبت در مورد Face ID وجود ندارد؛
                                                بلکه موارد زیادی هستند که دانستن آن‌ها ضروری به
                                                نظر می‌رسد. آیفون 10 فقط
                                                چهره‌ی یک نفر را می‌شناسد و نمی‌توانید مثل
                                                اثرانگشت، چند چهره را به آیفون معرفی کنید تا از
                                                آن‌ها برای بازکردنش استفاده
                                                کنید. اگر آیفون در تلاش اول، صورت شما را نشناسد،
                                                باید نمایشگر را برای شناختن مجدد خاموش و روشن
                                                کنید یا اینکه آن را پایین
                                                ببرید و دوباره روبه‌روی صورتتان قرار دهید. این
                                                تمام ماجرا نیست؛ اگر آیفون 10 بین افراد زیادی که
                                                چهره‌شان را نمی‌شناسد
                                                دست‌به‌دست شود، دیگر به شناخت چهره عکس‌العمل
                                                نشان نمی‌دهد و حتما باید از پین یا پسوورد برای
                                                بازکردن آن استفاده کنید تا
                                                دوباره صورتتان را بشناسد.
                                            </p>
                                            <img src="assets/img/single-product/1439653.jpg" alt="">
                                            <p>
                                                اپل سعی کرده نهایت استفاده را از این فناوری جدید
                                                بکند؛ استفاده از آن برای ثبت تصاویر پرتره با
                                                دوربین سلفی، استفاده برای
                                                ساختن شکلک‌های بامزه که آن‌ها را Animoji نامیده
                                                است و همچنین استفاده برای روشن نگه‌داشتن گوشی
                                                زمانی که کاربر به آن نگاه
                                                می‌کند، مواردی هستند که iPhone X به کمک حسگر
                                                اینفرارد، بدون نقص آن‌ها را انجام می‌دهد.
                                            </p>
                                        </div>
                                    </div>
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
                                <h1>گوشی موبایل سامسونگ مدل Galaxy A50 SM-A505F/DS دو سیم کارت ظرفیت 128گیگابایت
                                </h1>
                                <h3>Samsung Galaxy A50 SM-A505F/DS Dual SIM 128GB Mobile Phone<span
                                        class="rate-product">(4 از 5 | 15 نفر)</span></h3>
                            </div>
                            <div class="dt-sl">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <ul class="content-expert-rating">
                                            <li>
                                                <div class="cell">طراحی</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                             style="width: 70%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">ارزش خرید</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                             style="width: 20%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">کیفیت ساخت</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                             style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">صدای مزاحم</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                             style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">مصرف انرژی و آب</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                             style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">امکانات و قابلیت ها</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                             style="width: 100%;"></div>
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
                                                شوید. اگر این محصول را قبلا از دیجی‌کالا خریده
                                                باشید، نظر
                                                شما به عنوان مالک محصول ثبت خواهد شد.
                                            </p>
                                            <div class="dt-sl mt-2">
                                                <a href="#" class="btn-primary-cm btn-with-icon">
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
                                        <p class="count-comment">123 نظر</p>
                                    </div>
                                    <ol class="comment-list">
                                        <!-- #comment-## -->
                                        <li>
                                            <div class="comment-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <div class="message-light message-light--purchased">
                                                            خریدار این محصول</div>
                                                        <ul class="comments-user-shopping">
                                                            <li>
                                                                <div class="cell">رنگ خریداری
                                                                    شده:</div>
                                                                <div class="cell color-cell">
                                                                        <span class="shopping-color-value"
                                                                              style="background-color: #FFFFFF; border: 1px solid rgba(0, 0, 0, 0.25)"></span>سفید
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="cell">خریداری شده
                                                                    از:</div>
                                                                <div class="cell seller-cell">
                                                                    <span class="o-text-blue">دیجی‌کالا</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="message-light message-light--opinion-positive">
                                                            خرید این محصول را توصیه می‌کنم</div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12 comment-content">
                                                        <div class="comment-title">
                                                            لباسشویی سامسونگ
                                                        </div>
                                                        <div class="comment-author">
                                                            توسط مجید سجادی فرد در تاریخ ۵ مهر ۱۳۹۵
                                                        </div>

                                                        <p>لورم ایپسوم متن ساختگی</p>

                                                        <div class="footer">
                                                            <div class="comments-likes">
                                                                آیا این نظر برایتان مفید بود؟
                                                                <button class="btn-like" data-counter="۱۱">بله
                                                                </button>
                                                                <button class="btn-like" data-counter="۶">خیر
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- #comment-## -->
                                        <li>
                                            <div class="comment-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <div class="message-light message-light--purchased">
                                                            خریدار این محصول</div>
                                                        <ul class="comments-user-shopping">
                                                            <li>
                                                                <div class="cell">رنگ خریداری
                                                                    شده:</div>
                                                                <div class="cell color-cell">
                                                                        <span class="shopping-color-value"
                                                                              style="background-color: #FFFFFF; border: 1px solid rgba(0, 0, 0, 0.25)"></span>سفید
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="cell">خریداری شده
                                                                    از:</div>
                                                                <div class="cell seller-cell">
                                                                    <span class="o-text-blue">دیجی‌کالا</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="message-light message-light--opinion-positive">
                                                            خرید این محصول را توصیه می‌کنم</div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12 comment-content">
                                                        <div class="comment-title">
                                                            لباسشویی سامسونگ
                                                        </div>
                                                        <div class="comment-author">
                                                            توسط مجید سجادی فرد در تاریخ ۵ مهر ۱۳۹۵
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-6 col-12">
                                                                <div class="content-expert-evaluation-positive">
                                                                    <span>نقاط قوت</span>
                                                                    <ul>
                                                                        <li>دوربین‌های 4گانه پرقدرت
                                                                        </li>
                                                                        <li>باتری باظرفیت بالا</li>
                                                                        <li>حسگر اثرانگشت زیر قاب
                                                                            جلویی</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-12">
                                                                <div class="content-expert-evaluation-negative">
                                                                    <span>نقاط ضعف</span>
                                                                    <ul>
                                                                        <li>نرم‌افزار دوربین</li>
                                                                        <li>نبودن Nano SD در بازار
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>
                                                            بعد از چندین هفته بررسی تصمیم به خرید
                                                            این مدل از ماشین لباسشویی گرفتم ولی
                                                            متاسفانه نتونست انتظارات منو برآورده کنه
                                                            .
                                                            دو تا ایراد داره یکی اینکه حدودا تا 20
                                                            دقیقه اول شستشو یه صدایی شبیه به صدای
                                                            پمپ تخلیه همش به گوش میاد که رو مخه یکی
                                                            هم با اینکه خشک کنش تا 1400 دور در دقیقه
                                                            میچرخه، ولی اون طوری که دوستان تعریف
                                                            میکردن لباسها رو خشک نمیکنه .ضمنا برای
                                                            این صدایی که گفتم زنگ زدم نمایندگی اومدن
                                                            دیدن، وتعمیرکار گفتش که این صدا طبیعیه و
                                                            تا چند دقیقه اول شستشو عادیه.بدجوری خورد
                                                            تو ذوقم. اگه بیشتر پول میذاشتم میتونستم
                                                            یه مدل میان رده از مارکهای بوش یا آ ا گ
                                                            میخریدم که خیلی بهتر از جنس مونتاژی کره
                                                            ای هستش.
                                                        </p>

                                                        <div class="footer">
                                                            <div class="comments-likes">
                                                                آیا این نظر برایتان مفید بود؟
                                                                <button class="btn-like" data-counter="۱۱">بله
                                                                </button>
                                                                <button class="btn-like" data-counter="۶">خیر
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- #comment-## -->
                                        <li>
                                            <div class="comment-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <div class="message-light message-light--purchased">
                                                            خریدار این محصول</div>
                                                        <ul class="comments-user-shopping">
                                                            <li>
                                                                <div class="cell">رنگ خریداری
                                                                    شده:</div>
                                                                <div class="cell color-cell">
                                                                        <span class="shopping-color-value"
                                                                              style="background-color: #FFFFFF; border: 1px solid rgba(0, 0, 0, 0.25)"></span>سفید
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="cell">خریداری شده
                                                                    از:</div>
                                                                <div class="cell seller-cell">
                                                                    <span class="o-text-blue">دیجی‌کالا</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="message-light message-light--opinion-positive">
                                                            خرید این محصول را توصیه می‌کنم</div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12 comment-content">
                                                        <div class="comment-title">
                                                            لباسشویی سامسونگ
                                                        </div>
                                                        <div class="comment-author">
                                                            توسط مجید سجادی فرد در تاریخ ۵ مهر ۱۳۹۵
                                                        </div>

                                                        <p>لورم ایپسوم متن ساختگی</p>

                                                        <div class="footer">
                                                            <div class="comments-likes">
                                                                آیا این نظر برایتان مفید بود؟
                                                                <button class="btn-like" data-counter="۱۱">بله
                                                                </button>
                                                                <button class="btn-like" data-counter="۶">خیر
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- #comment-## -->
                                        <li>
                                            <div class="comment-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <div class="message-light message-light--purchased">
                                                            خریدار این محصول</div>
                                                        <ul class="comments-user-shopping">
                                                            <li>
                                                                <div class="cell">رنگ خریداری
                                                                    شده:</div>
                                                                <div class="cell color-cell">
                                                                        <span class="shopping-color-value"
                                                                              style="background-color: #FFFFFF; border: 1px solid rgba(0, 0, 0, 0.25)"></span>سفید
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="cell">خریداری شده
                                                                    از:</div>
                                                                <div class="cell seller-cell">
                                                                    <span class="o-text-blue">دیجی‌کالا</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="message-light message-light--opinion-positive">
                                                            خرید این محصول را توصیه می‌کنم</div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12 comment-content">
                                                        <div class="comment-title">
                                                            لباسشویی سامسونگ
                                                        </div>
                                                        <div class="comment-author">
                                                            توسط مجید سجادی فرد در تاریخ ۵ مهر ۱۳۹۵
                                                        </div>

                                                        <p>لورم ایپسوم متن ساختگی</p>

                                                        <div class="footer">
                                                            <div class="comments-likes">
                                                                آیا این نظر برایتان مفید بود؟
                                                                <button class="btn-like" data-counter="۱۱">بله
                                                                </button>
                                                                <button class="btn-like" data-counter="۶">خیر
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- #comment-## -->
                                        <li>
                                            <div class="comment-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <div class="message-light message-light--purchased">
                                                            خریدار این محصول</div>
                                                        <ul class="comments-user-shopping">
                                                            <li>
                                                                <div class="cell">رنگ خریداری
                                                                    شده:</div>
                                                                <div class="cell color-cell">
                                                                        <span class="shopping-color-value"
                                                                              style="background-color: #FFFFFF; border: 1px solid rgba(0, 0, 0, 0.25)"></span>سفید
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="cell">خریداری شده
                                                                    از:</div>
                                                                <div class="cell seller-cell">
                                                                    <span class="o-text-blue">دیجی‌کالا</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="message-light message-light--opinion-positive">
                                                            خرید این محصول را توصیه می‌کنم</div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12 comment-content">
                                                        <div class="comment-title">
                                                            لباسشویی سامسونگ
                                                        </div>
                                                        <div class="comment-author">
                                                            توسط مجید سجادی فرد در تاریخ ۵ مهر ۱۳۹۵
                                                        </div>

                                                        <p>لورم ایپسوم متن ساختگی</p>

                                                        <div class="footer">
                                                            <div class="comments-likes">
                                                                آیا این نظر برایتان مفید بود؟
                                                                <button class="btn-like" data-counter="۱۱">بله
                                                                </button>
                                                                <button class="btn-like" data-counter="۶">خیر
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="ah-tab-content dt-sl">
                            <div class="section-title title-wide no-after-title-wide dt-sl">
                                <h2>پرسش و پاسخ</h2>
                                <p class="count-comment">پرسش خود را در مورد محصول مطرح نمایید</p>
                            </div>
                            <div class="form-question-answer dt-sl mb-3">
                                <form action="">
                                    <textarea class="form-control mb-3" rows="5"></textarea>
                                    <button class="btn btn-dark float-right ml-3" disabled="">ثبت پرسش</button>
                                    <div class="custom-control custom-checkbox float-right mt-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">اولین پاسخی که به
                                            پرسش من داده شد، از طریق ایمیل به من اطلاع دهید.</label>
                                    </div>
                                </form>
                            </div>
                            <div class="comments-area default">
                                <div
                                    class="section-title text-sm-title title-wide no-after-title-wide mt-5 mb-0 dt-sl">
                                    <h2>پرسش ها و پاسخ ها</h2>
                                    <p class="count-comment">123 پرسش</p>
                                </div>
                                <ol class="comment-list">
                                    <!-- #comment-## -->
                                    <li>
                                        <div class="comment-body">
                                            <div class="comment-author">
                                                <span class="icon-comment">?</span>
                                                <cite class="fn">حسن</cite>
                                                <span class="says">گفت:</span>
                                                <div class="commentmetadata">
                                                    <a href="#">
                                                        اسفند ۲۰, ۱۳۹۶ در ۹:۴۱ ب.ظ
                                                    </a>
                                                </div>
                                            </div>



                                            <p>لورم ایپسوم متن ساختگی</p>

                                            <div class="reply"><a class="comment-reply-link" href="#">پاسخ</a></div>
                                        </div>
                                    </li>
                                    <!-- #comment-## -->
                                    <li>
                                        <div class="comment-body">
                                            <div class="comment-author">
                                                <span class="icon-comment">?</span>
                                                <cite class="fn">رضا</cite>
                                                <span class="says">گفت:</span>
                                                <div class="commentmetadata">
                                                    <a href="#">
                                                        اسفند ۲۰, ۱۳۹۶ در ۹:۴۲ ب.ظ
                                                    </a>
                                                </div>
                                            </div>
                                            <p>
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                صنعت چاپ و با استفاده از طراحان گرافیک است.
                                            </p>

                                            <div class="reply"><a class="comment-reply-link" href="#">پاسخ</a></div>
                                        </div>
                                        <ol class="children">
                                            <li>
                                                <div class="comment-body">
                                                    <div class="comment-author">
                                                            <span
                                                                class="icon-comment mdi mdi-lightbulb-on-outline"></span>
                                                        <cite class="fn">بهرامی راد</cite> <span
                                                            class="says">گفت:</span>
                                                        <div class="commentmetadata">
                                                            <a href="#">
                                                                اسفند ۲۰, ۱۳۹۶ در ۹:۴۷ ب.ظ
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی
                                                        نامفهوم از صنعت چاپ و با استفاده از
                                                        طراحان گرافیک است.
                                                        چاپگرها و متون بلکه روزنامه و مجله در
                                                        ستون و سطرآنچنان که لازم است و برای
                                                        شرایط فعلی تکنولوژی
                                                        مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                        ابزارهای کاربردی می باشد.</p>

                                                    <div class="reply"><a class="comment-reply-link"
                                                                          href="#">پاسخ</a></div>
                                                </div>
                                                <ol class="children">
                                                    <li>
                                                        <div class="comment-body">
                                                            <div class="comment-author">
                                                                <span class="icon-comment">?</span>
                                                                <cite class="fn">محمد</cite>
                                                                <span class="says">گفت:</span>
                                                                <div class="commentmetadata">
                                                                    <a href="#">
                                                                        خرداد ۳۰, ۱۳۹۷ در ۸:۵۳ ق.ظ
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <p>عالیه</p>

                                                            <div class="reply"><a class="comment-reply-link"
                                                                                  href="#">پاسخ</a></div>
                                                        </div>
                                                        <ol class="children">
                                                            <li>
                                                                <div class="comment-body">
                                                                    <div class="comment-author">
                                                                            <span
                                                                                class="icon-comment mdi mdi-lightbulb-on-outline"></span>
                                                                        <cite class="fn">اشکان</cite>
                                                                        <span class="says">گفت:</span>
                                                                        <div class="commentmetadata">
                                                                            <a href="#">
                                                                                خرداد ۳۰, ۱۳۹۷ در ۸:۵۳ ق.ظ
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <p>لورم ایپسوم متن ساختگی با
                                                                        تولید سادگی نامفهوم از
                                                                        صنعت چاپ و با استفاده از
                                                                        طراحان
                                                                        گرافیک است. چاپگرها و
                                                                        متون بلکه روزنامه و مجله
                                                                        در ستون و سطرآنچنان که
                                                                        لازم است و
                                                                        برای شرایط فعلی تکنولوژی
                                                                        مورد نیاز و کاربردهای
                                                                        متنوع با هدف بهبود
                                                                        ابزارهای
                                                                        کاربردی می باشد.</p>

                                                                    <div class="reply"><a class="comment-reply-link"
                                                                                          href="#">پاسخ</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <!-- #comment-## -->
                                                        </ol>
                                                        <!-- .children -->
                                                    </li>
                                                    <!-- #comment-## -->
                                                </ol>
                                                <!-- .children -->
                                            </li>
                                            <!-- #comment-## -->
                                        </ol>
                                        <!-- .children -->
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End tabs -->
            </div>
            <!-- End Product -->
            <!-- Start Product-Slider -->
            <section class="slider-section dt-sl mb-5">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="section-title text-sm-title title-wide no-after-title-wide">
                            <h2>خریداران این محصول، محصولات زیر را هم خریده‌اند</h2>
                            <a href="#">مشاهده همه</a>
                        </div>
                    </div>

                    <!-- Start Product-Slider -->
                    <div class="col-12">
                        <div class="product-carousel carousel-lg owl-carousel owl-theme">
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                        </div>
                                        <div class="discount">
                                            <span>20%</span>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="shop-single.html">
                                        <img src="./assets/img/products/07.jpg" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="shop-single.html">مانتو زنانه</a>
                                        </h5>
                                        <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                        <span class="product-price">157,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="shop-single.html">
                                        <img src="./assets/img/products/017.jpg" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="shop-single.html">کت مردانه</a>
                                        </h5>
                                        <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                        <span class="product-price">199,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="shop-single.html">
                                        <img src="./assets/img/products/013.jpg" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                        </h5>
                                        <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                        <span class="product-price">135,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="shop-single.html">
                                        <img src="./assets/img/products/09.jpg" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="shop-single.html">مانتو زنانه</a>
                                        </h5>
                                        <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                        <span class="product-price">145,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="shop-single.html">
                                        <img src="./assets/img/products/010.jpg" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="shop-single.html">مانتو زنانه</a>
                                        </h5>
                                        <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                        <span class="product-price">170,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                        <div class="discount">
                                            <span>20%</span>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="shop-single.html">
                                        <img src="./assets/img/products/011.jpg" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="shop-single.html">مانتو زنانه</a>
                                        </h5>
                                        <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                        <span class="product-price">185,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="shop-single.html">
                                        <img src="./assets/img/products/019.jpg" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="shop-single.html">تیشرت مردانه</a>
                                        </h5>
                                        <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                        <span class="product-price">54,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product-Slider -->

                </div>
            </section>
            <!-- End Product-Slider -->
        </div>
    </main>
    <!-- End main-content -->

@endsection
