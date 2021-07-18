@extends('root/layouts.template')

@section('content')
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Riwayat Kegiatan</h4>
      <p class="card-description">
      </p>
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
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $kegiatan)
            <tr>
              <td>{{ $kegiatan->id }}</td>
              <td>{{ $kegiatan->judul_kegiatan }}</td>
              <td>{{ $kegiatan->kategori }}</td>
              <td>{{ $kegiatan->jenis }}</td>
              <td>{{ $kegiatan->id_prodi }}</td>
              <td>{{ $kegiatan->id_jurusan }}</td>
              <td>
                  <a href="{{ url('img/' . $kegiatan->nama_foto) }}" target="_blank">Lihat Foto</a>
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