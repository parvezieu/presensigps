<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand navbar-brand-autodark">
      <a href="/panel/dashboardadmin">
        <img src="{{asset('assets/img/logopim.png')}}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
      </a>
    </h1>
    <div class="collapse navbar-collapse" id="sidebar-menu">
      <ul class="navbar-nav pt-lg-3">
        <li class="nav-item">
          <a class="nav-link {{ request()->is(['panel/dashboardadmin']) ? 'active' : '' }}" href="/panel/dashboardadmin" >
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
            </span>
            <span class="nav-link-title">
              Home
            </span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->is(['karyawan','departemen']) ? 'show' : '' }}" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="{{ request()->is(['karyawan','departemen']) ? 'true' : '' }}" >
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
            </span>
            <span class="nav-link-title">
              Data Master
            </span>
          </a>
          <div class="dropdown-menu {{ request()->is(['karyawan','departemen']) ? 'show' : '' }}">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item {{ request()->is(['karyawan']) ? 'active' : '' }}" href="/karyawan">
                  Data Karyawan
                </a>
                <a class="dropdown-item {{ request()->is(['departemen']) ? 'active' : '' }}" href="/departemen">
                  Data Departemen
                </a>
              </div>
            </div>
          </div>
        </li> 
        <li class="nav-item">
          <a class="nav-link {{ request()->is(['presensi/monitoring']) ? 'active' : '' }}" href="/presensi/monitoring" >
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-device-desktop-analytics"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 4m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z" /><path d="M7 20h10" /><path d="M9 16v4" /><path d="M15 16v4" /><path d="M9 12v-4" /><path d="M12 12v-1" /><path d="M15 12v-2" /><path d="M12 12v-1" /></svg>
            </span>
            <span class="nav-link-title">
              Monitoring Presensi
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is(['presensi/izinsakit']) ? 'active' : '' }}" href="/presensi/izinsakit" >
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-heart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M11.993 16.75l2.747 -2.815a1.9 1.9 0 0 0 0 -2.632a1.775 1.775 0 0 0 -2.56 0l-.183 .188l-.183 -.189a1.775 1.775 0 0 0 -2.56 0a1.899 1.899 0 0 0 0 2.632l2.738 2.825z" /></svg>
            </span>
            <span class="nav-link-title">
              Data Izin/Sakit
            </span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->is(['presensi/laporan','presensi/rekap']) ? 'show' : '' }}" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="{{ request()->is(['presensi/laporan','presensi/rekap']) ? 'true' : '' }}" >
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-data"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 17v-4" /><path d="M12 17v-1" /><path d="M15 17v-2" /><path d="M12 17v-1" /></svg>
            </span>
            <span class="nav-link-title">
              Laporan
            </span>
          </a>
          <div class="dropdown-menu {{ request()->is(['presensi/laporan','presensi/rekap']) ? 'show' : '' }}">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item {{ request()->is(['presensi/laporan']) ? 'active' : '' }}" href="/presensi/laporan">
                  Presensi
                </a>
                <a class="dropdown-item {{ request()->is(['presensi/rekap']) ? 'active' : '' }}" href="/presensi/rekap">
                  Rekap Presensi
                </a>
              </div>
            </div>
          </div>
        </li>
        @role('administrator','user')
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->is(['konfigurasi','konfigurasi/*']) ? 'show' : '' }}" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="{{ request()->is(['konfigurasi','konfigurasi/*']) ? 'true' : '' }}" >
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-adjustments-alt"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8h4v4h-4z" /><path d="M6 4l0 4" /><path d="M6 12l0 8" /><path d="M10 14h4v4h-4z" /><path d="M12 4l0 10" /><path d="M12 18l0 2" /><path d="M16 5h4v4h-4z" /><path d="M18 4l0 1" /><path d="M18 9l0 11" /></svg>
            </span>
            <span class="nav-link-title">
              Konfigurasi
            </span>
          </a>
          <div class="dropdown-menu {{ request()->is(['konfigurasi','konfigurasi/*']) ? 'show' : '' }}">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item {{ request()->is(['konfigurasi/lokasikantor']) ? 'active' : '' }}" href="/konfigurasi/lokasikantor">
                  Konfigurasi Lokasi Kantor
                </a>
                <a class="dropdown-item {{ request()->is(['konfigurasi/users']) ? 'active' : '' }}" href="/konfigurasi/users">
                  Users
                </a>
              </div>
            </div>
          </div>
        </li>
        @endrole
      </ul>
    </div>
  </div>
</aside>