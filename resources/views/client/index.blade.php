@extends('layouts/dashboard-layout')

@section('css')
<style>
.bgheader {
    background-color: #2bc75a;
    color: #ffffff;
}

.fullbutton {
    width: 100%!important;
    padding: 0.5rem 8rem!important;
}
</style>
@endsection

@section('main-content')

<div class="row">
    <div class="col-12 mt-2">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-sm-6 mt-1">
        <div class="card mb-2 bgheader">
            <div class="card-title">
                <h5 class="mt-2 text-center">CLIENT PANEL</h5>
            </div>
        </div>
    </div>
</div>

{{-- <div class="row"> --}}
    {{-- <div class="col-12"> --}}
        {{-- <div class="card mt-2 shadow-sm"> --}}
            {{-- <div class="card-body mt-1"> --}}
                {{-- <div class="container"> --}}
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-lg btn-info btn-block mb-2" style="width:100%" onclick="location.href = '{{ route('client-daftar-pesanan') }}';">
                                <i class="fas fa-archive"></i>
                                &nbsp;&nbsp;&nbsp; DAFTAR PESANAN
                            </button>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-lg btn-info btn-block mb-2" style="width:100%">
                                <i class="fas fa-archive"></i>
                                &nbsp;&nbsp;&nbsp; DAFTAR PENGGUNA
                            </button>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-lg btn-info btn-block mb-2 fullbutton" style="width:100%!important;">
                                    <i class="fas fa-archive"></i>
                                    &nbsp;&nbsp;&nbsp; LOGOUT
                                </button>
                            </form>
                        </div>
                    </div>
                {{-- </div> --}}
            {{-- </div> --}}
        {{-- </div> --}}
    {{-- </div> --}}
{{-- </div> --}}

@endsection
