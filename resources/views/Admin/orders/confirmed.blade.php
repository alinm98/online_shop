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
                                <th>نام کاربر</th>
                                <th>تاریخ ایجاد سفارش</th>
                                <th>شناسه پرداخت</th>
                                <th>وضعیت سفارش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{\Hekmatinasser\Verta\Verta::instance($order->created_at)}}</td>
                                    <td>{{(new \App\Models\Order)->transaction($order->transaction_id)}}</td>
                                    @if($order->status == 'OK')
                                        <td>
                                            <a href="{{route('orderDetail.index',$order)}}" class="btn btn-success">پرداخت
                                                موفق</a>
                                        </td>
                                    @endif
                                    @if($order->status == 'wait')
                                        <td>
                                            <a href="{{route('orderDetail.index',$order)}}" class="btn btn-warning">در
                                                انتظار پرداخت</a>
                                        </td>
                                    @endif
                                    <td>
                                        <form action="{{route('order.destroy',$order)}}" method="post">
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
