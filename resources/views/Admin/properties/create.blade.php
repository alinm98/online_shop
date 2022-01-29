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
                            <h3 class="card-title">ایجاد گروه ویژگی</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('properties.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام گروه ویژگی</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                           placeholder="نام گروه ویژگی را وارد کنید">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>انتخاب ویژگی</label>
                                <select class="form-control" name="property_group_id">
                                    <option disabled selected>---انخاب گروه ویژگی---</option>
                                    @foreach($propertyGroups as $propertyGroup)
                                        <option value="{{$propertyGroup->id}}">{{$propertyGroup->title}}</option>
                                    @endforeach
                                </select>
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
