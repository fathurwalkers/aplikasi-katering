@extends('layouts.admin-layout')

@section('title', 'Daftar Paket - Administrator')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
@endsection

@section('main-content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header bg-primary">
                <h4>Laporan Pemesanan</h4>
            </div>

            <div class="card-body">

                @if (session('status'))
                    <div class="alert alert-primary">
                        {{ session('status') }}
                    </div>
                @endif

                <table id="example" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode Pemesanan</th>
                            <th>Nama Pemesan</th>
                            <th>Paket</th>
                            <th>Waktu Pesan</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pemesanan as $item)

                        <tr>
                            <td>{{ $item->pemesanan_kode }}</td>
                            <td>{{ $item->login->login_nama }}</td>
                            <td>{{ $item->paket->paket_nama }}</td>
                            <td>{{ date("d-M-Y", strtotime($item->updated_at)) }}</td>
                            <td class="text-center">{{ $item->pemesanan_jumlah }}</td>
                            <td class="">
                                @switch($item->pemesanan_status)
                                    @case("SELESAI")
                                        <button type="button" class="btn btn-sm btn-success">SELESAI</button>
                                        @break
                                    @case("PROSES")
                                        <button type="button" class="btn btn-sm btn-info">DIPROSES</button>
                                        @break
                                    @case("PENDING")
                                        <button type="button" class="btn btn-sm btn-danger">PENDING</button>
                                        @break
                                    @case("BERLANGSUNG")
                                        <button type="button" class="btn btn-sm" style="background-color:aqua;">BERLANGSUNG</button>
                                        @break
                                    @case("DIBATALKAN")
                                        <button type="button" class="btn btn-sm" style="background-color:rgb(187, 0, 72);color:white;">DIBATALKAN</button>
                                        @break
                                @endswitch
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">

                                    @if ($item->pemesanan_status == "PENDING")
                                    <form action="{{ route('admin-batalkan-pesanan', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm mr-1" style="background-color:rgb(255, 197, 37);">
                                            BATALKAN
                                        </button>
                                    </form>
                                    @endif

                                    @if ($item->pemesanan_status == "PROSES")
                                    <form action="{{ route('admin-konfirmasi-pesanan', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm mr-1" style="background-color:rgb(0, 174, 255);">
                                            KONFIRMASI
                                        </button>
                                    </form>
                                    @endif

                                    @if ($item->pemesanan_status == "BERLANGSUNG")
                                    <form action="{{ route('admin-selesaikan-pesanan', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm mr-1" style="background-color:rgb(105, 255, 19);">
                                            SELESAI
                                        </button>
                                    </form>
                                    @endif

                                    <a href="#" class="btn btn-info btn-sm mr-1" data-toggle="modal" data-target="#modallihat{{ $item->id }}">LIHAT</a>
                                    {{-- <a href="#" class="btn btn-primary btn-sm mr-1">UBAH</a> --}}
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus{{ $item->id }}">
                                        HAPUS
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- MODAL LIHAT  --}}
                        <div class="modal fade" id="modallihat{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Data Pemesanan - {{ $item->pemesanan_koed }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <b>INFORMASI PEMESANAN [{{ $item->pemesanan_kode }}]</b>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                Kode Pemesanan <br>
                                                Pemesan <br>
                                                Paket <br>
                                                Jumlah Paket <br>
                                                Waktu/Tanggal <br>
                                            </div>
                                            <div class="col-sm-8 col-md-8 col-lg-8">
                                                : {{ $item->pemesanan_kode }} <br>
                                                : {{ $item->login->login_nama }} <br>
                                                : {{ Str::limit($item->paket->paket_nama, 20) }} <br>
                                                : {{ $item->pemesanan_jumlah }} <br>
                                                : {{ date("d-M-Y", strtotime($item->updated_at)) }} <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">TUTUP</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END MODAL LIHAT --}}

                        {{-- MODAL HAPUS --}}
                        <div class="modal fade" id="modalhapus{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Pemesanan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menghapus Laporan Pemesanan ini ? <br>
                                            Laporan Pemesanan : {{ $item->paket_nama }}
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
                                        <form action="{{ route('hapus-pemesanan', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END MODAL HAPUS --}}

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#example').DataTable();
    } );
</script>
@endsection
