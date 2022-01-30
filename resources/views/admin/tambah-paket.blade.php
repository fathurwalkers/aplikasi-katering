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

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
                                <img id="output_image" class="border border-1" width="250px"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Foto : </label>
                                    <input type="file" class="form-control-file" onchange="preview_image(event)" name="foto">
                                    <small class="form-text text-muted">Upload Pas Foto ekstensi .jpg</small>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3 mb-4">
                            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-md btn-primary"> SIMPAN </button>
                            </div>
                            {{-- <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                                <small class="form-text text-muted">Tekan tombol "SELESAI" Jika semua data telah benar</small>
                            </div> --}}
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')
<script type='text/javascript'>
    function preview_image(event) {
        var reader = new FileReader();
        reader.onload = function() {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
