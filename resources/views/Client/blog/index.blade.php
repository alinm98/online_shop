@extends('Client.layout.master')
@section('content')

    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <div class="row mt-5 pt-5">
                <div class="col-lg-12 col-md-8 col-sm-12 col-12 mb-3">
                    <div class="row">

                        @foreach($blogs as $blog)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="post-card">
                                    <div class="post-thumbnail">
                                        <a href="{{route('home.blogs.show',$blog)}}">
                                            <img src="{{str_replace('public', '/storage', $blog->banner)}}" alt="">
                                        </a>
                                        <span class="post-tag">مقاله</span>

                                    </div>
                                    <div class="post-title">
                                        <a href="{{route('home.blogs.show',$blog)}}">
                                            {{$blog->title}}
                                        </a>
                                        <span class="post-date">
                                            {{verta($blog->created_at)->format('Y.m.d')}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
