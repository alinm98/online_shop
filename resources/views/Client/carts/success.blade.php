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
                            <h4> سفارش شما
                                با موفقیت در سیستم ثبت شد.
                            </h4>
                        </div>
                        <div class="checkout-alert-content">
                            <p class="checkout-alert-content-success">
                                سفارش شما اکنون در حال بررسی است.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <!-- End main-content -->

@endsection
