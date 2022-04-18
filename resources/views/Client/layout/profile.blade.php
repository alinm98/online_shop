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
                                        <img src="/client/assets/img/theme/user.png" alt="">
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
                                            <a href="{{route('home.profile.index')}}">
                                                <i class="mdi mdi-account-circle-outline"></i>
                                                پروفایل
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('home.profile.order')}}">
                                                <i class="mdi mdi-basket"></i>
                                                همه سفارش ها
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('home.profile.comment')}}">
                                                <i class="mdi mdi-glasses"></i>
                                                نقد و نظرات
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('home.address.index')}}">
                                                <i class="mdi mdi-sign-direction"></i>
                                                آدرس ها
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Sidebar -->
                @yield('main')

            </div>
        </div>
    </main>
    <!-- End main-content -->

@endsection
