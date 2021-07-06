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
                Prodi
              </th>
              <th>
                
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data['admin'] as $admin)
            <tr>
              <td>{{ $admin->id }}</td>
              <td>{{ $admin->nama }}</td>
              <td>{{ $admin->email }}</td>
              <td>{{ $admin->id_jurusan }}</td>
              <td>
                  <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                  <form action="{{ route('admin.destroy', $admin->id) }}" method="post" class="d-inline-block">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Anda ingin menghapus user ini?')">
                        <i class="fa fa-trash"></i>
                    </button>
                  </form>
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