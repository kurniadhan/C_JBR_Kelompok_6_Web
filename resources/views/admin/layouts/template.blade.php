@include('admin/layouts/header')
<div class="container-fluid page-body-wrapper">
@include('admin/layouts/sidebar')
</div>
<!-- partial -->
<div class="main-panel">
  @yield('content')
</div>
@include('admin/layouts/footer')