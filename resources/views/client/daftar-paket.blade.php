@extends('layouts/dashboard-layout')

@section('css')
<style>
    .clippers {
        position: absolute;
        clip: rect(0, 1000px, 100px, 0);
        /* clip: shape(top, right, bottom, left); NB 'rect' is the only available option */
    }
</style>
@endsection

@section('main-content')

<div class="row bg-success">
    <div class="col-12 mt-2 d-flex justify-content-center bg-success">
        <h5 class="text-white">DAFTAR PAKET</h5>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 mt-2">
        <div class="card">
            <img class="card-img-top img-thumbnail img-fluid" src="{{ asset('tampilan/img/paket1.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('client-detail-paket', '1') }}" class="btn btn-primary px-3">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 mt-2">
        <div class="card">
            <img class="card-img-top img-thumbnail img-fluid" src="{{ asset('tampilan/img/paket1.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('client-detail-paket', '2') }}" class="btn btn-primary px-3">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection
