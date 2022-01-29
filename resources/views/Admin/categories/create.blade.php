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
                            <h3 class="card-title">ایجاد دسته بندی</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('categories.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام دسته بندی</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                           placeholder="نام دسته بندی را وارد کنید">
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
                                    <div class="form-check">
                                        <label>انتخاب گروه ویژگی ها</label><br>
                                        @foreach($propertyGroups as $propertyGroup)
                                            <input class="form-check-input" name="property_groups[]" type="checkbox"
                                                   value="{{$propertyGroup->id}}">
                                            <label class="form-check-label col-sm-2">{{$propertyGroup->title}}</label>
                                        @endforeach
                                    </div>
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
