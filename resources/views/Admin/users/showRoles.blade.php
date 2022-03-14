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
                            <h3 class="card-title">انتخاب نقش کاربر {{$user->name}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('user.storeRole',$user)}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label>انتخاب نقش</label><br>
                                        @foreach($roles as $role)
                                            <input class="form-check-input" name="role" type="checkbox"
                                                   value="{{$role->id}}">
                                            <label class="form-check-label col-sm-2">{{$role->title}}</label>
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
