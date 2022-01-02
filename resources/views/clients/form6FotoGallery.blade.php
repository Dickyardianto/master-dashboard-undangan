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

      <div class="col-md-5 col-sm-12">
        <div class="card">
          <form action="{{ route('input-6-foto-gallery', $id_client) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" style="padding-bottom: 0px;">
              <div class="form-group" style="margin-bottom: 0px;">
                  <label for="foto1" class="form-label">Foto 1 <span class="text-danger">*</span></label>
                  <input class="form-control" type="file" id="foto1" name="foto1">
                  <label for="" class="text-danger">
                    @error('foto1')
                      {{ $message }}
                    @enderror
                  </label>
              </div>
              <div>
                  <label for="foto2" class="form-label">Foto 2 <span class="text-danger">*</span></label>
                  <input class="form-control" type="file" id="foto2" name="foto2">
                  <label for="" class="text-danger">
                    @error('foto2')
                      {{ $message }}
                    @enderror
                  </label>
              </div>
              <div>
                <label for="foto3" class="form-label">Foto 3 <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="foto3" name="foto3">
                <label for="" class="text-danger">
                  @error('foto3')
                    {{ $message }}
                  @enderror
                </label>
             </div>
             <div>
                <label for="foto4" class="form-label">Foto 4 <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="foto4" name="foto4">
                <label for="" class="text-danger">
                  @error('foto4')
                    {{ $message }}
                  @enderror
                </label>
             </div>
             <div>
                <label for="foto5" class="form-label">Foto 5 <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="foto5" name="foto5">
                <label for="" class="text-danger">
                  @error('foto5')
                    {{ $message }}
                  @enderror
                </label>
             </div>
             <div class="mb-3">
                <label for="foto6" class="form-label">Foto 6 <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="foto6" name="foto6">
                <label for="" class="text-danger">
                  @error('foto6')
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