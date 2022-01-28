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
                            <h3 class="card-title">ویرایش دسته بندی</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('categories.update' ,$category)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام دسته بندی</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                           placeholder="نام دسته بندی را وارد کنید" value="{{$category->title}}">
                                </div>
                                <div class="form-group">
                                    <label>انتخاب والد</label>
                                    <select class="form-control" name="category_id">
                                        <option disabled selected>---انخاب دسته والد---</option>
                                        @foreach($categories as $value)
                                            <option value="{{$value->id}}"
                                            @if(optional($category->parent)->id == $value->id)
                                                selected
                                            @endif
                                            >{{$value->title}}</option>
                                        @endforeach
                                    </select>
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
