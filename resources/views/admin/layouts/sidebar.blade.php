
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#kegiatan" aria-expanded="false" aria-controls="kegiatan">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Kegiatan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="kegiatan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('kegiatan.create') }}"> Tambah Kegiatan </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.kegiatan') }}"> List Kegiatan </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{  route('admin.riwayat') }}">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Riwayat Kegiatan</span>
            </a>
          </li>
        </ul>
      </nav>