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
                            <h3 class="card-title">ایجاد محصول</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('products.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام محصول</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                           placeholder="نام محصول را وارد کنید">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">قیمت محصول</label>
                                    <input type="number" name="price" class="form-control" id="exampleInputEmail1"
                                           placeholder="قیمت محصول را وارد کنید">
                                </div>

                                <div class="form-group">
                                    <label>انتخاب والد</label>
                                    <select class="form-control" name="category_id">
                                        <option disabled selected>---انخاب دسته والد---</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>انتخاب برند</label>
                                    <select class="form-control" name="brand_id">
                                        <option disabled selected>---انخاب برند---</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <label>انتخاب رنگ ها</label><br>
                                        @foreach($colors as $color)
                                            <input class="form-check-input" name="colors[]" type="checkbox"
                                                   value="{{$color->id}}">
                                            <label class="form-check-label col-sm-2">{{$color->title}}</label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">انتخاب تصویر محصول</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                   id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea name="description" rows="10" cols="110"
                                              placeholder="توضیحات محصول ..."></textarea>
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
