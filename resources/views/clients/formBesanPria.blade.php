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
      @if ($besan_pria != null)
      <div class="col-md-5 col-sm-12">
        <label for="" class="text-danger">
            Besan pria sudah terisi
        </label>
        <div class="card">
          <form action="">
            @csrf
            <div class="card-body" style="padding-bottom: 0px;">

              <div class="form-group" style="margin-bottom: 0px;">
                <label>Nama ayah besan pria</label>
                <input type="text" class="form-control" name="nama_ayah" value="{{ $besan_pria->nama_ayah }}" disabled>
                <label for="" class="text-danger">
                  @error('nama_ayah')
                    {{ $message }}
                  @enderror
                </label>
              </div>
              <div class="mb-3">
                  <label for="nama-ibu" class="form-label">Nama ibu besan pria</label>
                  <input class="form-control" type="text" id="nama-ibu" name="nama_ibu" value="{{ $besan_pria->nama_ibu }}" disabled>
                  <label for="" class="text-danger">
                    @error('nama_ibu')
                      {{ $message }}
                    @enderror
                  </label>
              </div>

            </div>
            <div class="card-footer text-right" style="padding-top: 0px">
              <a href="{{ route('index') }}" class="btn btn-secondary">Kembali</a>
              <a href="{{ route('form-besan-wanita', $id_client) }}" class="btn btn-info ml-1">Lanjut</a>
            </div>
          </form>
          </div>
      </div>
      @else 
      <div class="col-md-5 col-sm-12">
        <div class="card">
          <form action="{{ route('input-besan-pria', $id_client) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" style="padding-bottom: 0px;">
                  <div class="form-group" style="margin-bottom: 0px;">
                    <label>Nama ayah besan pria <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_ayah" value="{{ old('nama_ayah') }}">
                    <label for="" class="text-danger">
                      @error('nama_ayah')
                        {{ $message }}
                      @enderror
                    </label>
                  </div>
                  <div class="mb-3">
                      <label for="nama-ibu" class="form-label">Nama ibu besan pria <span class="text-danger">*</span></label>
                      <input class="form-control" type="text" id="nama-ibu" name="nama_ibu" value="{{ old('nama_ibu') }}">
                      <label for="" class="text-danger">
                        @error('nama_ibu')
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