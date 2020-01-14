@extends('layouts.admin')

@section('title')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Toko</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Toko</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="card card-warning">
        <div class="card-body">
            <table id="listStore" class="table table-bordered table-striped">
                <thead>
                <th>Code Rute</th>
                <th>username</th>
                <th>Nama Pemilik Toko</th>
                <th>Alamat Lengkap</th>
                <th>nomor Telpon</th>
                <th>nomor KTP</th>
                </thead>
                <tbody>
                @foreach ($stores as $item)
                    <tr>
                        <td>{{ $item->route->name }}</td>
                        <td>{{ $item->user->username }}</td>
                        <td>{{ $item->full_name }}</td>
                        <td>{{ $item->full_address }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->number_ktp }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('endJS')
    <script>
        $(function () {
            $("#listStore").DataTable();
        });
    </script>
@endsection
