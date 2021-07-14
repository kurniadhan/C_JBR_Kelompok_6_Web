<!-- Header -->
@include('root/layouts.header')

<!-- Navbar -->
@include('root/layouts.navbar')

<!-- Sidebar -->
@include('root/layouts.sidebar')

<!-- Content -->
<div class="main-panel">
	@yield('content')

<!-- Footer -->
@include('root/layouts.footer')