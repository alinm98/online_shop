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
                            <h3 class="card-title">ویرایش ویژگی محصول</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('properties.update' ,$property)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام ویژگی</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                           placeholder="نام ویژگی محصول را وارد کنید" value="{{$property->title}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>انتخاب ویژگی</label>
                                <select class="form-control" name="property_group_id">
                                    <option disabled selected>---انخاب گروه ویژگی---</option>
                                    @foreach($propertyGroups as $propertyGroup)
                                        <option value="{{$propertyGroup->id}}"
                                        @if($property->propertyGroup->id == $propertyGroup->id)
                                            selected
                                        @endif
                                        >{{$propertyGroup->title}}</option>
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
