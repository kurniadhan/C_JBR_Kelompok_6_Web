@extends('root/layouts.template')

@section('content')
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">List Kegiatan</h4>
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
                {{ $message }}
        </div>
      @endif
      @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
                {{ $message }}
        </div>
      @endif
      <div class="table-responsive pt-3">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>
                #
              </th>
              <th>
                Judul Kegiatan
              </th>
              <th>
                Kategori
              </th>
              <th>
                Jenis
              </th>
              <th>
                Prodi
              </th>
              <th>
                Jurusan
              </th>
              <th>
                Gambar
              </th>
              <th style="text-align: center">
                Status
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $kegiatan)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $kegiatan->judul }}</td>
              <td>{{ $kegiatan->kategori }}</td>
              <td>{{ $kegiatan->jenis }}</td>
              <td>{{ ( $kegiatan->id_prodi == "0" ) ? 'Umum' : $kegiatan->prodi }}</td>
              <td>{{ $kegiatan->jurusan }}</td>
              <td>
                  <a href="{{ url('frontend/img/' . $kegiatan->nama_foto) }}" target="_blank">Lihat Gambar</a>
              </td>
              <td style="text-align: center">
                <label class="badge badge-danger">Tidak Aktif</label>
              </td>
            </tr>
            @endforeach
            <tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection