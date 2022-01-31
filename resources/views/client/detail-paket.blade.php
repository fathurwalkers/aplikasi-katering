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
                <h5 class="mt-2 text-center">INFORMASI PAKET</h5>
            </div>
            <img class="card-img-top border-1" src="{{ asset('tampilan/img/paket1.jpg') }}" alt="">
            <div class="card-body">
                <h5 class="card-title">Paket 400 Undangan</h5>

                <p>Catering&nbsp;<br>
                - Catering 1000 Undangan&nbsp;<br>
                - Es Buah + Buah Potong Fresh&nbsp;<br>
                - Cake Tradisional&nbsp;<br>
                - Service Penataan&nbsp;<br>
                - Prabot Pecah Bela&nbsp;<br>
                - Meja &amp; Kursi&nbsp;<br>
                <br>
                Yeyen Salon&nbsp;<br>
                - Dekorasi Kamar Pengantin&nbsp;<br>
                - Dekorasi Akad Nikah&nbsp;<br>
                - Dekorasi Gedung&nbsp;<br>
                <br>
                Yeyen Decoration&nbsp;<br>
                - Make Up Pengantin (Akad Nikah)&nbsp;<br>
                - Make Up Pengantin Resepsi&nbsp;<br>
                - Make Up Orang Tua (Akad Nikah)&nbsp;<br>
                - Make Up Orang Tua Resepsi&nbsp;<br>
                - Pakaian Adat Akad Nikah&nbsp;<br>
                - Pakaian Adat Orang Tua (Akad Nikah)&nbsp;<br>
                - Pakaian Pendamping Wopi&nbsp;<br>
                <br>
                Dym Interteiment&nbsp;<br>
                - Sound System Gedung&nbsp;<br>
                - Pemain Musik + Penyanyi&nbsp;<br>
                - MC Gedung&nbsp;<br>
                <br>
                Harga 65.000.000&nbsp;<br>
                <br>
                Gratis&nbsp;<br>
                - Dekorasi Lamaran&nbsp;<br>
                - Lighting Dekorasi / 30 Unit&nbsp;<br>
                - Panggung Lantai Dansa&nbsp;<br>
                - Gaun PraWedding + Make Up&nbsp;<br>
                - Henna Pengantin&nbsp;<br>
                - Softlens Pengantin&nbsp;<br>
                - Catering Akad Nikah 100 Undangan&nbsp;<br>
                - Tenda Jengky Akad Nikah 100 Undangan&nbsp;<br>
                - Kursi Plastik 200 Unit + Pembungkus (Gedung)&nbsp;</p>

                <div class="d-flex justify-content-end">
                    <p class="card-text mb-2">
                        <b>
                            Rp. <div class="fontgreen">&nbsp;20.000.000</div>
                        </b>
                    </p>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('pemesanan', '1') }}" class="btn btn-primary px-3">Pesan sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection
