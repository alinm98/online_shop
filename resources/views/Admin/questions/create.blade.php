@extends('Admin.layout.master')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">ایجاد پرسش و پاسخ</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('questions.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">


                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">پرسش</label>
                                        <input type="text" name="question" class="form-control" id="exampleInputEmail1"
                                               placeholder="پرسش را وارد کنید">
                                    </div>>
                                </div>

                                <div class="form-group">
                                    <textarea name="answer" rows="10" cols="110"
                                              placeholder="پاسخ ..."></textarea>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            @if(count($errors->all()) > 0)
                                <ul class="bg-danger">
                                    @foreach($errors->all() as $error)
                                        <li class="text-black">{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ثبت</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
