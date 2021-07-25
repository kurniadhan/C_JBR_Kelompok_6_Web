@extends('user/layouts.template')

@section('content')  
<main id="main">

  <div class="site-section site-portfolio">
    <div class="container">
      <div class="row mb-5 align-items-center">
        <div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
          <h2>Kegiatan Mahasiswa</h2>
          <p class="mb-0">Menampilkan daftar kegiatan dari Jurusan Teknologi Informasi</p>
        </div>
        <div class="col-md-12 col-lg-6 text-left text-lg-right" data-aos="fade-up" data-aos-delay="100">
          <div id="filters" class="filters">
            <a href="#" data-filter="*" class="active">All</a>
            <a href="#" data-filter=".1">TIF</a>
            <a href="#" data-filter=".2">TKK</a>
            <a href="#" data-filter=".3">MIF</a>
          </div>
        </div>
      </div>
      <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
        @foreach ($data as $kegiatan)
          <div class="item {{ $kegiatan->id_prodi }} col-sm-6 col-md-4 col-lg-4 mb-4">
            <a href="{{ route('user.detail', $kegiatan->id) }}" class="item-wrap fancybox">
              <div class="work-info">
                <h3>{{ $kegiatan->judul }}</h3>
                <span>{{ $kegiatan->kategori }}</span>
              </div>
              <img class="img-fluid" src="{{ asset('frontend/img/' . $kegiatan->nama_foto) }}">
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</main>
@endsection