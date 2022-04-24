@extends('layouts.admin-layout')

@section('title', 'Daftar Paket - Administrator')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
{{-- CKEditor --}}
<script src="{{ asset('ckeditor') }}/ckeditor.js"></script>


@endsection

@section('main-content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header bg-primary">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <h4>Daftar Paket</h4>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <button type="button" class="btn btn-md btn-success float-right" data-toggle="modal" data-target="#modaltambahdata">TAMBAH PAKET</button>
                        </div>
                    </div>
                </div>
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
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Kode Paket</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($paket as $item)

                        <tr>
                            <td>{{ $item->paket_nama }}</td>
                            <td>Rp. {{ number_format($item->paket_harga,2,',','.') }}</td>
                            <td class="d-flex justify-content-center">
                                @switch($item->paket_status)
                                    @case("TERSEDIA")
                                        <button type="button" class="btn btn-sm btn-success">TERSEDIA</button>
                                        @break
                                    @case("KOSONG")
                                        <button type="button" class="btn btn-sm btn-danger">KOSONG</button>
                                        @break
                                @endswitch
                            </td>
                            <td>{{ $item->paket_kode }}</td>
                            <td width="15%">
                                <div class="btn-group d-flex justify-content-center">

                                    <button class="btn btn-info btn-sm mr-1" data-toggle="modal" data-target="#modalhapus{{ $item->id }}">LIHAT</button>

                                    <button class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#modalubah{{ $item->id }}">UBAH</button>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus{{ $item->id }}">
                                        HAPUS
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- MODAL TAMBAH DATA  --}}
                        <div class="modal fade" id="modaltambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Paket</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="{{ route('post-tambah-paket') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="paket_nama">Nama Paket </label>
                                                    <input type="text" class="form-control" id="paket_nama" name="paket_nama">
                                                    {{-- <small id="emailHelp" class="form-text text-muted">Test</small> --}}
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="paket_harga">Harga </label>
                                                    <input type="number" class="form-control" id="paket_harga" name="paket_harga">
                                                    {{-- <small id="emailHelp" class="form-text text-muted">Test</small> --}}
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="paket_status">Status Paket </label>
                                                    <select class="form-control" id="paket_status" name="paket_status">
                                                      <option value="" selected>Pilih status paket...</option>
                                                      <option value="TERSEDIA" selected>Tersedia</option>
                                                      <option value="KOSONG" selected>Kosong</option>
                                                    </select>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label for="paket_gambar">Banner Gambar</label>
                                                    <input type="file" class="form-control-file" id="paket_gambar" name="paket_gambar">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <textarea name="paket_info" id="editordefault">
                                                </textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Batalkan</button>
                                        <button type="submit" class="btn btn-danger">Simpan</button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        {{-- END MODAL TAMBAH DATA  --}}

                        {{-- MODAL UBAH  --}}
                        <div class="modal fade" id="modalubah{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data " {{ $item->paket_nama }} "</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="{{ route('update-paket', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="paket_nama">Nama Paket </label>
                                                    <input type="text" class="form-control" id="paket_nama" value="{{ $item->paket_nama }}" name="paket_nama">
                                                    {{-- <small id="emailHelp" class="form-text text-muted">Test</small> --}}
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="paket_harga">Harga </label>
                                                    <input type="number" class="form-control" id="paket_harga" value="{{ $item->paket_harga }}" name="paket_harga">
                                                    {{-- <small id="emailHelp" class="form-text text-muted">Test</small> --}}
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="paket_status">Status Paket </label>
                                                    <select class="form-control" id="paket_status" name="paket_status">
                                                      <option value="{{ $item->paket_status }}" selected>{{ $item->paket_status }}</option>
                                                      <option value="TERSEDIA" selected>Tersedia</option>
                                                      <option value="KOSONG" selected>Kosong</option>
                                                    </select>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label for="paket_gambar">Banner Gambar</label>
                                                    <input type="file" class="form-control-file" id="paket_gambar" name="paket_gambar">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <textarea name="paket_info" id="editor{{ $item->id }}">
                                                    {{ $item->paket_info }}
                                                </textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Batalkan</button>
                                        <button type="submit" class="btn btn-danger">Ubah Data</button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        {{-- END MODAL UBAH  --}}

                        {{-- MODAL HAPUS  --}}
                        <div class="modal fade" id="modalhapus{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menghapus Pengguna ini ? <br>
                                            Nama Pengguna : {{ $item->paket_nama }}
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
        <?php foreach ($paket as $item) { ?>
        CKEDITOR.replace( "editordefault" );
        CKEDITOR.replace( "editor<?php echo $item->id; ?>" );
        <?php } ?>
        CKEDITOR.document.appendStyleText( '.cke{visibility:visible;}' );
    } );
</script>
@endsection
