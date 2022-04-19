@extends('Client.layout.master')
@section('content')

    <!-- Start main-content -->
    <main class="main-content dt-sl mt-4 mb-3" style="padding-top: 125px !important;">
        <div class="container main-container">
            <div class="row">
                <div class="cart-page-content col-12 px-0">
                    <div class="checkout-alert dt-sn dt-sn--box mb-4">
                        <div class="circle-box-icon failed">
                            <i class="mdi mdi-close"></i>
                        </div>
                        <div class="checkout-alert-title">
                            <h4>سفارش شما
                                ثبت شد اما پرداخت ناموفق بود.
                            </h4>
                        </div>
                        <div class="checkout-alert-content">
                            <p>
                                    <span class="checkout-alert-content-failed">برای جلوگیری از لغو سیستمی سفارش، تا ۱
                                        روز آینده پرداخت را انجام دهید.</span>
                                <br>
                                <span class="checkout-alert-content-failed">
                                       شما میتوانید با <a href="{{route('home.profile.order')}}">کلیک بر بروی این لینک</a> سفارشات خود را پیگیری کنید.</span>
                                <br>
                                <span class="checkout-alert-content-small px-res-1">
                                        چنانچه طی این فرایند مبلغی از حساب شما کسر شده است، طی ۷۲ ساعت آینده به حساب شما
                                        باز خواهد گشت.
                                    </span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <!-- End main-content -->

@endsection
