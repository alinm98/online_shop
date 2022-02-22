@extends('Client.layout.master')
@section('content')

    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <div class="row">
                <div class="col-12">
                    <div class="dt sl dt-sn dt-sn--box border pt-3 pb-5">
                        <div class="cart-page cart-empty">
                            <div class="circle-box-icon">
                                <i class="mdi mdi-cart-remove"></i>
                            </div>
                            <p class="cart-empty-title">سبد خرید شما خالیست!</p>
                            <a href="{{route('home.index')}}" class="btn-primary-cm">ادامه خرید در کرون</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>


@endsection
