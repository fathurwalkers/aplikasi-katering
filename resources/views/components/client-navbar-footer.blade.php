<div>
    <ul class="nav justify-content-around text-white">
        <li class="nav-item">
          <a class="nav-link active text-white py-0 d-flex flex-column" aria-current="page" href="{{ route('dashboard') }}"
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
</div>
