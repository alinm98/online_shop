@extends('Admin.layout.master')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>نام</th>
                                <th>قیمت</th>
                                <th>دسته بندی</th>
                                <th>برند</th>
                                <th>تصویر</th>
                                <th>تخفیف</th>
                                <th>گالری</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->category->title}}</td>
                                    <td>{{$product->brand->title}}</td>
                                    <td><img src="{{str_replace('public' , '/storage',$product->image)}}" height="75px"
                                             width="200px"></td>
                                    <td><a href="{{route('products.discounts.create',$product)}}"
                                           class="btn btn-sm btn-success">
                                            @if($product->hasDiscount())
                                                %{{$product->hasDiscount()}}
                                                <form
                                                    action="{{route('products.discounts.destroy',['product'=>$product,'discount'=>$product->discount])}}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="حذف تخفیف" class="btn btn-sm btn-danger">
                                                </form>
                                            @endif
                                            @if(!$product->hasDiscount())
                                                ایجاد تخفیف
                                            @endif
                                        </a>
                                    <td><a href="{{route('gallery.create',$product)}}" class="btn btn-sm btn-warning">گالری</a>
                                    <td><a href="{{route('products.edit',$product)}}" class="btn btn-sm btn-primary">ویرایش</a>
                                    </td>
                                    <td>
                                        <form action="{{route('products.destroy',$product)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger btn-sm" value="حذف">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection

@section('script')
    <!-- jQuery -->
    <script src="/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/admin/plugins/datatables/dataTables.bootstrap4.js"></script>
    <!-- SlimScroll -->
    <script src="/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/admin/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/admin/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous": "قبلی"
                    }
                },
                "info": false,
            });
            $('#example2').DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous": "قبلی"
                    }
                },
                "info": false,
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "autoWidth": false
            });
        });
    </script>

@endsection
