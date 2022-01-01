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
    <div class="col-md-4 col-sm-12">
        <div class="card border-card" style="width: 18rem;">
            <div class="card-body text-center">
              <a href="">
                <div class="">
                  <p class="card-text text-center mt-2">6 Foto</p>
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
  </div>
    
  </div>
@endsection