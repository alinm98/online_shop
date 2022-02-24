@extends('Client.layout.master')
@section('content')

    <!-- Start main-content -->
    <main class="main-content dt-sl mt-4 mb-3" style="padding-top: 120px">
        <div class="container main-container">
            <div class="row">
                <div class="cart-page-content col-xl-9 col-lg-8 col-12 px-0">
                    <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                        <h2>انتخاب آدرس تحویل سفارش</h2>
                    </div>
                    <section class="page-content dt-sl">
                        <div class="address-section">
                            <div class="checkout-contact dt-sn dt-sn--box border px-0 pt-0 pb-0">
                                <div class="checkout-contact-content">
                                    <ul class="checkout-contact-items">
                                        <li class="checkout-contact-item">
                                            گیرنده:
                                            <span class="full-name">{{auth()->user()->name}}</span>
                                            <a class="checkout-contact-btn-edit" href="{{route('home.address.index')}}">اصلاح
                                                این آدرس</a>
                                        </li>
                                        <li class="checkout-contact-item">
                                            <div class="checkout-contact-item checkout-contact-item-mobile">
                                                شماره تماس:
                                                <span class="mobile-phone">{{auth()->user()->mobile}}</span>
                                            </div>
                                            <div class="checkout-contact-item-message">
                                                کد پستی:
                                                <span class="post-code">{{$address->zip_code}}</span>
                                            </div>
                                            <br>
                                            {{$address->address}}
                                        </li>
                                    </ul>
                                    <a class="checkout-contact-location" id="btn-checkout-contact-location"
                                       href="{{route('home.address.index')}}">تغییر
                                        آدرس
                                        ارسال</a>
                                    <div class="checkout-contact-badge">
                                        <i class="mdi mdi-check-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form method="post" id="shipping-data-form" class="dt-sn dt-sn--box pt-3 pb-3">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                                <h2>انتخاب نحوه ارسال</h2>
                            </div>
                            <div class="checkout-shipment border-bottom pb-3 mb-4">
                                <div class="custom-control custom-radio pl-0 pr-3">
                                    <input type="radio" class="custom-control-input" name="radio1" id="radio1"
                                           value="option1" checked>
                                    <label for="radio1" class="custom-control-label">
                                        عادی
                                    </label>
                                </div>
                                <div class="custom-control custom-radio  pl-0 pr-3">
                                    <input type="radio" class="custom-control-input" name="radio1" id="radio2"
                                           value="option2">
                                    <label for="radio2" class="custom-control-label">
                                        سریع‌ (مرسوله‌ها در سریع‌ترین زمان ممکن ارسال می‌شوند)
                                    </label>
                                </div>
                            </div>
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                                <h2>مرسوله ۱ از ۱</h2>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                    <div class="dt-sn dt-sn--box border mb-2">
                        <ul class="checkout-summary-summary">
                            <li>
                                <span>مبلغ کل ({{$count}} کالا)</span><span>{{$total}} تومان</span>
                            </li>
                            <li>
                                    <span>هزینه ارسال<span class="help-sn" data-toggle="tooltip" data-html="true"
                                                           data-placement="bottom"
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
                                <span class="checkout-summary-price-value-amount">{{$total}}</span>
                                تومان
                            </div>
                            <a href="{{route('home.order.store')}}" class="mb-2 d-block">
                                <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
                                    <i class="mdi mdi-arrow-left"></i>
                                    تایید و ادامه ثبت سفارش
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
    </main>
    <!-- End main-content -->

@endsection
