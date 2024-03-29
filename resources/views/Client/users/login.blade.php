@extends('Client.layout.master')
@section('content')

    <main class="main-content dt-sl mt-4 mb-3" style="padding-top: 145px !important;">
        <div class="container main-container">
            <div class="row mb-5">
                <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">
                    <div class="auth-wrapper form-ui border pt-4">
                        <div class="section-title title-wide mb-1 no-after-title-wide">
                            <h2 class="font-weight-bold">ورود</h2>
                        </div>
                        <form action="{{route('home.user.login')}}" method="post">
                            @csrf

                            <div class="form-row-title">
                                <h3>شماره تلفن</h3>
                            </div>
                            <div class="form-row with-icon">
                                <input type="text" class="input-ui pr-2" name="mobile"
                                       placeholder="شماره تلفن خود را وارد نمایید">
                                <i class="mdi mdi-account-circle-outline"></i>
                            </div>


                            <div class="form-row-title">
                                <h3>رمز عبور</h3>
                            </div>
                            <div class="form-row with-icon">
                                <input type="password" class="input-ui pr-2" name="password"
                                       placeholder="رمز عبور خود را وارد نمایید">
                                <i class="mdi mdi-lock-open-variant-outline"></i>
                            </div>

                            <div class="form-row-title">
                                <h3>reCAPTCHA</h3>
                            </div>
                            <div class="form-row with-icon">
                                {!! htmlFormSnippet() !!}
                                <i class="mdi mdi-lock-open-variant-outline"></i>
                            </div>

                            <div class="form-row mt-3">
                                <button class="btn-primary-cm btn-with-icon mx-auto w-100">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    ورود به کرون
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
                                <span class="font-weight-bold"> ثبت نام نکرده اید؟</span>
                                <a href="{{route('home.user.signup')}}" class="mr-3 mt-2">ثبت نام</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
