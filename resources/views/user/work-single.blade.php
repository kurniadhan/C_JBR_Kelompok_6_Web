@include('user.layouts.header')
  @include('user.layouts.navbar')      
  <main id="main">
    
    <div class="site-section pb-0">  
      @foreach ($data as $kegiatan)
        <div class="container">
          <div class="row align-items-stretch">
            <div class="col-md-8" data-aos="fade-up">
              <img src="{{asset('Landingpage/img/'.$kegiatan->nama_foto.'')}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-3 ml-auto" data-aos="fade-up" data-aos-delay="100">
              <div class="sticky-content">
                <h3 class="h3">{{$kegiatan->judul_kegiatan}}</h3>
                <p class="mb-4"><span class="text-muted">{{$kegiatan->prodi}}</span></p>

                <div class="mb-5">
                  <p>{{$kegiatan->deskripsi}}</p>

                </div>


                <h3 class="h3">{{$kegiatan->nama_pemateri}}</h3> 
                  <li>Tanggal Registrasi :  </li> 
                  {{$kegiatan->buka_registrasi}} sampai {{$kegiatan->tutup_registrasi}}
                  <li>Tanggal Pelaksanaan : </li>
                  {{$kegiatan->tgl_pelaksanaan}}
                  <li>Jam :</li>
                  Mulai {{$kegiatan->jam_mulai}} Selesai {{$kegiatan->jam_selesai}}
                  <li>Contack Person :</li>
                  {{$kegiatan->contact_person}}
                </ul>

                <p><a href="{{$kegiatan->link_meet}}" class="readmore">Visit Website</a></p>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

  </main>
@include('user.layouts.footer')