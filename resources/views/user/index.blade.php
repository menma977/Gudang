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
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="card card-warning">
    <div class="card-body">
        <table id="userListIndex" class="table table-bordered table-striped">
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
@endsection

@section('endJS')
<script>
    $(function () {
        $("#userListIndex").DataTable();
    });
</script>
@endsection
