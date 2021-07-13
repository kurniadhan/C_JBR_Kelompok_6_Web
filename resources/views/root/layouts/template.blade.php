<!-- Header -->
@include('admin/layouts.header')

<!-- Navbar -->
@include('admin/layouts.navbar')

<!-- Sidebar -->
@include('admin/layouts.sidebar')

<!-- Content -->
<div class="main-panel">
	@yield('content')

<!-- Footer -->
@include('admin/layouts.footer')