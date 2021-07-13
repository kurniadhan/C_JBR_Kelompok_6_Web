@include('user.layouts.header')
  @include('user.layouts.navbar')      
  <main id="main">

    <div class="site-section pb-0 site-portfolio">
      <div class="container">

        <div class="row mb-5 align-items-end">
          <div class="col-md-6" data-aos="fade-up">
            <h2>Contact</h2>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam necessitatibus incidunt ut
              officiis explicabo inventore.
            </p>
          </div>

        </div>
      </div> 
    </div>    
         
        @foreach ($data as $admin)
        
        <div class="col-md-5 col-lg-20 mb-10 mb-lg-1">
            <div class="box" style="border :1px solid grey; padding-left : 10px;padding-right :10px; margin-right : 15px; ">
            <ul class="list-unstyled">
              <li class="mb-3">
                <strong class="d-block mb-1">Nama</strong>
               <span>{{$admin->nama}}</span>
              </li>
              <li class="mb-3">
                <strong class="d-block mb-1">Phone</strong>
                <span>{{$admin->notelp}}</span>
              </li>
              <li class="mb-3">
                <strong class="d-block mb-1">Email</strong>
                <span>{{$admin->email}}</span>
              </li>
              <li class="mb-3">
                <strong class="d-block mb-1">Prodi</strong>
                <span>{{$admin->id_prodi}}</span>
              </li>
              
            </ul>
          </div>
        </div>
        @endforeach    
  </main>
  @include('user.layouts.footer')
