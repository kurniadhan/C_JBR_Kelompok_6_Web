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
        <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
          <div class="item web col-sm-6 col-md-4 col-lg-4 mb-4">
            <a href="work-single.html" class="item-wrap fancybox">
              <div class="work-info">
                <h3>Boxed Water</h3>
                <span>Web</span>
              </div>
              <img class="img-fluid" src="{{asset('Landingpage/img/img_1.jpg')}}">
            </a>
          </div>
          <div class="item photography col-sm-6 col-md-4 col-lg-4 mb-4">
            <a href="work-single.html" class="item-wrap fancybox">
              <div class="work-info">
                <h3>Build Indoo</h3>
                <span>Photography</span>
              </div>
              <img class="img-fluid" src="{{asset('Landingpage/img/img_2.jpg')}}">
            </a>
          </div>
          <div class="item branding col-sm-6 col-md-4 col-lg-4 mb-4">
            <a href="work-single.html" class="item-wrap fancybox">
              <div class="work-info">
                <h3>Cocooil</h3>
                <span>Branding</span>
              </div>
              <img class="img-fluid" src="{{asset('Landingpage/img/img_3.jpg')}}">
            </a>
          </div>
          <div class="item design col-sm-6 col-md-4 col-lg-4 mb-4">
            <a href="work-single.html" class="item-wrap fancybox">
              <div class="work-info">
                <h3>Nike Shoe</h3>
                <span>Design</span>
              </div>
              <img class="img-fluid" src="{{asset('Landingpage/img/img_4.jpg')}}">
            </a>
          </div>
          <div class="item photography col-sm-6 col-md-4 col-lg-4 mb-4">
            <a href="work-single.html" class="item-wrap fancybox">
              <div class="work-info">
                <h3>Kitchen Sink</h3>
                <span>Photography</span>
              </div>
              <img class="img-fluid" src="{{asset('Landingpage/img/img_5.jpg')}}">
            </a>
          </div>
          <div class="item branding col-sm-6 col-md-4 col-lg-4 mb-4">
            <a href="work-single.html" class="item-wrap fancybox">
              <div class="work-info">
                <h3>Amazon</h3>
                <span>brandingn</span>
              </div>
              <img class="img-fluid" src="{{asset('Landingpage/img/img_6.jpg')}}">
            </a>
          </div>
        </div>
      </div>
    </div>

    


   
          

          

        </div>

      </div>
    </div>
  </main>
@endsection