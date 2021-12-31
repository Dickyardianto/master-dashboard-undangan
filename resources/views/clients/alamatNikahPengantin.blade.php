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
      @if ($alamat_nikah != null)
      <div class="col-5">
        <label for="" class="text-danger">
            Alamat nikah sudah terisi
        </label>
        <div class="card">
          <form action="">
            @csrf
            <div class="card-body" style="padding-bottom: 0px;">
              <div class="form-group" style="margin-bottom: 0px;">
                <label>Alamat Nikah</label>
                <input type="text" class="form-control" name="alamat_nikah" value="{{ old('alamat_nikah') }}" disabled>
                <label for="" class="text-danger">
                  @error('alamat_nikah')
                    {{ $message }}
                  @enderror
                </label>
              </div>
              <div class="mb-3">
                  <label for="tanggal-nikah" class="form-label">Tanggal Nikah</label>
                  <input class="form-control" type="date" id="tanggal-nikah" name="tanggal_nikah" disabled>
                  <label for="" class="text-danger">
                    @error('tanggal_nikah')
                      {{ $message }}
                    @enderror
                  </label>
              </div>
            </div>
            <div class="card-footer text-right" style="padding-top: 0px">
              <a href="{{ route('index') }}" class="btn btn-secondary">Kembali</a>
              <a href="{{ route('form-resepsi', $id_client) }}" class="btn btn-info ml-1">Lanjut</a>
            </div>
          </form>
          </div>
      </div>
      @else 
      <div class="col-5">
        <div class="card">
          <form action="{{ route('input-alamat-nikah', $id_client) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" style="padding-bottom: 0px;">
              <div class="form-group" style="margin-bottom: 0px;">
                <label>Alamat Nikah <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="alamat_nikah" value="{{ old('alamat_nikah') }}">
                <label for="" class="text-danger">
                  @error('alamat_nikah')
                    {{ $message }}
                  @enderror
                </label>
              </div>
              <div class="mb-3">
                  <label for="tanggal-nikah" class="form-label">Tanggal Nikah <span class="text-danger">*</span></label>
                  <input class="form-control" type="date" id="tanggal-nikah" name="tanggal_nikah">
                  <label for="" class="text-danger">
                    @error('tanggal_nikah')
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