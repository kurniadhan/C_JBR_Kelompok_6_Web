@extends('user.layouts.template')
@section('content')
<div class="inner cover">
    <h1 class="cover-heading">Sistem Informasi Kegiatan Mahasiswa</h1>
    <p class="lead cover-copy">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    <!--p class="lead"><button type="button" class="btn btn-lg btn-default btn-notify" data-toggle="modal" data-target="#subscribeModal">Beritahu dan Undang Saya !</button></p-->
  </div>
  <div class="mastfoot">
    <div class="inner">
      <p>&copy; Your Design .</p>
    </div>
  </div>
  <div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="subscribeModalLabel">Get Notified on Launch:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">Enter you e-mail to join</label>
              <input type="text" class="form-control" id="recipient-name" placeholder="your-name@gmail.com">
            </div>
          </form>
        </div>
@endsection