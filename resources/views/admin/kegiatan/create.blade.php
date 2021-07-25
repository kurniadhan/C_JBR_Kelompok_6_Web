@extends('admin/layouts.template')

@section('content')
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Tambah Kegiatan</h4>
			@if ($message = Session::get('error'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">×</button>
						<small>{{ $message }}</small>
				</div>
			@endif
			<form class="forms-sample" method="POST" action="{{ route('kegiatan.store') }}" enctype="multipart/form-data">
				@csrf

				<div class="form-group">
					<label for="judul">Judul Kegiatan</label>
					<input type="text" class="form-control" name="judul" placeholder="Judul Kegiatan" required>
				</div>
				<div class="form-group">
					<label for="nama_pemateri">Nama Pemateri</label>
					<input type="text" class="form-control" name="nama_pemateri" placeholder="Nama Pemateri" required>
				</div>
				<div class="form-group">
					<label for="kategori">Kategori</label>
					<select class="form-control" name="kategori" required>
						<option value="">Pilih Kategori</option>
						<option value="Event">Event</option>
						<option value="Lomba">Lomba</option>
						<option value="Seminar">Seminar</option>
					</select>
				</div>
				<div class="form-group">
					<label for="jenis_kelamin">Jenis</label>
					<div class="form-group row">
						<div class="col-sm-4">
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="jenis" value="Internal" required>
									Internal
								</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="jenis" value="Eksternal">
									Eksternal
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-sm-9 col-form-label">Tgl Buka</label>
							<div class="col-sm-9">
							<input type="date" class="form-control" name="tgl_buka"/>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-sm-9 col-form-label">Tgl Tutup</label>
							<div class="col-sm-9">
							<input type="date" class="form-control" name="tgl_tutup"/>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-sm-9 col-form-label" required>Tgl Pelaksanaan</label>
							<div class="col-sm-9">
							<input type="date" class="form-control" name="tgl_pelaksanaan"/>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-9 col-form-label" required>Jam Mulai</label>
							<div class="col-sm-9">
							<input type="time" class="form-control" name="jam_mulai"/>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-9 col-form-label" required>Jam Selesai</label>
							<div class="col-sm-9">
							<input type="time" class="form-control" name="jam_selesai"/>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="contact_person">Contact Person</label>
					<input type="number" class="form-control" name="contact_person" placeholder="Contact Person" required>
				</div>
				<div class="form-group">
					<label for="link_meet">Link Meeting</label>
					<input type="website" class="form-control" name="link_meet" placeholder="Link Meeting" required>
				</div>
				<div class="form-group">
					<label>Upload Foto</label>
					<input type="file" name="img" id="img" class="file-upload-default">
					<div class="input-group col-xs-12">
					<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
					<span class="input-group-append">
						<button class="file-upload-browse btn btn-primary" type="button" required>Upload</button>
					</span>
					</div>
				</div>
				<div class="form-group">
					<label for="deskripsi">Deksripsi</label>
					<textarea class="form-control" name="deskripsi" rows="4" required></textarea>
				</div>
				
				<button type="submit" class="btn btn-primary mr-2">Submit</button>
				<button class="btn btn-light">Cancel</button>
			</form>
		</div>
	</div>
@endsection