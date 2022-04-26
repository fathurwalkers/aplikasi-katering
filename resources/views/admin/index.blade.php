@extends('layouts.admin-layout')

@section('title', 'Beranda - Administrator')

@section('css')

@endsection

@section('main-header', 'Dashboard Panel')

@section('main-content')

    {{-- <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                Header Layoput
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $login }}</h3>
                    <p>Jumlah Pengguna</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('daftar-user') }}" class="small-box-footer">Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
            <div class="inner">
            <h3>{{ $paket }}</h3>
            <p>Jumlah Paket</p>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('daftar-paket') }}" class="small-box-footer">Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>

            <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{ $pemesanan_proses }}</h3>
            <p>Pemesanan sukses</p>
            </div>
            <div class="icon">
            <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('daftar-pemesanan') }}" class="small-box-footer">Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>

            <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
            <div class="inner">
            <h3>{{ $pemesanan_selesai }}</h3>
            <p>Pemesanan diproses</p>
            </div>
            <div class="icon">
            <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('daftar-pemesanan') }}" class="small-box-footer">Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>

@endsection

@section('js')

@endsection
