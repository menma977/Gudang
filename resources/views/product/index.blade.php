@extends('layouts.admin')

@section('title')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="card card-warning">
        <div class="card-body">
            <table id="listStore" class="table table-bordered table-striped table-responsive">
                <thead>
                <th>#</th>
                <th>Nama Product</th>
                <th>Quantity</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Margin</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach ($product as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            <button class="btn btn-info btn-xs btn-block" data-toggle="modal"
                                    data-target="#modal-info-{{ $item->name }}">
                                {{ $item->name }}
                            </button>
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp {{ number_format($item->price_buy, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->price_sell, 0, ',', '.') }}</td>
                        <td>{{ $item->margin }}</td>
                        <td>
                            <a href="{{ route('product.edit', base64_encode($item->id)) }}"
                               class="btn btn-warning btn-xs btn-block">
                                Edit
                            </a>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal-info-{{ $item->name }}">
                        <div class="modal-dialog">
                            <div class="modal-content bg-info">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{ $item->name }}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body row">
                                    <div class="col-md-6">
                                        <h3>Category</h3>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item bg-info">
                                                <b>Nama</b> <a class="float-right">{{ $item->category->name }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h3>Discount</h3>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            @if($item->discount->type == 0)
                                                <li class="list-group-item bg-info">
                                                    <b>Tidak ada discount</b>
                                                </li>
                                            @elseif($item->discount->type == 1)
                                                <li class="list-group-item bg-info">
                                                    <b>Quantity</b>
                                                    <a class="float-right">
                                                        {{ $item->discount->quantity }}
                                                    </a>
                                                </li>
                                                <li class="list-group-item bg-info">
                                                    <b>Geratis</b>
                                                    <a class="float-right">
                                                        {{ $item->discount->free }}
                                                    </a>
                                                </li>
                                            @else
                                                <li class="list-group-item bg-info">
                                                    <b>Quantity</b>
                                                    <a class="float-right">
                                                        {{ $item->discount->quantity }}
                                                    </a>
                                                </li>
                                                <li class="list-group-item bg-info">
                                                    <b>Potongan</b>
                                                    <a class="float-right">
                                                        {{ $item->discount->total }}%
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
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
