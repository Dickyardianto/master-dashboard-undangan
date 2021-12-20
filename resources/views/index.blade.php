@extends('layouts.master')
@section('title', 'Dashboard | Undangan Online')
@section('content')
<div class="section-header">
  <h1>Daftar Client</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route('index') }}">Dashboard</a></div>
    <div class="breadcrumb-item">Client</div>
  </div>
</div>
<div class="section-body">
    <div class="row">
      <div class="col-md-5">
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
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('tambah-data') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th>
                      #
                    </th>
                    <th>Nama Client</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data_client as $no => $data)
                  <tr>
                    <td>
                      {{ $data_client->firstItem()+$no }}
                    </td>
                    <td>{{ $data->nama_client }}</td>
                    <td>
                      @if ($data->status == 1)
                        <div class="badge badge-info">Aktif</div>
                      @else    
                        <div class="badge badge-secondary">Tidak Aktif</div>
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('edit-data', $data->id) }}" class="btn btn-warning">Edit</a>
                      <a href="#" class="btn btn-danger delete-confirm" data-id="{{ $data->id }}">
                        <form action="{{ route('delete-data', $data->id) }}" id="delete{{ $data->id }}" method="POST">
                        @csrf
                        @method('delete')
                        </form>
                        Hapus
                      </a>
                      <a href="{{ route('isi-data-pengantin', $data->id) }}" class="btn btn-primary">Isi data</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $data_client->links() }}
            </div>
          </div>
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