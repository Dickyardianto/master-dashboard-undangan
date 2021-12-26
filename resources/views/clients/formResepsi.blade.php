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

      {{-- Pengantin Pria --}}
      @if ($resepsi != null)
      <div class="col-5">
        <label for="" class="text-danger">
            Resepsi nikah sudah terisi
        </label>
        <div class="card">
          <form action="">
            @csrf
            <div class="card-body" style="padding-bottom: 0px;">
              <div class="form-group" style="margin-bottom: 0px;">
                <label>Tanggal Resepsi</label>
                <input type="date" class="form-control" name="tanggal_resepsi" value="{{ old('tanggal_resepsi') }}" disabled>
                <label for="" class="text-danger">
                  @error('tanggal_resepsi')
                    {{ $message }}
                  @enderror
                </label>
              </div>
              <div class="mb-3">
                  <label for="pukul" class="form-label">Pukul</label>
                  <input class="form-control" type="time" id="pukul" name="pukul_resepsi" disabled>
                  <label for="" class="text-danger">
                    @error('pukul_resepsi')
                      {{ $message }}
                    @enderror
                  </label>
              </div>
              <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input class="form-control" type="text" id="lokasi" name="lokasi_resepsi" value="{{ old('lokasi_resepsi') }}" disabled>
                <label for="" class="text-danger">
                  @error('lokasi_resepsi')
                    {{ $message }}
                  @enderror
                </label>
            </div>
            </div>
            <div class="card-footer text-right" style="padding-top: 0px">
              <a href="{{ route('index') }}" class="btn btn-secondary">Kembali</a>
              <a href="{{ route('form-besan-pria', $id_client) }}" class="btn btn-info ml-1">Lanjut</a>
            </div>
          </form>
          </div>
      </div>
      @else 
      <div class="col-5">
        <div class="card">
          <form action="{{ route('input-resepsi', $id_client) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" style="padding-bottom: 0px;">
                <div class="form-group" style="margin-bottom: 0px;">
                    <label>Tanggal Resepsi</label>
                    <input type="date" class="form-control" name="tanggal_resepsi" value="{{ old('tanggal_resepsi') }}">
                    <label for="" class="text-danger">
                      @error('tanggal_resepsi')
                        {{ $message }}
                      @enderror
                    </label>
                  </div>
                  <div class="">
                      <label for="pukul" class="form-label">Pukul</label>
                      <input class="form-control" type="time" id="pukul" name="pukul_resepsi" value="{{ old('pukul_resepsi') }}">
                      <label for="" class="text-danger">
                        @error('pukul_resepsi')
                          {{ $message }}
                        @enderror
                      </label>
                  </div>
                  <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input class="form-control" type="text" id="lokasi" name="lokasi_resepsi" value="{{ old('lokasi_resepsi') }}">
                    <label for="" class="text-danger">
                      @error('lokasi_resepsi')
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