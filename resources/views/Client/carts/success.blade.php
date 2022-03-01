@extends('Client.layout.master')
@section('content')

    <!-- Start main-content -->
    <main class="main-content dt-sl mt-4 mb-3" style="padding-top: 125px !important;">
        <div class="container main-container">

            <div class="row">
                <div class="cart-page-content col-12 px-0">
                    <div class="checkout-alert dt-sn dt-sn--box mb-4">
                        <div class="circle-box-icon successful">
                            <i class="mdi mdi-check-bold"></i>
                        </div>
                        <div class="checkout-alert-title">
                            <h4> سفارش <span
                                    class="checkout-alert-highlighted checkout-alert-highlighted-success">CRO-75007560</span>
                                با موفقیت در سیستم ثبت شد.
                            </h4>
                        </div>
                        <div class="checkout-alert-content">
                            <p class="checkout-alert-content-success">
                                سفارش نهایتا تا یک روز آماده ارسال خواهد شد.
                            </p>
                        </div>
                    </div>
                    <section class="checkout-details dt-sl dt-sn dt-sn--box mt-4 pt-4 pb-3 pr-3 pl-3 mb-5 px-res-1">
                        <div class="checkout-details-title">
                            <h4>
                                کد سفارش:
                                <span>
                                        CRO-75007560
                                    </span>
                            </h4>
                            <div class="row">
                                <div class="col-lg-9 col-md-8 col-sm-12">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 px-res-0">
                                    <div class="checkout-table">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    نام تحویل گیرنده:
                                                    <span>
                                                        {{auth()->user()->name}}
                                                        </span></p>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    شماره تماس :
                                                    <span>
                                                            {{auth()->user()->mobile}}
                                                        </span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    تعداد مرسوله :
                                                    <span>
                                                            ۱
                                                        </span></p>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    مبلغ کل:
                                                    <span>
                                                            ۴,۴۳۹,۰۰۰ تومان
                                                        </span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    روش پرداخت:
                                                    <span>
                                                            پرداخت اینترنتی
                                                            <span class="green">
                                                                (موفق)
                                                            </span></span></p>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <p>
                                                    وضعیت سفارش:
                                                    <span>
                                                            پرداخت شد
                                                        </span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>آدرس : {{auth()->user()->address[0]->address}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </main>
    <!-- End main-content -->

@endsection