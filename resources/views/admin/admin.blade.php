@extends('layouts.master')
@section('title', 'Admin | Undangan Online')
@section('content')
<div class="section-header">
  <h1>Data Admin</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route('index') }}">Dashboard</a></div>
    <div class="breadcrumb-item">Admin</div>
  </div>
</div>
<div class="section-body">
  <div class="row">
    <div class="col-md-4">
      @if (session('message'))
          <div class="alert alert-success autoHide alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismis="alert">
                <span>x</span>
              </button>
              {{ session('message') }}
            </div>
          </div>
      @endif
    </div>
  </div>
    <div class="row">
      <div class="col-md-4 col-sm-12">
        <div class="card">
          <div class="card-body">
              <form action="{{ route('update-admin', Auth::user()->id) }}" method="POST">
                @csrf
                @method('patch')
                <table>
                    <tr>
                        <td>Nama</td>
                        <td width="20">:</td>
                        <td>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>
                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td>
                            <input type="password" class="form-control" name="password">
                        </td>
                    </tr>
                </table>
            
          </div>
          <div class="card-footer text-right" style="padding-top: 0px">
            <a href="{{ route('index') }}" class="btn btn-secondary">Kembali</a>
            <button class="btn btn-warning ml-1" type="submit">Edit</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('script')
<script>
  $(".delete-confirm").click(function(e) {
    id = e.target.dataset.id;
  swal({
      title: 'Apakah kamu yakin?',
      text: 'Akan menghapus client ini!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal('Client berhasil dihapus!', {
          icon: 'success',
        });
        $(`#delete${id}`).submit();
      } else {
        swal('Penghapusan dibatalkan!');
      }
    });
});
</script>
@endpush