@include('admin/layouts/header')
@include('admin/layouts/navbar')
@include('admin/layouts/sidebar')

<div class="main-panel">
  @yield('content')
</div>

@include('admin/layouts/footer')