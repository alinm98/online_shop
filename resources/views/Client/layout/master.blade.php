<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#f7858d">
    <meta name="msapplication-navbutton-color" content="#f7858d">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f7858d">
    <title>didikala | Index Page</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="/client/assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="/client/assets/css/vendor/materialdesignicons.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/client/assets/css/vendor/bootstrap.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="/client/assets/css/vendor/bootstrap-slider.min.css">
    <link rel="stylesheet" href="/client/assets/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="/client/assets/css/vendor/jquery.horizontalmenu.css">
    <link rel="stylesheet" href="/client/assets/css/vendor/fancybox.min.css">
    <link rel="stylesheet" href="/client/assets/css/vendor/nice-select.css">
    <link rel="stylesheet" href="/client/assets/css/vendor/nouislider.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="/client/assets/css/main.css">
    <link rel="stylesheet" href="/client/assets/css/colors/default.css" id="colorswitch">
</head>

<body>
<div class="wrapper">
    <!-- Start header -->
    <header class="main-header">
        <!-- Start topbar -->
        <div class="container main-container">
            <div class="topbar dt-sl">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-6">
                        <div class="logo-area">
                            <a href="#">
                                <img src="/client/assets/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 hidden-sm">
                        <div class="search-area dt-sl">
                            <form action="" class="search">
                                <input type="text"
                                       placeholder="نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…">
                                <i class="far fa-search search-icon"></i>
                                <button class="close-search-result" type="button"><i
                                        class="mdi mdi-close"></i></button>
                                <div class="search-result">
                                    <ul>
                                        <li>
                                            <a href="#">موبایل</a>
                                        </li>
                                        <li>
                                            <a href="#">مد و پوشاک</a>
                                        </li>
                                        <li>
                                            <a href="#">میکروفن</a>
                                        </li>
                                        <li>
                                            <a href="#">میز تلویزیون</a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-6 topbar-left">
                        <ul class="nav float-left">
                            <li class="nav-item account dropdown">
                                <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <span class="label-dropdown">
                                        @if(auth()->check())
                                            {{auth()->user()->name}}
                                        @endif
                                        @if(!auth()->check())
                                            نام کاربری
                                        @endif
                                    </span>
                                    <i class="mdi mdi-account-circle-outline"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
                                    @if(!auth()->check())
                                        <a class="dropdown-item" href="{{route('home.user.showLogin')}}">
                                            <i class="mdi mdi-account-card-details-outline"></i>ورود
                                        </a>
                                        <a class="dropdown-item" href="{{route('home.user.signup')}}">
                                            <i class="mdi mdi-account-card-details-outline"></i>ثبت نام
                                        </a>

                                    @endif

                                    @if(auth()->check())
                                        <a class="dropdown-item" href="{{route('home.profile.index')}}">
                                            <i class="mdi mdi-account-card-details-outline"></i>پروفایل
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span class="float-left badge badge-dark">۴</span>
                                            <i class="mdi mdi-comment-text-outline"></i>پیغام ها
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="mdi mdi-account-edit-outline"></i>ویرایش حساب کاربری
                                        </a>
                                        <div class="dropdown-divider" role="presentation"></div>
                                        <a class="dropdown-item" href="{{route('home.user.logout')}}">
                                            <i class="mdi mdi-logout-variant"></i>خروج
                                        </a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End topbar -->

        <!-- Start bottom-header -->
        <div class="bottom-header dt-sl mb-sm-bottom-header">
            <div class="container main-container">
                <!-- Start Main-Menu -->
                <nav class="main-menu d-flex justify-content-md-between justify-content-end dt-sl">
                    <ul class="list hidden-sm">
                        <!-- mega menu 3 column -->

                        @foreach($categories_parents as $categories_parent)
                            <li class="list-item list-item-has-children mega-menu mega-menu-col-3">
                                <a class="nav-link" href="#">{{$categories_parent->title}}</a>
                                <ul class="sub-menu nav">

                                    @foreach($categories_parent->children as $category)
                                        <li class="list-item list-item-has-children">
                                            <a class="nav-link" href="#">{{$category->title}}</a>
                                            @if(count($category->children)>0)
                                                @foreach($category->children as $value)
                                                    <ul class="sub-menu nav">
                                                        <li class="list-item">
                                                            <a class="nav-link" href="#">{{$value->title}}</a>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach


                    </ul>
                    <div class="nav">
                        <div class="nav-item cart--wrapper">
                            <a class="nav-link" href="#">
                                <span class="label-dropdown">سبد خرید</span>
                                <i class="mdi mdi-cart-outline"></i>
                                <span class="count">2</span>
                            </a>
                            <div class="header-cart-info">
                                <div class="header-cart-info-header">
                                    <div class="header-cart-info-count">
                                        3 کالا
                                    </div>
                                    <a href="#" class="header-cart-info-link">
                                        <span>مشاهده سبد خرید</span>
                                    </a>
                                </div>
                                <ul class="header-basket-list do-nice-scroll">
                                    <li class="cart-item">
                                        <a href="#" class="header-basket-list-item">
                                            <div class="header-basket-list-item-image">
                                                <img src="/client/assets/img/cart/1.jpg" alt="">
                                            </div>
                                            <div class="header-basket-list-item-content">
                                                <p class="header-basket-list-item-title">
                                                    گوشی موبایل سامسونگ مدل Galaxy A30 SM-A305F/DS دو سیم کارت ظرفیت
                                                    64 گیگابایت
                                                </p>
                                                <div class="header-basket-list-item-footer">
                                                    <div class="header-basket-list-item-props">
                                                            <span class="header-basket-list-item-props-item">
                                                                1 x
                                                            </span>
                                                        <span class="header-basket-list-item-props-item">
                                                                <div class="header-basket-list-item-color-badge"
                                                                     style="background: #2196f3"></div>
                                                                آبی
                                                            </span>
                                                    </div>
                                                    <button class="header-basket-list-item-remove">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="cart-item">
                                        <a href="#" class="header-basket-list-item">
                                            <div class="header-basket-list-item-image">
                                                <img src="/client/assets/img/cart/2.jpg" alt="">
                                            </div>
                                            <div class="header-basket-list-item-content">
                                                <p class="header-basket-list-item-title">
                                                    گوشی موبایل هوآوی مدل Y9 2019 JKM-LX1 دو سیم کارت ظرفیت 64
                                                    گیگابایت
                                                </p>
                                                <div class="header-basket-list-item-footer">
                                                    <div class="header-basket-list-item-props">
                                                            <span class="header-basket-list-item-props-item">
                                                                1 x
                                                            </span>
                                                        <span class="header-basket-list-item-props-item">
                                                                <div class="header-basket-list-item-color-badge"
                                                                     style="background: #212121"></div>
                                                                سفید
                                                            </span>
                                                    </div>
                                                    <button class="header-basket-list-item-remove">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="cart-item">
                                        <a href="#" class="header-basket-list-item">
                                            <div class="header-basket-list-item-image">
                                                <img src="/client/assets/img/cart/3.jpg" alt="">
                                            </div>
                                            <div class="header-basket-list-item-content">
                                                <p class="header-basket-list-item-title">
                                                    گوشی موبایل سامسونگ مدل Galaxy A70 SM-A705FN/DS دو سیم‌کارت
                                                    ظرفیت 128 گیگابایت
                                                </p>
                                                <div class="header-basket-list-item-footer">
                                                    <div class="header-basket-list-item-props">
                                                            <span class="header-basket-list-item-props-item">
                                                                1 x
                                                            </span>
                                                        <span class="header-basket-list-item-props-item">
                                                                <div class="header-basket-list-item-color-badge"
                                                                     style="background: #FFFFFF"></div>
                                                                سفید
                                                            </span>
                                                    </div>
                                                    <button class="header-basket-list-item-remove">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="header-cart-info-footer">
                                    <div class="header-cart-info-total">
                                        <span class="header-cart-info-total-text">مبلغ قابل پرداخت:</span>
                                        <p class="header-cart-info-total-amount">
                                                <span class="header-cart-info-total-amount-number">
                                                    9,500,000 <span>تومان</span></span>
                                        </p>
                                    </div>

                                    <div>
                                        <a href="#" class="header-cart-info-submit">
                                            ثبت سفارش
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn-menu">
                        <div class="align align__justify">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                    <div class="side-menu">
                        <div class="logo-nav-res dt-sl text-center">
                            <a href="#">
                                <img src="assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <div class="search-box-side-menu dt-sl text-center mt-2 mb-3">
                            <form action="">
                                <input type="text" name="s" placeholder="جستجو کنید...">
                                <i class="mdi mdi-magnify"></i>
                            </form>
                        </div>
                        <ul class="navbar-nav dt-sl">
                            <li class="sub-menu">
                                <a href="#">کالای دیجیتال</a>
                                <ul>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو چهار</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">عنوان دسته</a>
                                    </li>
                                    <li>
                                        <a href="#">عنوان دسته</a>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو چهار</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="#">بهداشت و سلامت</a>
                                <ul>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو چهار</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">عنوان دسته</a>
                                    </li>
                                    <li>
                                        <a href="#">عنوان دسته</a>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو چهار</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="#">ابزار و اداری</a>
                                <ul>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو چهار</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">عنوان دسته</a>
                                    </li>
                                    <li>
                                        <a href="#">عنوان دسته</a>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو چهار</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">مد و پوشاک</a>
                            </li>
                            <li>
                                <a href="#">خانه و آشپزخانه</a>
                            </li>
                            <li>
                                <a href="#">ورزش و سفر</a>
                            </li>
                        </ul>
                    </div>
                    <div class="overlay-side-menu">
                    </div>
                </nav>
                <!-- End Main-Menu -->
            </div>
        </div>
        <!-- End bottom-header -->
    </header>
    <!-- End header -->
@yield('content')
<!-- Start footer -->
    <footer class="main-footer dt-sl">
        <div class="back-to-top">
            <a href="#"><span class="icon"><i class="mdi mdi-chevron-up"></i></span> <span>بازگشت به
                        بالا</span></a>
        </div>
        <div class="container main-container">
            <div class="footer-widgets">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="widget-menu widget card">
                            <header class="card-header">
                                <h3 class="card-title">راهنمای خرید از تاپ کالا</h3>
                            </header>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">نحوه ثبت سفارش</a>
                                </li>
                                <li>
                                    <a href="#">رویه ارسال سفارش</a>
                                </li>
                                <li>
                                    <a href="#">شیوه‌های پرداخت</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="widget-menu widget card">
                            <header class="card-header">
                                <h3 class="card-title">خدمات مشتریان</h3>
                            </header>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">پاسخ به پرسش‌های متداول</a>
                                </li>
                                <li>
                                    <a href="#">رویه‌های بازگرداندن کالا</a>
                                </li>
                                <li>
                                    <a href="#">شرایط استفاده</a>
                                </li>
                                <li>
                                    <a href="#">حریم خصوصی</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="widget-menu widget card">
                            <header class="card-header">
                                <h3 class="card-title">با تاپ کالا</h3>
                            </header>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">فروش در تاپ کالا</a>
                                </li>
                                <li>
                                    <a href="#">همکاری با سازمان‌ها</a>
                                </li>
                                <li>
                                    <a href="#">فرصت‌های شغلی</a>
                                </li>
                                <li>
                                    <a href="#">تماس با تاپ کالا</a>
                                </li>
                                <li>
                                    <a href="#">درباره تاپ کالا</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="newsletter">
                            <p>از تخفیف‌ها و جدیدترین‌های فروشگاه باخبر شوید:</p>
                            <form action="">
                                <input type="email" class="form-control"
                                       placeholder="آدرس ایمیل خود را وارد کنید...">
                                <input type="submit" class="btn btn-primary" value="ارسال">
                            </form>
                        </div>
                        <div class="socials">
                            <p>ما را در شبکه های اجتماعی دنبال کنید.</p>
                            <div class="footer-social">
                                <ul class="text-center">
                                    <li><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                                    <li><a href="#"><i class="mdi mdi-telegram"></i></a></li>
                                    <li><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="mdi mdi-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info">
                <div class="row">
                    <div class="col-12 text-right">
                        <span>هفت روز هفته ، 24 ساعت شبانه‌روز پاسخگوی شما هستیم.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="description">
            <div class="container main-container">
                <div class="row">
                    <div class="site-description col-12 col-lg-7">
                        <h1 class="site-title">فروشگاه اینترنتی تاپ کالا، بررسی، انتخاب و خرید آنلاین</h1>
                        <p>
                            تاپ کالا به عنوان یکی از قدیمی‌ترین فروشگاه های اینترنتی با بیش از یک دهه تجربه، با
                            پایبندی به سه اصل کلیدی، پرداخت در
                            محل، 7 روز ضمانت بازگشت کالا و تضمین اصل‌بودن کالا، موفق شده تا همگام با فروشگاه‌های
                            معتبر جهان، به بزرگ‌ترین فروشگاه
                            اینترنتی ایران تبدیل شود. به محض ورود به تاپ کالا با یک سایت پر از کالا رو به رو
                            می‌شوید! هر آنچه که نیاز دارید و به
                            ذهن شما خطور می‌کند در اینجا پیدا خواهید کرد.
                        </p>
                    </div>
                    <div class="symbol col-12 col-lg-5">
                        <a href="#" target="_blank"><img src="assets/img/symbol-01.png" alt=""></a>
                        <a href="#" target="_blank"><img src="assets/img/symbol-02.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container main-container">
                <p>
                    استفاده از مطالب فروشگاه اینترنتی تاپ کالا فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است.
                    کلیه حقوق این سایت متعلق
                    به شرکت نوآوران فن آوازه (فروشگاه آنلاین تاپ کالا) می‌باشد.
                </p>
            </div>
        </div>
    </footer>
    <!-- End footer -->
</div>
<!-- Core JS Files -->
<script src="/client/assets/js/vendor/jquery-3.4.1.min.js"></script>
<script src="/client/assets/js/vendor/popper.min.js"></script>
<script src="/client/assets/js/vendor/bootstrap.min.js"></script>
<!-- Plugins -->
<script src="/client/assets/js/vendor/bootstrap-slider.min.js"></script>
<script src="/client/assets/js/vendor/owl.carousel.min.js"></script>
<script src="/client/assets/js/vendor/owl.carousel2.thumbs.min.js"></script>
<script src="/client/assets/js/vendor/jquery.nicescroll.min.js"></script>
<script src="/client/assets/js/vendor/jquery.nice-select.min.js"></script>
<script src="/client/assets/js/vendor/nouislider.min.js"></script>
<script src="/client/assets/js/vendor/jquery.horizontalmenu.js"></script>
<script src="/client/assets/js/vendor/jquery.fancybox.min.js"></script>
<script src="/client/assets/js/vendor/countdown.min.js"></script>
<script src="/client/assets/js/vendor/wNumb.js"></script>
<script src="/client/assets/js/vendor/ResizeSensor.min.js"></script>
<script src="/client/assets/js/vendor/theia-sticky-sidebar.min.js"></script>
<!-- Main JS File -->
<script src="/client/assets/js/main.js"></script>
</body>

</html>
