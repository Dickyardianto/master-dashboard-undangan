@extends('layouts.master')
@section('title', 'Tambah Data | Undangan Online')

@section('content')
<div class="section-header">
    <h1>Tambah Client</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('index') }}">Client</a></div>
      <div class="breadcrumb-item">Tambah Client</div>
    </div>
</div>

<div class="section-body">
    <div class="row">
      <div class="col-md-4 col-sm-12">
        <div class="card">
          <form action="{{ route('create-data') }}" method="POST">
            @csrf
            <div class="card-body" style="padding-bottom: 0px">
              <div class="form-group" style="margin-bottom: 0px">
                <label>Nama Client</label>
                <input type="text" class="form-control" name="nama_client" value="{{ old('nama_client') }}">
                <label for="" class="text-danger">
                  @error('nama_client')
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