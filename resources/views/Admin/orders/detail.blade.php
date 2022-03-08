@extends('Admin.layout.master')
@section('content')

    <div class="container mt-5 dir-rtl" style="padding-top: 10px !important;">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="p-3 bg-white rounded">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="text-uppercase">صورت حساب</h1>
                            <div class="billed"><span class="font-weight-bold text-uppercase">نام کاربر : </span><span
                                    class="ml-1">{{$order->user->name}}</span></div>
                            <div class="billed"><span class="font-weight-bold text-uppercase">تاریخ : </span><span
                                    class="ml-1">{{\Hekmatinasser\Verta\Verta::instance($order->created_at)}}</span>
                            </div>
                            <div class="billed"><span
                                    class="font-weight-bold text-uppercase"> شناسه پرداخت : </span><span
                                    class="ml-1">{{(new \App\Models\Order)->transaction($order->transaction_id)}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>نام محصول</th>
                                    <th>تعداد</th>
                                    <th>قیمت</th>
                                    <th>مجموع</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($details as $detail)
                                    <tr>
                                        <td>{{$detail->product->name}}</td>
                                        <td>1</td>
                                        <td>{{$detail->product->price}}</td>
                                        <td>{{$detail->product->price}}</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>مجموع</td>
                                    <td>{{$total}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-right mb-3">
                        <button class="btn btn-danger btn-sm mr-5" type="button">Pay Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
