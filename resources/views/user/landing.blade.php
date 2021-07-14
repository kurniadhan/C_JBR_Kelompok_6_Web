@extends('user.layouts.template')
@section('content')
<main id="main">

    <div class="site-section site-portfolio">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
            <h2>Kegiatan Mahasiswa</h2>
            <p class="mb-0">Activity Creative &amp; Professional </p>
          </div>
          <div class="col-md-12 col-lg-6 text-left text-lg-right" data-aos="fade-up" data-aos-delay="100">
            <div id="filters" class="filters">
              <a href="#" data-filter="*" class="active">Coming Soon</a>
              <a href="#" data-filter=".web">TIF</a>
              <a href="#" data-filter=".design">TKK</a>
              <a href="#" data-filter=".branding">MIF</a>
              
            </div>
          </div>
        </div>
        @foreach ($data as $kegiatan)
        <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
          <div class="item web col-sm-6 col-md-4 col-lg-4 mb-4">
            <a href="{{url('work-single')}}" class="item-wrap fancybox">
              <div class="work-info">
                <h3>{{($kegiatan->judul_kegiatan)}}</h3>
                <span>{{($kegiatan->id_prodi)}}</span>
              </div>
              <img class="img-fluid" src="{{asset('Landingpage/img/'.$kegiatan->nama_foto.'')}}">
            </a>
          </div>
        @endforeach
          
        </div>
      </div>
    </div>

    


   
          

          

        </div>

      </div>
    </div>
  </main>
@endsection