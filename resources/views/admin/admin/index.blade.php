@extends('admin/layouts.template')

@section('content')
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Admin Kegiatan</h4>
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
                Nama
              </th>
              <th>
                Email
              </th>
              <th>
                JK
              </th>
              <th>
                Prodi
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $admin)
            <tr>
              <td>{{ $admin->id }}</td>
              <td>{{ $admin->nama }}</td>
              <td>{{ $admin->email }}</td>
              <td>{{ $admin->jenis_kelamin }}</td>
            </tr>
            @endforeach
            <tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection