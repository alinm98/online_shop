@extends('Client.layout.master')
@section('content')

    <main class="main-content dt-sl mt-4 mb-3" style="padding-top: 145px !important;">
        <div class="container main-container">
            <div class="row mb-5">
                <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">
                    <div class="auth-wrapper form-ui border pt-4">
                        <div class="section-title title-wide mb-1 no-after-title-wide">
                            <h2 class="font-weight-bold">ثبت نام</h2>
                        </div>
                        <form action="{{route('home.user.store')}}" method="post">
                            @csrf
                            <div class="form-row-title">
                                <h3>نام</h3>
                            </div>
                            <div class="form-row with-icon">
                                <input type="text" class="input-ui pr-2" name="name"
                                       placeholder="نام خود را وارد نمایید">
                                <i class="mdi mdi-account-circle-outline"></i>
                            </div>

                            <div class="form-row-title">
                                <h3>ایمیل</h3>
                            </div>
                            <div class="form-row with-icon">
                                <input type="email" class="input-ui pr-2" name="email"
                                       placeholder="ایمیل خود را وارد نمایید">
                                <i class="mdi mdi-account-circle-outline"></i>
                            </div>

                            <div class="form-row-title">
                                <h3>شماره تلفن</h3>
                            </div>
                            <div class="form-row with-icon">
                                <input type="number" class="input-ui pr-2" name="mobile"
                                       placeholder="0912XXXXXXX">
                                <i class="mdi mdi-lock-open-variant-outline"></i>
                            </div>


                            <div class="form-row-title">
                                <h3>رمز عبور</h3>
                            </div>
                            <div class="form-row with-icon">
                                <input type="password" class="input-ui pr-2" name="password"
                                       placeholder="رمز عبور خود را وارد نمایید">
                                <i class="mdi mdi-lock-open-variant-outline"></i>
                            </div>

                            <div class="form-row mt-3">
                                <button class="btn-primary-cm btn-with-icon mx-auto w-100">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    ثبت نام در کرون
                                </button>
                            </div>
                            <div class="form-row mt-3 ">
                            @if(count($errors->all()) > 0)
                                <ul class="bg-danger">
                                    @foreach($errors->all() as $error)
                                        <li class="text-black">{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif
                            </div>
                        </form>
                        <div class="form-footer mt-3">
                            <div>
                                <span class="font-weight-bold">قبلا ثبت نام کرده اید؟</span>
                                <a href="{{route('home.user.showLogin')}}" class="mr-3 mt-2">وارد شوید</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
