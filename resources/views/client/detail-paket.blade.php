@extends('layouts/dashboard-layout')

@section('css')
<style>
    .fontgreen {
        color: #3cfa0c;
    }
</style>
@endsection

@section('main-content')

{{-- <div class="row">
    <div class="col-12 mt-2 d-flex justify-content-center">
        <h5>INFORMASI PAKET</h5>
    </div>
</div> --}}

<div class="row">
    <div class="col-sm-6 mt-1">
        <div class="card mb-2">
            <div class="card-title bg-info">
                <h5 class="mt-2 text-center">INFORMASI PAKET</h5>
            </div>
            <img class="card-img-top border-1" src="{{ asset('tampilan/img/paket1.jpg') }}" alt="">
            <div class="card-body">
                <h5 class="card-title">Paket 400 Undangan</h5>
                <p class="card-text">Deskripsi Paket</p>
                <div class="d-flex justify-content-end">
                    <p class="card-text mb-2">
                        <b>
                            Rp. <div class="fontgreen">&nbsp;20.000.000</div>
                        </b>
                    </p>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="#" class="btn btn-primary px-3">Pesan sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection
