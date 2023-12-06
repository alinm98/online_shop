@extends('Client.layout.master')
@section('content')

    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <!-- Start title - breadcrumb -->
            <div class="title-breadcrumb-special dt-sl">
                <div class="title-page dt-sl">
                    <h1>{{$blog->title}}</h1>
                </div>
            </div>
            <!-- End title - breadcrumb -->
            <div class="row">
                <div class="col-lg-12 col-md-8 col-sm-12 col-12 mb-3">
                    <div class="content-page">
                        <div class="content-desc dt-sn dt-sl">
                            <header class="entry-header dt-sl mb-3">
                                <div class="post-meta date">
                                    <i class="mdi mdi-calendar-month"></i>{{$date}}
                                </div>
                                <div class="post-meta author">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    ارسال شده توسط <a href="#">مدیریت </a>
                                </div>
                            </header>
                            <div class="post-thumbnail dt-sl">
                                <img src="{{str_replace('public', '/storage', $blog->image)}}" alt="">
                            </div>
                            <div>
                                <br><br><h2 style="text-align: center"><strong>{{$blog->title}}</strong></h2>
                            </div>
                            <div>
                                <br><p style="text-align: justify">{{$blog->body}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



@endsection
