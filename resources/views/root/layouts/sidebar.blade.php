
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('root.dashboard') }}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="admin">
              <i class="mdi mdi-account-plus menu-icon"></i>
              <span class="menu-title">Admin Kegiatan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="admin">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.create') }}">Tambah Admin</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('root.admin') }}">List Admin</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('root.kegiatan') }}">
              <i class="mdi mdi-run menu-icon"></i>
              <span class="menu-title">List Kegiatan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('root.riwayat') }}">
              <i class="mdi mdi-timetable menu-icon"></i>
              <span class="menu-title">Riwayat Kegiatan</span>
            </a>
          </li>
        </ul>
      </nav>