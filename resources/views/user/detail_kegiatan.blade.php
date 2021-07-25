@extends('user/layouts.template')

@section('content')
<main id="main">
  <div class="site-section">
    <div class="site-section pb-0">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-md-8" data-aos="fade-up">
          <img src="{{ asset('frontend/img/' . $kegiatan->nama_foto) }}" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-3 ml-auto" data-aos="fade-up" data-aos-delay="100">
          <div class="sticky-content">
              <h3 class="h3 font-weight-bold">{{ $kegiatan->judul }}</h3>
              <p class="mb-4"><span class="text-muted">{{ $kegiatan->kategori }}</span></p>
              <div class="mb-5">
                <p>{{ $kegiatan->deskripsi }}</p>
              </div>

              <h4 class="h4 mb-1 font-weight-bold">Pemateri : </h4>
              <div class="mb-4">
                <p>{{ $kegiatan->nama_pemateri }}</p>
              </div>
              <h4 class="h4 mb-1 font-weight-bold">Tanggal Registrasi : </h4>
              <div class="mb-4">
                <p>{{ $kegiatan->tgl_buka }} sampai {{ $kegiatan->tgl_tutup }}</p>
              </div>
              <h4 class="h4 mb-1 font-weight-bold">Tanggal Pelaksanaan : </h4>
              <div class="mb-4">
                <p>{{ $kegiatan->tgl_pelaksanaan }}</p>
              </div>
              <h4 class="h4 mb-1 font-weight-bold">Jam : </h4>
              <div class="mb-4">
                <p>{{ $kegiatan->jam_mulai }} WIB - {{ $kegiatan->jam_selesai }} WIB</p>
              </div>
              <h4 class="h4 mb-1 font-weight-bold">Contact Person : </h4>
              <div class="mb-4">
                <p>{{ $kegiatan->contact_person }}</p>
              </div>

              <p><a href="{{ $kegiatan->link_meet }}" target="__blank" class="readmore">Visit Website</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>
@endsection