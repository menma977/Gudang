@extends('layouts.admin')

@section('title')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Toko</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('route.index') }}">Toko</a>
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
        <form role="form" action="{{ route('store.update', base64_encode($store->id)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="route">Route</label>
                    <select class="form-control @error('route') is-invalid @enderror select2" id="route"
                            name="route" style="width: 100%;">
                        @foreach($routes as $item)
                            <option value="{{ $item->id }}"
                                {{ $store->route == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('route')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="full_name">Nama lengkap pemilik toko</label>
                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name"
                           name="full_name" placeholder="Nama lengkap pemilik toko"
                           value="{{ old('full_name') ? old('full_name') : $store->full_name }}">
                    @error('full_name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username Toko</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                           name="username" placeholder="Username pemilik toko"
                           value="{{ old('username') ? old('username') : $store->user->username }}">
                    @error('username')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Nomor Telpon</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                           name="phone" placeholder="Nomor Telpon pemilik toko"
                           value="{{ old('phone') ? old('phone') : $store->phone }}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                            <small>Kosongkan jika tidak ingin di rubah</small>
                            @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="c_password">Konfirmasi Password</label>
                            <input type="password" class="form-control @error('c_password') is-invalid @enderror"
                                   id="c_password" name="c_password" placeholder="Konfrimasi Password"
                                   value="{{ old('c_password') }}">
                            <small>Kosongkan jika tidak ingin di rubah</small>
                            @error('c_password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="number_ktp">Nomor KTP</label>
                    <input type="text" class="form-control @error('number_ktp') is-invalid @enderror" id="number_ktp"
                           name="number_ktp" placeholder="Nomor KTP" value="{{ old('number_ktp') ? old('number_ktp') : $store->number_ktp }}">
                    @error('number_ktp')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ktp">Foto KTP</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('ktp') is-invalid @enderror"
                                           id="ktp" name="ktp">
                                    <label class="custom-file-label" for="ktp">
                                        Taruh Foto KTP di sini
                                    </label>
                                </div>
                            </div>
                            <small>Abaikan jika tidak ingin di rubah</small>
                            @error('ktp')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ktp_and_user">Foto KTP dan Selfi</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file"
                                           class="custom-file-input @error('ktp_and_user') is-invalid @enderror"
                                           id="ktp_and_user" name="ktp_and_user">
                                    <label class="custom-file-label" for="ktp_and_user">
                                        Taruh Foto KTP dan selfi di sini
                                    </label>
                                </div>
                            </div>
                            <small>Abaikan jika tidak ingin di rubah</small>
                            @error('ktp_and_user')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="full_address">Alamat Lengkap</label>
                    <textarea id="full_address" name="full_address" placeholder="Alamat Lengkap"
                              class="form-control @error('full_address') is-invalid @enderror"
                              style="min-height: 300px">{!! old('full_address') ? old('full_address') : $store->full_address !!}</textarea>
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
    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function () {
            // Summernote
            $('#full_address').summernote({
                height: 200
            });
            $('.select2').select2()
            bsCustomFileInput.init();
        })
    </script>
@endsection
