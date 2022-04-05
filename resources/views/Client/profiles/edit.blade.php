@extends('Client.layout.profile')
@section('main')

    <!-- Start Content -->
    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
        <div class="row">
            <div class="col-12">
                <div class="px-3 px-res-0">
                    <div
                        class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                        <h2>ویرایش اطلاعات شخصی</h2>
                    </div>
                    <div class="form-ui additional-info dt-sl dt-sn pt-4">
                        <form action="{{route('home.profile.update',$user)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-row-title">
                                        <h3>نام و نام خانوادگی</h3>
                                    </div>
                                    <div class="form-row">
                                        <input type="text" class="input-ui pr-2" name="name"
                                               placeholder="نام خود را وارد نمایید" value="{{$user->name}}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-row-title">
                                        <h3>کد ملی</h3>
                                    </div>
                                    <div class="form-row">
                                        <input type="text" class="input-ui pl-2 text-left dir-ltr" name="code_melli"
                                               value="{{$user->code_melli}}"
                                               placeholder="کد ملی خود را بدون خط تیره یا فاصله بنویسید">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-row-title">
                                        <h3>شماره موبایل</h3>
                                    </div>
                                    <div class="form-row">
                                        <input type="text" class="input-ui pl-2 text-left dir-ltr" name="mobile"
                                               placeholder="شماره موبایل خود را وارد نمایید"
                                               value="{{$user->mobile}}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-row-title">
                                        <h3>آدرس ایمیل</h3>
                                    </div>
                                    <div class="form-row">
                                        <input type="email" class="input-ui pl-2 text-left dir-ltr" name="email"
                                               placeholder="آدرس ایمیل خود را وارد نمایید"
                                               value="{{$user->email}}">
                                    </div>
                                </div>

                            </div>
                            <div class="dt-sl">
                                <div class="form-row mt-3 justify-content-end">
                                    <button class="btn-primary-cm btn-with-icon ml-2" type="submit">
                                        <i class="mdi mdi-account-circle-outline"></i>
                                        ویرایش اطلاعات کاربری
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

@endsection
