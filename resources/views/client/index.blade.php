@extends('layouts/dashboard-layout')

@section('css')
<style>
.bgheader {
    background-color: #2bc75a;
    color: #ffffff;
}
</style>
@endsection

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
    <div class="col-sm-6 mt-1">
        <div class="card mb-2 bgheader">
            <div class="card-title">
                <h5 class="mt-2 text-center">INFORMASI PAKET</h5>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        {{-- <div class="col-8"> --}}
            <button type="button" class="btn btn-primary btn-lg btn-block">
                <div class="row">
                    <div class="col-1">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="col-2">
                        Paket
                    </div>
                    <div class="col-9">
                        <i class="fas fa-lg-archive"></i>
                    </div>
                </div>
            </button>
        {{-- </div> --}}
    </div>
</div>

{{-- <div class="row">
    <div class="col-12">
        <div class="card mt-2 shadow-sm">
            <div class="card-body mt-1">
                <h5 class="card-title d-flex justify-content-center">
                    <i class="fas fa-archive"></i>
                    &nbsp;&nbsp;&nbsp;
                    <a href="#">DAFTAR PENGGUNA</a>
                </h5>
            </div>
        </div>
    </div>
</div> --}}

@endsection
