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
                            <h3 class="card-title">ویرایش نقش</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('roles.update' ,$role)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام نقش</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                           placeholder="نام نقش را وارد کنید" value="{{$role->title}}">
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <label>انتخاب نقش ها</label><br>
                                        @foreach($permissions as $permission)

                                            <div class="form-check form-switch col-sm-10">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                       @if($role->hasPermission($permission))
                                                       checked
                                                       @endif
                                                       id="flexSwitchCheckDefault" value="{{$permission->id}}">
                                                <label class="form-check-label col-sm-4"
                                                       for="flexSwitchCheckDefault">{{$permission->label}}</label>
                                            </div>

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
