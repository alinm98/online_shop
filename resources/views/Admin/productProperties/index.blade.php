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
                            <h3 class="card-title">ایجاد مشخصه</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('product.property.store',$product)}}" method="post">
                            @csrf
                            <div class="card-body">
                                @foreach($propertyGroups as $propertyGroup)
                                    <h3>{{$propertyGroup->title}}</h3>
                                    <div class="row">
                                        @foreach($propertyGroup->property as $property)
                                            <div class="form-group col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <label for="exampleInputEmail1">{{$property->title}}</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="properties[{{$property->id}}][value]"
                                                               class="form-control"
                                                               value="{{$property->getPropertyValue($product)}}"
                                                               placeholder="{{$property->title}} را وارد کنید">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
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
