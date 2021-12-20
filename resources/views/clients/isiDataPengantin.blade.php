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
    <div class="col-5">
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
      <div class="col-5">
        <div class="card">
          <form action="{{ route('input-data-pengantin', $id_client) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" style="padding-bottom: 0px;">
              <div class="form-group" style="margin-bottom: 0px;">
                <label>Nama Pengantin Pria</label>
                <input type="text" class="form-control" name="nama_pengantin_pria" value="{{ old('nama_pengantin_pria') }}">
                <label for="" class="text-danger">
                  @error('nama_pengantin_pria')
                    {{ $message }}
                  @enderror
                </label>
              </div>
              <div class="mb-3">
                  <label for="formFile" class="form-label">Foto Utama</label>
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
    </div>
  </div>
@endsection