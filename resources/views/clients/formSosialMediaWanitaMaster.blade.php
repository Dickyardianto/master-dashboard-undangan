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
      @if ($sosial_media_wanita != null)
      <div class="col-5">
        <label for="" class="text-danger">
            Sosial media wanita sudah terisi
        </label>
        <div class="card">
          <form action="">
            @csrf
            <div class="card-body" style="padding-bottom: 0px;">
              <div class="form-group" style="margin-bottom: 0px;">
                <label>Instagram</label>
                <input type="text" class="form-control" name="instagram" value="{{ old('instagram') }}" disabled>
                <label for="" class="text-danger">
                  @error('instagram')
                    {{ $message }}
                  @enderror
                </label>
              </div>
              <div class="mb-3">
                  <label for="twitter" class="form-label">Twitter</label>
                  <input class="form-control" type="text" id="twitter" name="twitter" disabled>
                  <label for="" class="text-danger">
                    @error('twitter')
                      {{ $message }}
                    @enderror
                  </label>
              </div>
              <div class="mb-3">
                <label for="facebook" class="form-label">Facebook</label>
                <input class="form-control" type="text" id="facebook" name="facebook" value="{{ old('facebook') }}" disabled>
                <label for="" class="text-danger">
                  @error('facebook')
                    {{ $message }}
                  @enderror
                </label>
            </div>
            </div>
            <div class="card-footer text-right" style="padding-top: 0px">
              <a href="{{ route('index') }}" class="btn btn-secondary">Kembali</a>
              <a href="{{ route('form-pendukung', $id_client) }}" class="btn btn-info ml-1">Lanjut</a>
            </div>
          </form>
          </div>
      </div>
      @else 
      <div class="col-5">
        <div class="card">
          <form action="{{ route('input-sosial-media-wanita', $id_client) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" style="padding-bottom: 0px;">
                <div class="form-group" style="margin-bottom: 0px;">
                    <label>Instagram</label>
                    <input type="text" class="form-control" name="instagram" value="{{ old('instagram') }}">
                    <label for="" class="text-danger">
                      @error('instagram')
                        {{ $message }}
                      @enderror
                    </label>
                  </div>
                  <div class="mb-3">
                      <label for="twitter" class="form-label">Twitter</label>
                      <input class="form-control" type="text" id="twitter" name="twitter" value="{{ old('twitter') }}">
                      <label for="" class="text-danger">
                        @error('twitter')
                          {{ $message }}
                        @enderror
                      </label>
                  </div>
                  <div class="mb-3">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input class="form-control" type="text" id="facebook" name="facebook" value="{{ old('facebook') }}">
                    <label for="" class="text-danger">
                      @error('facebook')
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