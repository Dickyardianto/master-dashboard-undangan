@extends('layouts.master')
@section('title', 'Tambah Data Pengantin | Undangan Online')

@section('content')
<div class="section-header">
    <h1>Tambah Data Pengantin</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('index') }}">Client</a></div>
      <div class="breadcrumb-item">Tambah Data Pengantin</div>
    </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-md-5 col-sm-12">
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

      {{-- Pengantin Pria --}}
      @if ($data_pengantin_pria != null)
      <div class="col-md-5 col-sm-12">
        <label for="" class="text-danger">
            Nama pengantin pria sudah terisi
        </label>
        <div class="card">
          <form action="{{ route('input-data-pria', $id_client) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" style="padding-bottom: 0px;">
              <div class="form-group" style="margin-bottom: 0px;">
                <label>Nama Pengantin Pria</label>
                <input type="text" class="form-control" name="nama_pengantin_pria" value="{{ old('nama_pengantin_pria') }}" disabled>
                <label for="" class="text-danger">
                  @error('nama_pengantin_pria')
                    {{ $message }}
                  @enderror
                </label>
              </div>
              <div class="mb-3">
                  <label for="formFile" class="form-label">Foto Utama</label>
                  <input class="form-control" type="file" id="formFile" name="file_foto_utama" disabled>
                  <label for="" class="text-danger">
                    @error('file_foto_utama')
                      {{ $message }}
                    @enderror
                  </label>
              </div>
            </div>
            <div class="card-footer text-right" style="padding-top: 0px">
              <a href="{{ route('index') }}" class="btn btn-secondary">Kembali</a>
              <a href="{{ route('form-data-pengantin-wanita', $id_client) }}" class="btn btn-info ml-1">Lanjut</a>
            </div>
          </form>
          </div>
      </div>
      @else 
      <div class="col-md-5 col-sm-12">
        <div class="card">
          <form action="{{ route('input-data-pria', $id_client) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" style="padding-bottom: 0px;">
              <div class="form-group" style="margin-bottom: 0px;">
                <label>Nama Pengantin Pria <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama_pengantin_pria" value="{{ old('nama_pengantin_pria') }}">
                <label for="" class="text-danger">
                  @error('nama_pengantin_pria')
                    {{ $message }}
                  @enderror
                </label>
              </div>
              <div class="mb-3">
                  <label for="formFile" class="form-label">Foto Utama <span class="text-danger">*</span></label>
                  <input class="form-control" type="file" id="formFile" name="file_foto_utama">
                  <label for="" class="text-danger">
                    @error('file_foto_utama')
                      {{ $message }}
                    @enderror
                  </label>
              </div>
            </div>
            <div class="card-footer text-right" style="padding-top: 0px">
              <a href="{{ route('index') }}" class="btn btn-secondary">Kembali</a>
              <button class="btn btn-primary ml-1" type="submit">Submit</button>
            </div>
          </form>
          </div>
      </div>
      @endif

      

    </div>
  </div>
@endsection