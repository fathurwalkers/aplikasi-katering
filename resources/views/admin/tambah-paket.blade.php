@extends('layouts.admin-layout')

@section('title', 'Tambah Paket - Administrator')

@section('css')

@endsection

@section('main-content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header bg-primary">
                    <h4>Tambah Paket</h4>
                </div>

                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="paket_nama">Nama Paket : </label>
                                    <input type="email" class="form-control" id="paket_nama" placeholder="Nama Paket..." name="paket_nama">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="paket_harga">Harga : </label>
                                    <input type="number" class="form-control rupiah" id="paket_harga" placeholder="Harga Paket..." name="paket_harga">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')
<script>

</script>
@endsection
