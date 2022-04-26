@extends('layouts.admin-layout')

@section('title', 'Daftar Pengguna - Administrator')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
@endsection

@section('main-content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header bg-primary">
                <h4>Daftar Pengguna</h4>
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
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pengguna as $item)

                        <tr>
                            <td>{{ $item->login_nama }}</td>
                            <td>{{ $item->login_username }}</td>
                            <td>{{ $item->login_level }}</td>
                            <td width="15%">
                                <div class="btn-group d-flex justify-content-center">
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
                                        <h5 class="modal-title" id="exampleModalLabel">Data Pengguna - {{ $item->login_nama }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <b>INFORMASI PENGGUNA</b>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                Nama Pengguna <br>
                                                Username <br>
                                                Level Akses <br>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                : {{ $item->login_nama }} <br>
                                                : {{ $item->login_username }} <br>
                                                : {{ $item->login_level }} <br>
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
                                            Nama Pengguna : {{ $item->login_nama }}
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
                                        <form action="{{ route('hapus-user', $item->id) }}" method="POST">
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
