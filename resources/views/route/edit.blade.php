@extends('layouts.admin')

@section('title')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Rute</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('route.index') }}">Route</a>
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
        <form role="form" action="{{ route('route.update', base64_encode($route->id)) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sales">Sales</label>
                            <select class="form-control @error('sales') is-invalid @enderror select2" id="sales"
                                    name="sales" style="width: 100%;">
                                <option value="0">Belum Di Tentukan</option>
                                @foreach($users as $item)
                                    <option
                                        value="{{ $item->id }}" {{ $route->user ? ($item->id == $route->user ? 'selected' : '') : '' }} >{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('sales')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama Rute</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" placeholder="Nama Rute"
                                   value="{{ old('name') ? old('name') : $route->name }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi Rute</label>
                    <textarea id="description" name="description" placeholder="Deskripsi Rute"
                              class="form-control @error('description') is-invalid @enderror"
                              style="min-height: 300px">{!! old('description') ? old('description') : $route->description !!}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
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
            $('#description').summernote({
                height: 200
            });
            $('.select2').select2()
        })
    </script>
@endsection
