@extends('Client.layout.profile')
@section('main')


    <!-- Start Content -->
    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
        <div class="row">
            <div class="col-xl-10 col-lg-12">
                <div class="px-3">
                    <div
                        class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2">
                        <h2>اطلاعات شخصی</h2>
                    </div>
                    <div class="profile-section dt-sl">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="label-info">
                                    <span>نام :</span>
                                </div>
                                <div class="value-info">
                                    <span>{{auth()->user()->name}}</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="label-info">
                                    <span>پست الکترونیک:</span>
                                </div>
                                <div class="value-info">
                                    <span>{{auth()->user()->email}}</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="label-info">
                                    <span>شماره تلفن همراه:</span>
                                </div>
                                <div class="value-info">
                                    <span>{{auth()->user()->mobile}}</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="label-info">
                                    <span>کد ملی:</span>
                                </div>
                                <div class="value-info">
                                    <span>{{auth()->user()->code_melli}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="profile-section-link">
                            <a href="{{route('home.profile.edit')}}" class="border-bottom-dt">
                                <i class="mdi mdi-account-edit-outline"></i>
                                ویرایش اطلاعات شخصی
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->



@endsection
