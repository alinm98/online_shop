@extends('Client.layout.master')
@section('content')

    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <div class="row">
                <!-- Start Sidebar -->
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 sticky-sidebar">
                    <div class="profile-sidebar dt-sl">
                        <div class="dt-sl dt-sn border mb-3">
                            <div class="profile-sidebar-header dt-sl">
                                <div class="d-flex align-items-center">
                                    <div class="profile-avatar">
                                        <img src="./assets/img/theme/avatar.png" alt="">
                                    </div>
                                    <div class="profile-header-content mr-3 mt-2">
                                        <span class="d-block profile-username">{{auth()->user()->name}}</span>
                                        <span class="d-block profile-phone">{{auth()->user()->mobile}}</span>
                                    </div>
                                </div>
                                <div class="profile-link mt-2 dt-sl">
                                    <div class="row">
                                        <div class="col-6 text-center">
                                            <a href="{{route('home.user.logout')}}">
                                                <i class="mdi mdi-logout-variant"></i>
                                                <span class="d-block">خروج از حساب</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dt-sl dt-sn border mb-3">
                            <div class="profile-menu-section dt-sl">
                                <div class="label-profile-menu mt-2 mb-2">
                                    <span>حساب کاربری شما</span>
                                </div>
                                <div class="profile-menu">
                                    <ul>
                                        <li>
                                            <a href="#" class="active">
                                                <i class="mdi mdi-account-circle-outline"></i>
                                                پروفایل
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-basket"></i>
                                                همه سفارش ها
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-backburger"></i>
                                                درخواست مرجوعی
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-heart-outline"></i>
                                                لیست علاقمندی ها
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-glasses"></i>
                                                نقد و نظرات
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-sign-direction"></i>
                                                آدرس ها
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-eye-outline"></i>
                                                بازدیدهای اخیر
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-account-edit-outline"></i>
                                                اطلاعات شخصی
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Sidebar -->
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
                                                <span>-</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-section-link">
                                        <a href="#" class="border-bottom-dt">
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
            </div>
        </div>
    </main>
    <!-- End main-content -->

@endsection
