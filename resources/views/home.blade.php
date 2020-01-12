@extends('layouts.admin')

@section('title')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blank Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    @holder
    @include('home.holder')
    @endholder
    @admin
    @include('home.admin')
    @endadmin
    @headShed
    @include('home.headShed')
    @endheadShed
    @shed
    @include('home.shed')
    @endshed
    @sales
    @include('home.sales')
    @endsales
@endsection
