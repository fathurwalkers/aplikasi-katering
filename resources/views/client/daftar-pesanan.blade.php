@extends('layouts/dashboard-layout')

@section('css')
<!-- Compiled and minified CSS -->
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> --}}
<style>
    .clippers {
        position: absolute;
        clip: rect(0, 1000px, 100px, 0);
        /* clip: shape(top, right, bottom, left); NB 'rect' is the only available option */
    }

    #content {
        overflow-x: auto !important;
    }

    .img-fluid {
        border-top-left-radius : 10%!important;
        border-top-right-radius : 10%!important;
    }

    .card {
        border-top-left-radius : 7%!important;
        border-top-right-radius : 7%!important;
        border-bottom-left-radius : 6%!important;
        border-bottom-right-radius : 6%!important;
    }

    .fixed-text {
        font-size: 12px!important;
    }
</style>
@endsection

@section('main-content')

<div class="row">
    <div class="col-12 mt-2 d-flex justify-content-center bg-white mt-3 mb-2">
        <h2 class="text-dark"><b>DAFTAR PESANAN</b></h2>
    </div>
    @if (session('status'))
        <div class="col-12 mt-2 d-flex justify-content-center">
            <div class="alert alert-primary">
                {{ session('status') }}
            </div>
        </div>
        <br>
        {{-- <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-animation="true" data-delay="5000" data-autohide="true">
            <div class="toast-header">
                <span class="rounded mr-2 bg-primary" style="width: 15px;height: 15px"></span>

                <strong class="mr-auto">Notifikasi</strong>
                <small>1 menit yang lalu</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Halo, ini pesan notifikasi toast.
                <br/>
                www.malasngoding.com
            </div>
        </div> --}}
    @endif
</div>

@foreach ($pesanan as $item)
<div class="row">
    <div class="col-12 mt-1 mb-3">
        <div class="card rounded-2 shadow-lg">
            {{-- <div class="w-100 h-25">
                <img class="card-img-top img-thumbnail img-fluid rounded" src="{{ asset('tampilan/img') }}/{{ $item->paket_gambar }}" alt="Card image cap">
            </div> --}}
            <div class="card-body">
                {{-- <h5 class="card-title">{{ Str::limit($item->pemesanan_kode, 25) }}</h5>
                <p class="card-text"><b>HARGA : Rp. {{ number_format($item->paket_harga,2,',','.') }} </b><br>
                    <b>STATUS :
                        @switch($item->paket_status)
                            @case("TERSEDIA")
                                <span style="color:rgb(43, 197, 76)">TERSEDIA</span>
                                @break
                            @case("KOSONG")
                                <span style="color:rgb(201, 15, 15)">KOSONG</span>
                                @break
                        @endswitch
                    </b>
                </p> --}}
                {{-- <div class="container"> --}}
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <b>{{ $item->pemesanan_kode }}</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <p class="fixed-text">
                            Jumlah Pesanan : {{ $item->pemesanan_jumlah }} <br>
                            Status Pesanan :
                            @switch($item->pemesanan_status)
                                @case("PENDING")
                                <span style="color:red;">
                                    @break
                                @case("PROSES")
                                <span style="color:rgb(0, 162, 255);">
                                    @break
                                @case("SELESAI")
                                <span style="color:green;">
                                    @break
                            @endswitch
                                {{ $item->pemesanan_status }}
                            </span>
                            <br>
                            Pemesan : {{ $item->login->login_nama }} <br>
                            Paket dipesan : {{ Str::limit($item->paket->paket_nama, 25) }} <br>
                            Waktu Dipesan : {{ date("d/m/Y", strtotime($item->updated_at)) }} <br>
                            </p>
                        </div>
                    </div>
                {{-- </div> --}}
                <div class="d-flex justify-content-end">
                    <a href="{{ route('client-detail-paket', $item->id) }}" class="btn btn-sm btn-danger shadow">Batalkan Pesanan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- {{ $pesanan->onEachSide(1)->links() }} --}}

@endsection

@section('pagination')
<div class="container mt-4 mb-2">
    <div class="col-12">
        <div class="d-flex justify-content-center">
            {{ $pesanan->onEachSide(0)->links() }}
        </div>
    </div>
</div>
@endsection

@section('js')
<!--JavaScript at end of body for optimized loading-->
{{-- <script type="text/javascript" src="js/materialize.min.js"></script> --}}

<script>
    <?php if(session('status')) { ?>
	    $('.toast').toast('show');
    <?php } ?>
</script>
@endsection
