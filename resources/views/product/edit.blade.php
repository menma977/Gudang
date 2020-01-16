@extends('layouts.admin')

@section('title')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('product.index') }}">Product</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="card card-primary">
        <form role="form" action="{{ route('product.update', base64_encode($product->id)) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="category">category</label>
                    <select class="form-control @error('category') is-invalid @enderror select2" id="category"
                            name="category" style="width: 100%;">
                        @foreach($category as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $product->category->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Nama Product</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                           name="name" placeholder="Nama Product"
                           value="{{ old('name') ? old('name') : $product->name }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price_buy">Harga Beli</label>
                    <input type="text" class="form-control @error('price_buy') is-invalid @enderror" id="price_buy"
                           name="price_buy" placeholder="Harga Beli"
                           value="{{ old('price_buy') ? old('price_buy') : $product->price_buy }}">
                    @error('price_buy')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="margin">Margin(%) <small>max 100%</small></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('margin') is-invalid @enderror" id="margin"
                               name="margin" placeholder="Margin"
                               value="{{ old('margin') ? old('margin') : $product->margin }}">
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                    @error('margin')
                    <span class="text-danger text-sm" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="card card-primary">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">Discount</h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item">
                                <a class="nav-link" href="#tab_1" data-toggle="tab">
                                    Tidak ada discount
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @error('quantity') active @enderror @if($product->discount->free != 0) active @endif"
                                   href="#tab_2" data-toggle="tab">
                                    Discount Geratis barang
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @error('quantity1') active @enderror @if($product->discount->total != 0) active @endif"
                                   href="#tab_3" data-toggle="tab">
                                    Discount harga barang
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane" id="tab_1">
                            </div>
                            <!-- /.tab-pane -->
                            <div
                                class="tab-pane @error('quantity') active @enderror @if($product->discount->free != 0) active @endif"
                                id="tab_2">
                                <small>Jangan di isi semuanya ketika di isi geratis barang dan discount harga akan
                                    otomatis terplih geratis barang</small>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="quantity">Minimum Pembelian</label>
                                            <input type="text"
                                                   class="form-control @error('quantity') is-invalid @enderror"
                                                   id="quantity" name="quantity" placeholder="Jumlah Barang"
                                                   value="{{ old('quantity') ? old('quantity') : ($product->discount->free != 0 ? $product->discount->quantity : 0 )  }}">
                                            <small>Kosongkan Untuk di ganti atau menghapus discount</small>
                                            @error('quantity')
                                            <span class="text-danger text-sm"
                                                  role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="free">Geratis Barang</label>
                                            <input type="text" class="form-control @error('total') is-invalid @enderror"
                                                   id="free" name="free" placeholder="Jumlah Barang"
                                                   value="{{ old('free') ? old('free') : $product->discount->free }}">
                                            <small>Kosongkan Untuk di ganti atau menghapus discount</small>
                                            @error('free')
                                            <span class="text-danger text-sm"
                                                  role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div
                                class="tab-pane @error('quantity1') active @enderror @if($product->discount->total != 0) active @endif"
                                id="tab_3">
                                <small>Jangan di isi semuanya ketika di isi geratis barang dan discount harga akan
                                    otomatis terplih geratis barang</small>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="quantity1">Minimum Pembelian</label>
                                            <input type="text"
                                                   class="form-control @error('quantity1') is-invalid @enderror"
                                                   id="quantity1" name="quantity1" placeholder="Jumlah Barang"
                                                   value="{{ old('quantity1') ? old('quantity1') : ($product->discount->total != 0 ? $product->discount->quantity : 0 ) }}">
                                            <small>Kosongkan Untuk di ganti atau menghapus discount</small>
                                            @error('quantity1')
                                            <span class="text-danger text-sm"
                                                  role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="total">Potongan Harga(%) <small>max 100%</small></label>
                                            <div class="input-group mb-3">
                                                <input type="text"
                                                       class="form-control @error('total') is-invalid @enderror"
                                                       id="total" name="total" placeholder="Jumlah Barang"
                                                       value="{{ old('total') ? old('total') : $product->discount->total }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                            <small>Kosongkan Untuk di ganti atau menghapus discount</small>
                                            @error('total')
                                            <span class="text-danger text-sm"
                                                  role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection

@section('endCSS')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style>
        .select2-selection__rendered {
            line-height: 31px !important;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-selection__arrow {
            height: 34px !important;
        }
    </style>
@endsection

@section('endJS')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $('.select2').select2()
        })
    </script>
@endsection
