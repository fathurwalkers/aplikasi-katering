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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Halaman Utama</title>

    @yield('css')
    <style>
        #tujuan {
            background-color: #2bc75a!important;
        }

        .navbar-toggler-icon {
            background-color: #2bc75a!important;
        }

        .crd {
            border-top-left-radius : 7%!important;
            border-top-right-radius : 7%!important;
            border-bottom-left-radius : 6%!important;
            border-bottom-right-radius : 6%!important;
        }

        .crd2 {
            border-top-left-radius : 5%!important;
            border-top-right-radius : 5%!important;
            border-bottom-left-radius : 7%!important;
            border-bottom-right-radius : 7%!important;
        }
    </style>


  </head>
  <body id="body">
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
      <div class="container-fluid p-0">
        <button class="navbar-toggler border-0 shadow-none col-12 d-flex" type="button">
          <span class="navbar-toggler-icon" id="tujuan" style=""></span>
          <p class="nabvar-brand me-auto my-auto fw-bold text-white ms-4 col-8">APLIKASI KATERING</p>
        </button>
      </div>
    </nav>
    <!-- end of header -->

    <!-- sidebar nav -->
    <div class="navs col-10" id="navbarNav">
        <div class="row">
          <div class="akun-info col-12">
            {{-- <div class="card text-white rounded-0 sidenav">
              <div class="card-body mt-3 pt-0 mb-0" id="navbarNav">
                <p class="card-text mb-0">{{ $users->login_nama }}</p>
                <p class="card-text mb-2">{{ $users->login_email }}</p>
              </div>
            </div> --}}
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
              <li class="nav-item d-flex px-2">

                  <i class="fas fa-sign-out-alt my-auto"></i>
                  <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button type="submit" class="nav-link btn btn-md dtn-danger">
                          Keluar Akun
                      </button>
                  </form>

              </li>
            </ul>
          </div>
        </div>
      </div>
    <!-- end of sidebar nav --> --}}

    <!-- konten menu -->
    <section id="content" class="content py-5 d-flex justify-content-center mt-3">
      <div class="container mb-4">

        <div class="row mt-2 mb-1">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card crd2 text-white bg-info mb-3" style="">
                    <div class="card-body">
                      <h5 class="card-title">Selamat Datang</h5>
                      <p class="card-text">Anda dapat langsung memilih paket yang anda inginkan, jika anda telah memilih paket silahkan login untuk melanjutkan pemesanan, atau lakukan registrasi terlebih dahulu untuk melakukan pemesanan paket. </p>
                    </div>
                  </div>
            </div>
        </div>

        {{-- {{ asset('tampilan/img') }}/paket1.jpg --}}
        <div class="row d-flex justify-content-center mt-2 mb-1">
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                <h4>Paket Pilihan</h4>
            </div>
        </div>
        <div class="row mt-1 mb-2">
           <div class="col-sm-12 col-lg-12 col-md-12">

                <div class="card crd rounded-2 shadow">
                    <div class="card-body">

                        <div class="bd-example">
                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img src="{{ asset('tampilan/img') . "/". $paket1["paket_gambar"] }}" class="d-block w-100" alt="{{ asset('tampilan/img') . "/". $paket1["paket_gambar"] }}">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5 class="text-dark">First slide label</h5>
                                    <p>
                                        <button class="btn btn-primary">CEK</button>
                                    </p>
                                  </div>
                                </div>
                                <div class="carousel-item">
                                  <img src="{{ asset('tampilan/img') . "/". $paket2["paket_gambar"] }}" class="d-block w-100" alt="{{ asset('tampilan/img') . "/". $paket2["paket_gambar"] }}">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5 class="text-dark">Second slide label</h5>
                                    <p>
                                        <button class="btn btn-primary">CEK</button>
                                    </p>
                                  </div>
                                </div>
                                <div class="carousel-item">
                                  <img src="{{ asset('tampilan/img') . "/". $paket3["paket_gambar"] }}" class="d-block w-100" alt="{{ asset('tampilan/img') . "/". $paket3["paket_gambar"] }}">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h5 class="text-dark">Third slide label</h5>
                                    <p>
                                        <button class="btn btn-primary">CEK</button>
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

      </div>
    </section>

    <!-- background -->
    <div class="backdrop" id="backdrop"></div>

    <!-- footer -->
    <footer id="footer1" class="footer1 col-12 fixed-bottom py-2">
        <ul class="nav justify-content-around text-white">
            <li class="nav-item">
              <a class="nav-link active text-white py-0 d-flex flex-column" aria-current="page" href="{{ route('user-page') }}"
                ><i class="fas fa-home my-auto mx-auto"></i>
                <p class="mb-0">Beranda</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-white py-0 d-flex flex-column" aria-current="page" href="{{ route('client-daftar-paket') }}"
                ><i class="fas fa-list my-auto mx-auto"></i>
                <p class="mb-0">Daftar Paket</p>
              </a>
            </li>

            @php
                $users = session('data_login');
            @endphp
            @if ($users)
            <li class="nav-item">
              <a class="nav-link active text-white py-0 d-flex flex-column" aria-current="page" href="{{ route('dashboard') }}"
                ><i class="fas fa-users my-auto mx-auto"></i>
                <p class="mb-0">Dashboard</p>
              </a>
            </li>
            @endif
            @if ($users == null)
            <li class="nav-item">
              <a class="nav-link active text-white py-0 d-flex flex-column" aria-current="page" href="{{ route('login') }}"
                ><i class="fas fa-users my-auto mx-auto"></i>
                <p class="mb-0">Masuk</p>
              </a>
            </li>
            @endif

        </ul>
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('tampilan') }}/js/index.js"></script>

    @yield('js')
    <script>

    </script>

  </body>
</html>
