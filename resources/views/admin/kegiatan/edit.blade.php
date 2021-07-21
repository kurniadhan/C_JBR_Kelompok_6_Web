@extends('admin/layouts.template')

@section('content')
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Edit Admin</h4>
			<form class="forms-sample" method="POST" action="{{ route('kegiatan.update', $kegiatan->id) }}" enctype="multipart/form-data">
				@csrf

                <div>
                    <input type="hidden" class="form-control" name="id" value="{{ $kegiatan->id }}">  
                </div>
				<div class="form-group">
					<label for="judul">Judul Kegiatan</label>
					<input type="text" class="form-control" name="judul" value="{{ $kegiatan->judul }}">
				</div>
				<div class="form-group">
					<label for="nama_pemateri">Nama Pemateri</label>
					<input type="text" class="form-control" name="nama_pemateri" value="{{ $kegiatan->nama_pemateri }}">
				</div>
				<div class="form-group">
					<label for="kategori">Kategori</label>
					<select class="form-control" name="kategori">
						<option value="">Pilih Kategori</option>
						<option value="Event" {{ ( $kegiatan->kategori == "Event" ) ? 'selected' : '' }} >Event</option>
						<option value="Lomba" {{ ( $kegiatan->kategori == "Lomba" ) ? 'selected' : '' }} >Lomba</option>
						<option value="Seminar" {{ ( $kegiatan->kategori == "Seminar" ) ? 'selected' : '' }} >Seminar</option>
					</select>
				</div>
				<div class="form-group">
					<label for="jenis_kelamin">Jenis</label>
					<div class="form-group row">
						<div class="col-sm-4">
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="jenis" {{ ( $kegiatan->jenis == "Internal" ) ? 'checked' : '' }} value="Internal">
									Internal
								</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="jenis" {{ ( $kegiatan->jenis == "Eksternal" ) ? 'checked' : '' }} value="Eksternal">
									Eksternal
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="prodi">Prodi</label>
					<select class="form-control" name="prodi">
						@foreach ($prodi as $prodi)
							<option value="{{ $prodi->id }}" {{ ( $prodi->id == $kegiatan->id_prodi ) ? 'selected' : '' }} >{{ $prodi->prodi }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="jurusan">Jurusan</label>
					<select class="form-control" name="jurusan">
						@foreach ($jurusan as $jurusan)
							<option value="{{ $jurusan->id }}" {{ ( $jurusan->id == $kegiatan->id_prodi ) ? 'selected' : '' }} >{{ $jurusan->jurusan }}</option>
						@endforeach
					</select>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-sm-9 col-form-label">Tgl Buka</label>
							<div class="col-sm-9">
							<input type="date" class="form-control" name="tgl_buka" value="{{ $kegiatan->tgl_buka }}"/>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-sm-9 col-form-label">Tgl Tutup</label>
							<div class="col-sm-9">
							<input type="date" class="form-control" name="tgl_tutup" value="{{ $kegiatan->tgl_tutup }}"/>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-sm-9 col-form-label">Tgl Pelaksanaan</label>
							<div class="col-sm-9">
							<input type="date" class="form-control" name="tgl_pelaksanaan" value="{{ $kegiatan->tgl_pelaksanaan }}"/>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-9 col-form-label">Jam Mulai</label>
							<div class="col-sm-9">
							<input type="time" class="form-control" name="jam_mulai" value="{{ $kegiatan->jam_mulai }}"/>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-sm-9 col-form-label">Jam Selesai</label>
							<div class="col-sm-9">
							<input type="time" class="form-control" name="jam_selesai" value="{{ $kegiatan->jam_selesai }}"/>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="contact_person">Contact Person</label>
					<input type="number" class="form-control" name="contact_person" value="{{ $kegiatan->contact_person }}">
				</div>
				<div class="form-group">
					<label for="link_meet">Link Meeting</label>
					<input type="website" class="form-control" name="link_meet" value="{{ $kegiatan->link_meet }}">
				</div>
                <div>
                    <input type="hidden" class="form-control" name="oldImg" value="{{ $kegiatan->nama_foto }}">  
                </div>
				<div class="form-group">
					<label>Upload Foto</label>
					<input type="file" name="img" id="img" class="file-upload-default">
					<div class="input-group col-xs-12">
					<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
					<span class="input-group-append">
						<button class="file-upload-browse btn btn-primary" type="button">Upload</button>
					</span>
					</div>
				</div>
				<div class="form-group">
					<label for="deskripsi">Deksripsi</label>
					<textarea class="form-control" name="deskripsi" rows="4">{{ $kegiatan->deskripsi }}</textarea>
				</div>
				
				<button type="submit" class="btn btn-primary mr-2">Submit</button>
				<a href="{{ route('admin.kegiatan') }}"><button class="btn btn-light">Cancel</button></a>
			</form>
		</div>
	</div>
@endsection