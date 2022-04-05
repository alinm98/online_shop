@extends('Client.layout.master')
@section('content')

    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <div class="row mx-0">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 mb-2">
                    <nav class="tab-cart-page">
                        <div class="nav nav-tabs border-bottom" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link d-inline-flex w-auto active" id="nav-home-tab"
                               data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
                               aria-selected="true">سبد خرید<span class="count-cart">1</span></a>
                        </div>
                    </nav>
                </div>
                <div class="col-12">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab">
                            <div class="row">
                                <div class="col-xl-9 col-lg-8 col-12 px-0">
                                    <div class="table-responsive checkout-content dt-sl">
                                        <div class="checkout-header checkout-header--express">
                                            <span class="checkout-header-title">ارسال عادی</span>
                                            <span class="checkout-header-extra-info">({{$count}} کالا)</span>
                                        </div>
                                        <table class="table table-cart">
                                            <tbody>
                                            @foreach($carts as $cart)
                                                <tr class="checkout-item border-bottom">
                                                    <td>
                                                        <img
                                                            src="{{str_replace('public','/storage',$cart->product->image)}}"
                                                            alt="" width="100px" height="125px">
                                                        <form action="{{route('home.cart.destroy',$cart)}}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="checkout-btn-remove" type="submit">
                                                                <i class="fa fa-trash" aria-hidden="true"
                                                                   style="color: red"></i></button>
                                                        </form>
                                                    </td>
                                                    <td class="text-right">
                                                        <p class="checkout-dealer">
                                                            {{$cart->product->name}}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">تعداد</p>
                                                        <div class="number-input">
                                                            <a href="{{route('home.cart.decrease',$cart)}}">
                                                                <button></button>
                                                            </a>
                                                            <input class="quantity" min="0" name="quantity"
                                                                   value="{{$cart->count}}" type="number" disabled>
                                                            <a href="{{route('home.cart.increase',$cart)}}">
                                                                <button class="plus"></button>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    @if(empty($cart->product->discount))
                                                        <?php
                                                        $total += ($cart->product->price)*$cart->count;
                                                        ?>
                                                        <td><strong>{{number_format($cart->product->price)}}
                                                                تومان</strong></td>
                                                    @endif
                                                    @if(!empty($cart->product->discount))
                                                        <?php
                                                        $total += ($cart->product->getDiscount())*$cart->count;
                                                        ?>
                                                        <td><strong>{{number_format($cart->product->getDiscount())}}
                                                                تومان</strong></td>
                                                    @endif
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                                    <div class="dt-sn dt-sn--box border mb-2">
                                        <ul class="checkout-summary-summary">
                                            <li>
                                                <span>مبلغ کل ({{$count}} کالا)</span><span>{{number_format($total)}} تومان</span>
                                            </li>
                                            <li>
                                                    <span>هزینه ارسال<span class="help-sn" data-toggle="tooltip"
                                                                           data-html="true" data-placement="bottom"
                                                                           title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>هزینه ارسال مرسولات می‌تواند وابسته به شهر و آدرس گیرنده متفاوت باشد. در صورتی که هر یک از مرسولات حداقل ارزشی برابر با ۱۵۰هزار تومان داشته باشد، آن مرسوله بصورت رایگان ارسال می‌شود.<br>'حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر باشد.'</p></div>">
                                                            <span class="mdi mdi-information-outline"></span>
                                                        </span></span><span>وابسته به آدرس</span>
                                            </li>
                                        </ul>
                                        <div class="checkout-summary-devider">
                                            <div></div>
                                        </div>
                                        <div class="checkout-summary-content">
                                            <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                                            <div class="checkout-summary-price-value">
                                                <span
                                                    class="checkout-summary-price-value-amount">{{number_format($total)}}</span>
                                                تومان
                                            </div>
                                            <a href="{{route('home.cart.confirming')}}" class="mb-2 d-block">
                                                <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0">
                                                    <i class="mdi mdi-arrow-left"></i>
                                                    ادامه ثبت سفارش
                                                </button>
                                            </a>
                                            <div>
                                                    <span>
                                                        کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش
                                                        مراحل بعدی را تکمیل کنید.
                                                    </span><span class="help-sn" data-toggle="tooltip" data-html="true"
                                                                 data-placement="bottom"
                                                                 title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش، دیجی‌کالا هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                                                        <span class="mdi mdi-information-outline"></span>
                                                    </span></div>
                                        </div>
                                    </div>
                                    <div class="dt-sn dt-sn--box checkout-feature-aside pt-4">
                                        <ul>
                                            <li class="checkout-feature-aside-item">
                                                <img src="./assets/img/svg/return-policy.svg" alt="">
                                                هفت روز ضمانت تعویض
                                            </li>
                                            <li class="checkout-feature-aside-item">
                                                <img src="./assets/img/svg/payment-terms.svg" alt="">
                                                پرداخت در محل با کارت بانکی
                                            </li>
                                            <li class="checkout-feature-aside-item">
                                                <img src="./assets/img/svg/delivery.svg" alt="">
                                                تحویل اکسپرس
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                             aria-labelledby="nav-profile-tab">
                            <div class="row">
                                <div class="col-xl-9 col-lg-8 col-12 px-0">
                                    <div class="table-responsive checkout-content dt-sl">
                                        <div class="checkout-header checkout-header--express">
                                            <span class="checkout-header-title">ارسال عادی</span>
                                            <span class="checkout-header-extra-info">(2 کالا)</span>
                                            <a class="checkout-add-all-to-cart">
                                                افزودن همه به سبد خرید
                                            </a>
                                        </div>
                                        <table class="table table-cart">
                                            <tbody>
                                            <tr class="checkout-item border-bottom">
                                                <td>
                                                    <img src="./assets/img/cart/04.jpg" alt="">
                                                    <button class="checkout-btn-remove">&times;</button>
                                                </td>
                                                <td class="text-right">
                                                    <a href="#">
                                                        <h3 class="checkout-title">
                                                            گوشی موبایل اپل مدل iPhone X ظرفیت 256 گیگابایت
                                                        </h3>
                                                    </a>
                                                    <p class="checkout-dealer">
                                                        فروشنده: آیش شبکه
                                                    </p>
                                                    <p class="checkout-guarantee">گارانتی 18 ماهه آیش
                                                    </p>
                                                    <div class="checkout-variant checkout-variant--color">
                                                        <span class="checkout-variant-title">رنگ :</span>
                                                        <span class="checkout-variant-value">
                                                                    مشکی
                                                                    <div class="checkout-variant-shape"
                                                                         style="background-color:#212121"></div>
                                                                </span>
                                                    </div>
                                                    <a class="checkout-save-for-later">افزودن به سبد خرید</a>
                                                </td>
                                                <td>
                                                    <p class="mb-0">تعداد</p>
                                                    <div class="number-input">
                                                        <button
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                               value="1" type="number">
                                                        <button
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                            class="plus"></button>
                                                    </div>
                                                </td>
                                                <td><strong>۱۲,۲۰۰,۰۰۰ تومان</strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                                    <div class="dt-sn dt-sn--box border">
                                        <div
                                            class="section-title text-sm-title title-wide mb-1 no-after-title-wide mb-2">
                                            <h2 class="text-dark">لیست خرید بعدی چیست؟</h2>
                                        </div>
                                        <p class="text-secondary text-justify">
                                            شما می‌توانید محصولاتی که به سبد خرید
                                            خود افزوده اید و موقتا قصد خرید آن‌ها را ندارید، در لیست خرید بعدی خود
                                            قرار داده و
                                            هر زمان مایل بودید آن‌ها را مجدداً به سبد خرید اضافه کرده و خرید آن‌ها
                                            را تکمیل کنید.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End main-content -->

@endsection
