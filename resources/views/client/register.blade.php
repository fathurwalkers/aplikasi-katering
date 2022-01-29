<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('tampilan') }}/style/login.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('tampilan') }}/style/all.min.css">

    <title>Halaman Login</title>
  </head>
  <body>
    <!-- login -->
    <section id="logina" class="logina">
      <div class="col-12 login text-white py-2 fixed-top shadow-sm header">
        <!-- <a href="login.html" class="mt-1 me-2 icon"><i class="bi bi-arrow-left"></i></a> -->
        <h5 class="mx-auto col-12 pb-0 mt-1 text-center">LOGIN</h5>
      </div>

      <div class="container">
          <div class="row">
              <div class="col-12">

                <div class="container-fluid pt-5">
                    <div class="row mt-4">
                      <div class="col-12 d-flex justify-content-center">
                        <!-- <h2 class="display-1 fw-bold title text-lg-start text-center mb-4 pb-1 pt-2">E-Gizi</h2> -->
                        <img class="gambar img-thumbnail rounded-circle border-3" src="{{ asset('tampilan') }}/img/healthy-food.png" alt="gambar" />
                      </div>
                      <div class="col-12 mt-5 pt-5">
                        <form class="position-relative" action="{{ route('postregister') }}" method="POST">
                            @csrf
                            <div class="form-group mb-1">
                                <label for="login_nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="login_nama" aria-describedby="emailHelp" placeholder="Nama lengkap..." name="login_nama" value="{{ old('login_nama') }}">
                                <small id="emailHelp" class="form-text text-muted">Contoh : Raja</small>
                            </div>
                            <div class="form-group mb-1">
                                <label for="login_email">Email</label>
                                <input type="text" class="form-control" id="login_email" aria-describedby="emailHelp" placeholder="Email..." name="login_email" value="{{ old('login_email') }}">
                                <small id="emailHelp" class="form-text text-muted">contoh : raja112233@gmail.com</small>
                            </div>
                            <div class="form-group mb-1">
                                <label for="login_username">Username</label>
                                <input type="text" class="form-control" id="login_username" aria-describedby="emailHelp" placeholder="Username..." name="login_username" value="{{ old('login_username') }}">
                                <small id="emailHelp" class="form-text text-muted">Contoh : raja12345</small>
                            </div>
                            <div class="form-group mb-1">
                                <label for="login_password">Password</label>
                                <input type="password" class="form-control" id="login_password" aria-describedby="emailHelp" placeholder="Password..." name="login_password" value="{{ old('login_password') }}">
                            </div>
                            <div class="form-group mb-1">
                                <label for="login_password2">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="login_password2" aria-describedby="emailHelp" placeholder="Konfirmasi Password..." name="login_password2" value="{{ old('login_password2') }}">
                            </div>
                            <div class="form-group mb-1">
                                <label for="login_telepon">Telepon</label>
                                <input type="text" class="form-control" id="login_telepon" aria-describedby="emailHelp" placeholder="Telepon..." name="login_telepon" value="{{ old('login_telepon') }}">
                                <small id="emailHelp" class="form-text text-muted">Contoh : 085495334956</small>
                            </div>
                            <button type="submit" class="btn tombol text-white col-12 mt-4 rounded-pill">Simpan</button>
                        </form>
                      </div>
                      <div class="col-12 text-center mt-2">
                        <a href="lupa-password.html" class="text-dark forget">Lupa Password?</a>
                      </div>
                      <div class="col-12 text-center mt-3 d-flex justify-content-center">
                        <hr />
                        <p class="px-2">atau</p>
                        <hr />
                      </div>
                      <div class="col-12 text-center daftar">
                        <p>Belum punya akun ? Daftar <a href="{{ route('login') }}">disini</a></p>
                      </div>
                    </div>
                  </div>

              </div>
          </div>
      </div>
    </section>
    <!-- akhir login -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="{{ asset('tampilan') }}/js/index.js"></script>
  </body>
</html>
