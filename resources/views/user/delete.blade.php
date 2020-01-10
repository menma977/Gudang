@extends('layouts.admin')

@section('title')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Hapus User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                    <li class="breadcrumb-item active">Hapus</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="card card-primary">
    <form role="form" action="{{ route('user.destroy') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Username</label>
                <select class="form-control @error('user') is-invalid @enderror select2" id="user" name="user"
                    style="width: 100%;">
                    @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->name }} |
                        {{ $item->delete == 0 ? 'batal untuk di hapus' : 'Hapus' }}</option>
                    @endforeach
                </select>
                @error('user')
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
        //Initialize Select2 Elements
        $('.select2').select2()
    });
</script>
@endsection
