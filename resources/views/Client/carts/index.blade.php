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
                                                        <label class="ui-variant ui-variant--color">
                                                    <span class="ui-variant-shape"
                                                          style="background-color: {{$cart->color->color}}"></span>
                                                            <input type="radio" value="{{$cart->color->id}}" name="color"
                                                                   class="variant-selector"
                                                                   >
                                                            <span class="ui-variant--check">{{$cart->color->title}}</span>
                                                        </label>
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
                                                        $total += ($cart->product->price) * $cart->count;
                                                        ?>
                                                        <td><strong>{{number_format($cart->product->price)}}
                                                                تومان</strong></td>
                                                    @endif
                                                    @if(!empty($cart->product->discount))
                                                        <?php
                                                        $total += ($cart->product->getDiscount()) * $cart->count;
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
                                                <img src="./assets/img/svg/delivery.svg" alt="">
                                                تحویل اکسپرس
                                            </li>
                                        </ul>
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
