@include('user.layouts.header')
  @include('user.layouts.navbar')      
  <main id="main">
  @foreach ($data as $kegiatan)
    <div class="site-section pb-0">  
      
        <div class="container">
          <div class="row align-items-stretch">
            <div class="col-md-8" data-aos="fade-up">
              <img src="{{asset('Landingpage/img/'.$kegiatan->nama_foto.'')}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-3 ml-auto" data-aos="fade-up" data-aos-delay="100">
              <div class="sticky-content">
                <h3 class="h3 font-weight-bold">{{$kegiatan->judul_kegiatan}}</h3>
                <p class="mb-4"><span class="text-muted">{{$kegiatan->id_prodi}}</span></p>

                <div class="m-1 font-weight-bold">Pemateri : </div>
                  <p>{{$kegiatan->nama_pemateri}}
                </div>
                <div class="m-1 font-weight-bold">Tanggal Registrasi : </div>
                  <p>{{$kegiatan->buka_registrasi}} sampai {{$kegiatan->tutup_registrasi}}
                <div class="m-1 font-weight-bold">Tanggal Pelaksanaan : </div>
                  <p>{{$kegiatan->tgl_pelaksanaan}}
                <div class="m-1 font-weight-bold">Jam : </div>
                  <p>{{$kegiatan->jam_mulai}} WIB - {{$kegiatan->jam_selesai}} WIB
                <div class="m-1 font-weight-bold">Contack Person : </div>
                  <p>{{$kegiatan->contact_person}}
              
                <p><a href="{{$kegiatan->link_meet}}" class="readmore">Link Meet</a></p>
              </div>
            </div>
          </div>
        </div>
      
    </div>
    @endforeach

  </main>
@include('user.layouts.footer')