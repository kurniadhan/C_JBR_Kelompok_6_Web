
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ asset('frontend/index.html') }}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Kegiatan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ asset('frontend/pages/samples/login.html') }}"> Tambah Kegiatan </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ asset('frontend/pages/samples/login-2.html') }}"> List Kegiatan </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Admin Kegiatan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ asset('frontend/pages/ui-features/buttons.html') }}">Tambah Admin Kegiatan</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ asset('frontend/pages/ui-features/typography.html') }}">List Admin Kegiatan</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ asset('frontend/pages/forms/basic_elements.html') }}">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Riwayat Kegiatan</span>
            </a>
          </li>
        </ul>
      </nav>