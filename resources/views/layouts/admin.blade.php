<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AdminLTE 3</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('startCSS')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') }}" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    @yield('endCSS')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('layouts.include.header')

        @include('layouts.include.slider')

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    @yield('title')
                </div>
            </section>

            <section class="content">
                @yield('content')
            </section>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <strong>Programmer : Copyright &copy; 2020 <a
                        href="{{ url('http://Instagram.com/altair.kenway_') }}">Wisnu Putra Dewa</a>.</strong>
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="{{ url('http://adminlte.io') }}">AdminLTE.io</a>.</strong> All
            rights
            reserved.
        </footer>
    </div>

    <div class="modal fade" id="userListModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">List User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table id="userList" class="table table-bordered table-striped">
                        <thead>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Jabatan</th>
                            <th>Edit</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                @if ($item->role == 0)
                                <td>Pemilik</td>
                                @elseif($item->role == 1)
                                <td>Admin</td>
                                @elseif($item->role == 2)
                                <td>Kepala Gudang</td>
                                @elseif($item->role == 3)
                                <td>User Gudang</td>
                                @elseif($item->role == 4)
                                <td>Sales</td>
                                @elseif($item->role == 5)
                                <td>Toko</td>
                                @endif
                                <td>
                                    <a href="{{ route('user.edit', base64_encode($item->id)) }}"
                                        class="btn btn-block btn-warning btn-xs">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('startJS')
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function () {
            $("#userList").DataTable();
        });
    </script>
    @yield('endJS')
</body>

</html>
