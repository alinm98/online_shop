@extends('Client.layout.master')
@section('content')

    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="page-cover mb-2">
            <div class="page-cover-title">
                <h1>پاسخ پرسش‌های پرتکرار</h1>
            </div>
        </div>
        <div class="container main-container">
            <div class="row">
                <div class="col-12">
                    <div class="page dt-sl dt-sn pt-3 pb-2 mb-4">
                        <div class="row">
                            <div class="col-12 pr-4 mb-3">
                                <div class="section-title title-wide mb-1 no-after-title-wide">
                                    <h2 class="font-weight-bold">پرتکرارترین پرسش‌ها</h2>
                                </div>
                            </div>
                            <div class="col-12 filter-product mb-3">
                                <div class="accordion" id="accordionExample">
                                    @foreach($questions as $question)
                                        <div class="card">
                                            <div class="card-header" id="headingOne{{$question->id}}">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-block text-right collapsed" type="button"
                                                            data-toggle="collapse" data-target="#collapseOne{{$question->id}}"
                                                            aria-expanded="false" aria-controls="collapseOne{{$question->id}}">
                                                        {{$question->question}}
                                                        <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseOne{{$question->id}}" class="collapse" aria-labelledby="headingOne{{$question->id}}"
                                                 data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p>{{$question->answer}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="page-question-not-found">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-question-not-found-text">
                                    جواب یا پرسش خود را پیدا نکردید؟
                                    <br>
                                    روش‌های ارتباط با ما
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 text-center">
                                <img src="./assets/img/faq/phone.svg" alt="">
                                <div class="page-contact-option-text">تماس تلفنی</div>
                                <div class="page-contact-option-text mr-3">09120982810</div>
                            </div>
                            <div class="col-md-6 col-sm-12 text-center">
                                <img src="./assets/img/faq/email.svg" class="mb-5" alt="">
                                <div class="page-contact-option-text">ایمیل</div>
                                <div class="page-contact-option-text mr-3">croonperfume@mail.com</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End main-content -->

@endsection
