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
                <h4>Daftar Paket</h4>
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
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pemesanan as $item)

                        <tr>
                            <td>{{ $item->pemesanan_kode }}</td>
                            <td>{{ $item->pemesanan_jumlah }}</td>
                            <td class="d-flex justify-content-center">
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
                                @endswitch
                            </td>
                            <td width="15%">
                                <div class="btn-group d-flex justify-content-center">
                                <a href="#" class="btn btn-info btn-sm mr-1">LIHAT</a>
                                    {{-- <a href="#" class="btn btn-primary btn-sm mr-1">UBAH</a> --}}
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus{{ $item->id }}">
                                        HAPUS
                                    </button>
                                </div>
                            </td>
                        </tr>

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
                                        <form action="{{ route('hapus-paket', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

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
