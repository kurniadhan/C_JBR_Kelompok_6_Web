@extends('root/layouts.template')

@section('content')
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Admin Kegiatan</h4>
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
        <table class="table table-hover">
          <thead>
            <tr>
              <th>
                #
              </th>
              <th>
                Nama
              </th>
              <th>
                Email
              </th>
              <th style="text-align: center">
                Jenis Kelamin
              </th>
              <th>
                No HP
              </th>
              <th>
                Prodi
              </th>
              <th>
                Jurusan
              </th>
              <th colspan="2" style="text-align: center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $admin)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $admin->nama }}</td>
                <td>{{ $admin->email }}</td>
                <td style="text-align: center">{{ $admin->jenis_kelamin === "L" ? "Laki - Laki" : "Perempuan" }}</td>
                <td>{{ $admin->notelp }}</td>
                <td>{{ $admin->prodi }}</td>
                <td>{{ $admin->jurusan }}</td>
                <td style="text-align: center;">
                  <a href="{{ route('admin.edit', $admin->id) }}"><i class="btn btn-outline-primary btn-sm mdi mdi-pencil"></i></a>
                </td>
                <td style="text-align: center;">
                  <a href="{{ route('admin.destroy', $admin->id) }}"><i class="btn btn-outline-danger btn-sm mdi mdi-delete"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection