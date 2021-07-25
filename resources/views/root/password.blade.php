@extends('root/layouts.template')

@section('content')
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Edit Password</h4>
			@if ($message = Session::get('error'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">×</button>
						<small>{{ $message }}</small>
				</div>
			@endif
			<form class="forms-sample" method="POST" action="{{ route('root.updatePassword', $users->id) }}" enctype="multipart/form-data">
				@csrf
                <div class="form-group">
					<input type="hidden" class="form-control" name="id" value="{{ $users->id }}">
				</div>
				<div class="form-group">
					<label for="nama">Password Lama</label>
					<input type="password" class="form-control" name="oldPass">
				</div>
				<div class="form-group">
					<label for="nama">Password Baru</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<label for="nama">Konfirmasi Password Baru</label>
					<input type="password" class="form-control" name="cpassword">
				</div>
				<button type="submit" class="btn btn-primary mr-2">Submit</button>
				<a class="btn btn-light" href="{{ route('root.dashboard') }}">Cancel</a>
			</form>
		</div>
	</div>
@endsection