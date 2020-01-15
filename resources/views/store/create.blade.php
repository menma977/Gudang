@extends('layouts.admin')

@section('title')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buat Rute</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('route.index') }}">Route</a>
                        </li>
                        <li class="breadcrumb-item active">Buat</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="card card-primary">
        <form role="form" action="{{ route('store.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="route">Route</label>
                            <select class="form-control @error('route') is-invalid @enderror select2" id="sales"
                                    name="sales" style="width: 100%;">
                                @foreach($routes as $item)
                                    <option value="{{ base64_encode($item->id) }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('route')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" placeholder="Nama pemilik toko" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="full_name">Nama lengkap pemilik toko</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="full_name"
                           name="full_name" placeholder="Username pemilik toko" value="{{ old('username') }}">
                    @error('username')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username Toko</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                           name="username" placeholder="Username pemilik toko" value="{{ old('username') }}">
                    @error('username')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Nomor Telpon</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                           name="phone" placeholder="Nomor Telpon pemilik toko" value="{{ old('phone') }}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('phone') is-invalid @enderror"
                                   id="password"
                                   name="password" placeholder="Password" value="{{ old('phone') }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="c_password">Konfirmasi Password</label>
                            <input type="password" class="form-control @error('c_password') is-invalid @enderror"
                                   id="c_password"
                                   name="c_password" placeholder="Nomor Telpon pemilik toko"
                                   value="{{ old('c_password') }}">
                            @error('c_password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="full_address">Alamat Lengkap</label>
                    <textarea id="full_address" name="full_address" placeholder="Alamat Lengkap"
                              class="form-control @error('full_address') is-invalid @enderror"
                              style="min-height: 300px">{!! old('full_address') !!}</textarea>
                    @error('full_address')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection

@section('endCSS')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
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
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            // Summernote
            $('#full_address').summernote({
                height: 200
            });
            $('.select2').select2()
        })
    </script>
@endsection
