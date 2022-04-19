@extends('Client.layout.profile')
@section('main')

    <!-- Start Content -->
    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
        <div class="row">
            <div class="col-12">
                <div
                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                    <h2>همه سفارش‌ها</h2>
                </div>
                <div class="dt-sl">
                    <div class="table-responsive">
                        <table class="table table-order">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>شماره سفارش</th>
                                <th>تاریخ ثبت سفارش</th>
                                <th>مبلغ کل</th>
                                <th>عملیات پرداخت</th>
                                <td>عملیات ارسال</td>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $key=>$order)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>CR-{{(new \App\Models\Order)->transaction($order->transaction_id)}}</td>
                                    <td>{{\Hekmatinasser\Verta\Verta::instance($order->created_at)}}</td>
                                    <td>{{number_format($order->total)}} تومان</td>
                                    @if($order->status == 'OK')
                                        <td>
                                            <button class="btn btn-success active">پرداخت
                                                موفق
                                            </button>
                                        </td>
                                    @endif
                                    @if($order->status == 'wait')
                                        <td>
                                            <a class="btn btn-warning" href="{{route('home.order.pay.again',$order)}}">برای
                                                پرداخت کلیک کنید</a>
                                        </td>
                                    @endif
                                    <td>
                                        @if($order->confirm==1)
                                            <button class="btn btn-success active">ارسال شده</button>
                                        @endif
                                        @if($order->confirm!=1)
                                            <button class="btn btn-primary active">در حال بررسی</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

@endsection
