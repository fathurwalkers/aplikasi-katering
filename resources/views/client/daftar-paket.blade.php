@extends('layouts/dashboard-layout')

@section('css')
<style>
    .clippers {
        position: absolute;
        clip: rect(0, 1000px, 100px, 0);
        /* clip: shape(top, right, bottom, left); NB 'rect' is the only available option */
    }

    #content {
        overflow-x: auto !important;
    }
</style>
@endsection

@section('main-content')

<div class="row bg-success">
    <div class="col-12 mt-2 d-flex justify-content-center bg-success">
        <h5 class="text-white">DAFTAR PAKET</h5>
    </div>
    @if (session('status'))
        <div class="col-12 mt-2 d-flex justify-content-center">
            <div class="alert alert-primary">
                {{ session('status') }}
            </div>
        </div>
        <br>
    @endif
</div>

@foreach ($paket as $item)
<div class="row">
    <div class="col-12 mt-1 mb-1">
        <div class="card">
            <img class="card-img-top img-thumbnail img-fluid" src="{{ asset('tampilan/img') }}/{{ $item->paket_gambar }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ Str::limit($item->paket_nama, 25) }}</h5>
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
                </p>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('client-detail-paket', $item->id) }}" class="btn btn-md btn-primary shadow">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- {{ $paket->onEachSide(1)->links() }} --}}

@endsection

@section('pagination')
<div class="container mt-4 mb-2">
    <div class="col-12">
        <div class="d-flex justify-content-center">
            {{ $paket->onEachSide(0)->links() }}
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
