@extends('admin/layouts.template')

@section('content')
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Edit Profile</h4>
			<form class="forms-sample" method="POST" action="{{ route('admin.updateProfile', $users->id) }}" enctype="multipart/form-data">
				@csrf
                <div class="form-group">
					<input type="hidden" class="form-control" name="id" value="{{ $users->id }}">
				</div>
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" name="nama" value="{{ $users->nama }}">
				</div>
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="text" class="form-control" name="email" value="{{ $users->email }}">
				</div>
				<div class="form-group">
					<label for="jenis_kelamin">Jenis Kelamin</label>
					<div class="form-group row">
						<div class="col-sm-4">
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="jenis_kelamin" {{ ( $users->jenis_kelamin == "L" ) ? 'checked' : '' }} value="L" disabled>
									Laki - Laki
								</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="jenis_kelamin" {{ ( $users->jenis_kelamin == "P" ) ? 'checked' : '' }} value="P" disabled>
									Perempuan
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="notelp">Nomor Telepon</label>
					<input type="number" class="form-control" name="notelp" value="{{ $users->notelp }}">
				</div>

				<button type="submit" class="btn btn-primary mr-2">Submit</button>
				<a class="btn btn-light" href="{{ route('root.dashboard') }}">Cancel</a>
			</form>
		</div>
	</div>
@endsection