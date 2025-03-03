<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="/" class="logo d-flex align-items-center me-auto">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <img src="/assets/img/logo.png" alt="">
      {{-- <h1 class="sitename">Ninestars</h1> --}}
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="/" class="active">Beranda</a></li>
        <li class="dropdown"><a href="#"><span>Peta banjir</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="/peta-banjir">Penyebab banjir</a></li>
            <li><a href="/peta-daerah-rawan">Daerah rawan banjir</a></li>
            <li><a href="/peta-dampak-banjir">Dampak banjir</a></li>
          </ul>
        </li>
        <li><a href="/kolaborator">Kolaborator</a></li>
        <li><a href="/laporan-banjir">Laporan</a></li>
        <li><a href="/artikel">Edukasi</a></li>
        <li><a href="/kegiatan">Kegiatan</a></li>
        @if(Auth::check())
          <li class="dropdown">
            <a href="#">
              <img src="/assets/img/user/{{ Auth::user()->image ?? 'default.webp' }}" alt="User Profile" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
              <i class="bi bi-chevron-down toggle-dropdown"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a href="/dashboard/profil">Profile</a></li>
              <li><a href="/logout">Logout</a></li>
            </ul>
          </li>
        @else
          <a href="/login" class="btn btn-success btn-sm text-white" style="padding: 4px 16px">Masuk</a>
        @endif
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="btn-getstarted d-none" href="index.html#about">Get Started</a>

  </div>
</header>