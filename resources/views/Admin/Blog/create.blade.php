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
                            <h3 class="card-title">ایجاد بلاگ</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('blogs.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">


                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">عنوان بلاگ</label>
                                        <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                               placeholder="عنوان بلاگ را وارد کنید">
                                    </div>>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputFile">انتخاب تصویر بنر</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="banner" class="custom-file-input"
                                                   id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">انتخاب تصویر داخل بلاگ</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                   id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea name="body" rows="10" cols="110"
                                              placeholder="توضیحات بلاگ ..."></textarea>
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
