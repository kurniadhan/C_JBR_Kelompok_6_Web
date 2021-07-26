@extends('root/layouts.template')

@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
          <div class="d-flex align-items-end flex-wrap">
            <div class="mr-md-3 mr-xl-5">
              <h2 class="mb-4">Selamat Datang, {{ Auth::user()->nama }}</h2>
              <div class="d-flex">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
                  <small>{{ $message }}</small>
          </div>
        @endif
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body dashboard-tabs p-0">
            <div class="tab-content py-0 px-0">
              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                <div class="d-flex flex-wrap justify-content-xl-between">
                  <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-security mr-3 icon-lg text-info"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-2 text-muted">Level</small>
                      <h5 class="mr-2 mb-0">{{ Auth::user()->level }}</h5>
                    </div>
                  </div>
                  <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-account mr-3 icon-lg text-primary"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-2 text-muted">Prodi</small>
                      <h5 class="mr-2 mb-0">{{ $admin }} Orang</h5>
                    </div>
                  </div>
                  <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-calendar-check mr-3 icon-lg text-success"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-2 text-muted">Total Kegiatan</small>
                      <h5 class="mr-2 mb-0">{{ $kegiatan }} Aktif</h5>
                    </div>
                  </div>
                  <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-calendar-remove mr-3 icon-lg text-danger"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-2 text-muted">Riwayat Kegiatan</small>
                      <h5 class="mr-2 mb-0">{{ $riwayat }} Tidak Aktif</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div style="padding-bottom: 253px"></div>
@endsection