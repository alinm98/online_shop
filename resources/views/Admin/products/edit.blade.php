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
                            <h3 class="card-title">ویرایش محصول</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('products.update',$product)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام محصول</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                           placeholder="نام محصول را وارد کنید" value="{{$product->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">قیمت محصول</label>
                                    <input type="number" name="price" class="form-control" id="exampleInputEmail1"
                                           placeholder="قیمت محصول را وارد کنید" value="{{$product->price}}">
                                </div>

                                <div class="form-group">
                                    <label>انتخاب والد</label>
                                    <select class="form-control" name="category_id">
                                        <option disabled selected>---انخاب دسته والد---</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                            @if($product->category_id == $category->id)
                                                selected
                                            @endif
                                            >{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>انتخاب برند</label>
                                    <select class="form-control" name="brand_id">
                                        <option disabled selected>---انخاب برند---</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}"
                                             @if($product->brand_id == $brand->id)
                                                selected
                                            @endif
                                            >{{$brand->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputImage">تصویر فعلی محصول</label>
                                    <img src="{{str_replace('public' , '/storage' , $product->image)}}" height="250px"
                                         width="400px" alt="{{$brand->title}}">
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
                                              placeholder="توضیحات محصول ...">{{$product->description}}</textarea>
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
                                <button type="submit" class="btn btn-primary">ویرایش</button>
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
