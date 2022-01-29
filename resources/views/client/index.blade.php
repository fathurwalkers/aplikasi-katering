@extends('layouts/dashboard-layout')


@section('main-content')

<div class="row">
    <div class="col-12 mt-2">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card mt-2 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-angle-double-right"></i> Daftar Pengguna
                </h5>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card mt-2 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-angle-double-right"></i> Daftar Paket Katering
                </h5>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card mt-2 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-angle-double-right"></i> Daftar Pemesanan
                </h5>
            </div>
        </div>
    </div>
</div>

@endsection
