@extends('layouts.admin')

@push('css')
<style>
    #myTable td {text-align: center; vertical-align: middle;}
</style>
@endpush

@section('content')
<div class="main-content">
    <section class="section">

        <div class="section-body">

            <div class="section-header">
                <h1>Selamat Datang, {{Auth::user()->name}}</h1>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ url('employee') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Karyawan</h4>
                                </div>
                                <div class="card-body">
                                    {{$employee}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ url('category') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="fas fa-list-alt"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Kategori</h4>
                                </div>
                                <div class="card-body">
                                    {{$category}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ url('material') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Bahan Baku</h4>
                                </div>
                                <div class="card-body">
                                    {{$material}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ url('product') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Produk</h4>
                                </div>
                                <div class="card-body">
                                    {{$product}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                               
            </div>
        </div>

    </section>
</div>


@endsection