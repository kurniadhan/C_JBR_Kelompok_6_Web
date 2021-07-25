@extends('admin/layouts.template')

@section('content')
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">List Kegiatan</h4>
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
                Jurusan
              </th>
              <th>
                Gambar
              </th>
              <th colspan="2" style="text-align: center;">
                Action
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
              <td>{{ $kegiatan->jurusan }}</td>
              <td>
                  <a href="{{ url('frontend/img/' . $kegiatan->nama_foto) }}" target="_blank">Lihat Gambar</a>
              </td>
              <td style="text-align: center;">
                <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"><i class="btn btn-outline-primary btn-sm mdi mdi-pencil"></i></a>
              </td>
              <td style="text-align: center;">
                <a href="{{ route('kegiatan.destroy', $kegiatan->id) }}"><i class="btn btn-outline-danger btn-sm mdi mdi-delete"></i></a>
              </td>
              <td style="text-align: center">
                <a href="{{ route('kegiatan.status', $kegiatan->id) }}"><i class="badge badge-danger">Tidak Aktif</i></a>
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