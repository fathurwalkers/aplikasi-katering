@extends('layouts/dashboard-layout')

@section('css')

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
            <img class="card-img-top border-1" src="https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg" alt="">
            <div class="card-body">
                <h5 class="card-title">Paket 400 Undangan</h5>
                <p class="card-text">Deskripsi Paket</p>
                <div class="d-flex justify-content-end mb-2">
                    <p class="card-text">
                        Harga : Rp. 20.000.000
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
