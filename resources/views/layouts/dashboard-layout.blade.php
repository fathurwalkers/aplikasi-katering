<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('tampilan') }}/style/home.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Halaman Utama</title>

    @yield('css')

  </head>
  <body id="body">
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
      <div class="container-fluid p-0">
        <button class="navbar-toggler border-0 shadow-none col-12 d-flex" type="button">
          <span class="navbar-toggler-icon" id="tujuan"></span>
          <p class="nabvar-brand me-auto my-auto fw-bold text-white ms-4 col-8">YEYEN CATERING</p>
        </button>
      </div>
    </nav>
    <!-- end of header -->

    <!-- sidebar nav -->
    <div class="navs col-10" id="navbarNav">
      <div class="row">
        <div class="akun-info col-12">
          <div class="card text-white rounded-0 sidenav">
            <div class="card-body pb-1 mt-3" id="navbarNav">
              <img class="card-img-top gambar img-thumbnail rounded-circle" src="{{ asset('tampilan') }}/img/yeyen.png" alt="user" />
            </div>
            @if ($users !== null)
                <div class="card-body mt-3 pt-0 mb-0" id="navbarNav">
                    <p class="card-text mb-0">{{ $users->login_nama }}</p>
                    <p class="card-text mb-2">{{ $users->login_email }}</p>
                </div>
            @endif
          </div>
        </div>
        <div class="col-12 text-white mt-3 menu">
          <ul class="nav flex-column">
            <li class="nav-item d-flex px-2 aktiv">
              <i class="fas fa-home my-auto"></i>
              <a class="nav-link" href="#">Menu Utama</a>
            </li>
            {{-- <li class="nav-item d-flex px-2">
              <i class="fas fa-info-circle my-auto"></i>
              <a class="nav-link" href="#">Bantuan</a>
            </li> --}}
            @if ($users !== null)
            <li class="nav-item d-flex px-2">

                <i class="fas fa-sign-out-alt my-auto"></i>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-md dtn-danger">
                        Keluar Akun
                    </button>
                </form>

            </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
    <!-- end of sidebar nav -->

    <!-- konten menu -->
    <section id="content" class="content py-5 d-flex justify-content-center mt-2">
      <div class="container mb-4">

        @yield('main-content')

        @yield('pagination')

    </div>
    </section>


    <!-- background -->
    <div class="backdrop" id="backdrop"></div>

    <!-- footer -->
    <footer id="footer1" class="footer1 col-12 fixed-bottom py-2">
      <x-client-navbar-footer />
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('tampilan') }}/js/index.js"></script>

    @yield('js')

  </body>
</html>
