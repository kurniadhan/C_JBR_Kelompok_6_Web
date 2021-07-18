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
                Jenis Kelamin
              </th>
              <th>
                Prodi
              </th>
              <th colspan="2" style="text-align: center;">
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
              <td>{{ $admin->jenis_kelamin === "L" ? "Laki - Laki" : "Perempuan" }}</td>
              <td>{{ $admin->id_prodi }}</td>
              <td style="text-align: center;">
                <a href="{{ route('admin.edit', $admin->id) }}"><i class="btn btn-primary btn-sm mdi mdi-pencil"></i></a>
              </td>
              <td style="text-align: center;">
                <a href="{{ route('admin.destroy', $admin->id) }}"><i class="btn btn-primary btn-sm mdi mdi-delete"></i></a>
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