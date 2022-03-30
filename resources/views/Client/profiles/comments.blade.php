@extends('Client.layout.profile')
@section('main')

    <!-- Start Content -->
    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
        <div class="row">
            <div class="col-12">
                <div
                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                    <h2>نقد و نظرات</h2>
                </div>
                <div class="dt-sl">
                    <div class="row">

                        @foreach($comments as $comment)
                            <div class="col-lg-6 col-md-12">
                                <div class="card-horizontal-product border-bottom rounded-0">
                                    <div class="card-horizontal-product-thumb">
                                        <a href="{{route('home.product.show',$comment->product)}}">
                                            <img src="{{str_replace('public' , '/storage' , $comment->product->image)}}"
                                                 alt="{{$comment->product->name}}">
                                        </a>
                                    </div>
                                    <div class="card-horizontal-product-content">
                                        <div class="card-horizontal-comment">
                                            <p>{{$comment->description}}</p>
                                        </div>
                                        <form action="{{route('home.comment.destroy',$comment)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="card-horizontal-product-buttons">
                                                <button class="btn btn-light">حذف
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

@endsection
