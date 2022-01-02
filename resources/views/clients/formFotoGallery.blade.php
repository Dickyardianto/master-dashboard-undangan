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
    @if ($foto_gallery != null)
    <div class="col-md-12 col-sm-12">
      <label for="" class="text-danger">
        Foto gallery sudah terisi
      </label>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="card border-card bg-secondary" style="width: 18rem;">
            <div class="card-body text-center">
                  <p class="card-text text-center mt-2">6 Foto</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
      <div class="card border-card bg-secondary" style="width: 18rem;">
          <div class="card-body text-center">
                <p class="card-text text-center mt-2">12 Foto</p>
          </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-12">
      <div class="card border-card bg-secondary" style="width: 18rem;">
          <div class="card-body text-center">
                <p class="card-text text-center mt-2">16 Foto</p>
          </div>
      </div>
    </div>
    <div class="col-md-12 col-sm-12 text-right">
      <a href="{{ route('index') }}" class="btn btn-secondary">Kembali</a>
      <a href="{{ route('form-foto-gallery', $id_client) }}" class="btn btn-info ml-1 mr-5">Lanjut</a>
    </div>
    @else 
    <div class="col-md-4 col-sm-12">
      <div class="card border-card" style="width: 18rem;">
          <div class="card-body text-center">
            <a href="{{ route('form-6-foto-gallery', $id_client) }}">
              <div>
                <p class="card-text text-center mt-2">6 Foto</p>
              </div>
            </a>
          </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
      <div class="card border-card" style="width: 18rem;">
          <div class="card-body text-center">
            <a href="{{ route('form-12-foto-gallery', $id_client) }}">
              <div>
                <p class="card-text text-center mt-2">12 Foto</p>
              </div>
            </a>
          </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
      <div class="card border-card" style="width: 18rem;">
          <div class="card-body text-center">
            <a href="">
              <div class="">
                <p class="card-text text-center mt-2">16 Foto</p>
              </div>
            </a>
          </div>
        </div>
    </div>
    @endif

  </div>
  </div>
@endsection