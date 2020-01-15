@extends('layouts.admin')

@section('title')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="card card-warning">
        <div class="card-body table-responsive">
            <table id="routes" class="table table-bordered table-striped">
                <thead>
                <th style="text-align: center;">Sales</th>
                <th style="text-align: center;">Code Rute</th>
                <th style="text-align: center;">Deskirpsi</th>
                <th style="text-align: center;">Edit</th>
                </thead>
                <tbody>
                @foreach ($routes as $item)
                    <tr>
                        <td style="text-align: center;">{{ $item->user }}</td>
                        <td style="text-align: center;">
                            <div class="card card-warning collapsed-card"
                                 style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $item->name }}</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                            <i class="fas fa-expand"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="storeList{{ $item->name }}" class="table table-bordered table-striped">
                                        <thead>
                                        <th>Nama Pemilik Toko</th>
                                        <th>Alamat Lengkap</th>
                                        <th>Telpon</th>
                                        <th>Nomor KTP</th>
                                        <th>Foto KTP</th>
                                        <th>Swafoto KTP</th>
                                        <th>Di Buat Tanggal</th>
                                        <th>Di Ubah Tanggal</th>
                                        </thead>
                                        <tbody>
                                        @foreach ($item->listStore as $subItem)
                                            <tr>
                                                <td>{{ $subItem->full_name }}</td>
                                                <td>{!! $subItem->full_address !!}</td>
                                                <td>{{ $subItem->phone }}</td>
                                                <td>{{ $subItem->number_ktp }}</td>
                                                <td>{{ $subItem->ktp }}</td>
                                                <td>{{ $subItem->ktp_and_user }}</td>
                                                <td>{{ $subItem->created_at }}</td>
                                                <td>{{ $subItem->updated_at }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </td>
                        <td style="text-align: center;">{!! $item->description !!}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('route.edit', base64_encode($item->id)) }}"
                               class="btn btn-block btn-warning">
                                Edit
                            </a>
                        </td>
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
            $("#routes").DataTable();
            @foreach($routes as $item)
            $("#storeList{{ $item->name }}").DataTable();
            @endforeach
        });
    </script>
@endsection
