@extends('layouts.admin')

@section('title')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="card card-warning">
        <div class="card-body">
            <table id="list" class="table table-bordered table-striped">
                <thead>
                <th>Nama</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach ($category as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="{{ route('category.edit', base64_encode($item->id)) }}" class="btn btn-warning btn-xs btn-block">
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
            $("#list").DataTable();
        });
    </script>
@endsection
