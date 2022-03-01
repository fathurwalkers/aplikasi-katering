@extends('layouts/dashboard-layout')

@section('css')
<style>
    .fontgreen {
        color: #3cfa0c;
    }

    .bgheader {
        background-color: #2bc75a;
        color: #ffffff;
    }
    .ukuranfont {
        font-size: 11pt;
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
            <div class="card-title bgheader">
                <h5 class="mt-2 text-center">INFORMASI PEMESANAN</h5>
            </div>
            <div class="card-body">

                <div class="ukuranfont">
                    <div class="row">
                        <div class="col-5">
                            Nama Paket <br>
                            Harga <br>
                            Kode Paket <br>
                            Nama Pemesan <br>
                            No. HP <br>
                            Email <br>
                            Alamat <br>
                        </div>
                        <div class="col-7">
                            : {{ $paket->paket_nama }} <br>
                            : {{ $paket->paket_harga }} <br>
                            : {{ $paket->paket_kode }} <br>
                            : {{ $paket->paket_harga }} <br>
                            : {{ $paket->paket_harga }} <br>
                            : {{ $paket->paket_harga }} <br>
                            : {{ $paket->paket_harga }} <br>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4 mb-2">
                    <a href="{{ route('client-detail-paket', $paket->id) }}" class="btn btn-danger px-3 shadow">BATALKAN</a> &nbsp;&nbsp;
                    <a href="#" class="btn btn-primary px-3 shadow">PESAN</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection
