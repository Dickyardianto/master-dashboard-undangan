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
      @if ($pendukung_master != null)
      <div class="col-5">
        <label for="" class="text-danger">
            Table pendukung sudah terisi
        </label>
        <div class="card">
          <form action="">
            @csrf
            <div class="card-body" style="padding-bottom: 0px;">
              <div class="form-group" style="margin-bottom: 0px;">
                <label>Musik</label>
                <input type="file" class="form-control" name="musik" value="{{ old('musik') }}" disabled>
                <label for="" class="text-danger">
                  @error('musik')
                    {{ $message }}
                  @enderror
                </label>
              </div>
              <div class="mb-3">
                  <label for="ayat" class="form-label">Quotes (Ayat)</label>
                  <input class="form-control" type="text" id="ayat" name="ayat_quotes" disabled>
                  <label for="" class="text-danger">
                    @error('ayat_quotes')
                      {{ $message }}
                    @enderror
                  </label>
              </div>
              <div class="mb-3">
                <label for="maps" class="form-label">Maps</label>
                <input class="form-control" type="text" id="maps" name="maps" value="{{ old('maps') }}" disabled>
                <label for="" class="text-danger">
                  @error('maps')
                    {{ $message }}
                  @enderror
                </label>
              </div>
              <div class="mb-3">
                <label for="quotes" class="form-label">Quotes</label>
                <input class="form-control" type="text" id="quotes" name="quotes" value="{{ old('quotes') }}" disabled>
                <label for="" class="text-danger">
                  @error('quotes')
                    {{ $message }}
                  @enderror
                </label>
              </div>
            </div>
            <div class="card-footer text-right" style="padding-top: 0px">
              <a href="{{ route('index') }}" class="btn btn-secondary">Kembali</a>
              <a href="{{ route('form-sosial-media-wanita', $id_client) }}" class="btn btn-info ml-1">Lanjut</a>
            </div>
          </form>
          </div>
      </div>
      @else 
      <div class="col-5">
        <div class="card">
          <form action="{{ route('input-pendukung', $id_client) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" style="padding-bottom: 0px;">
                <div class="form-group" style="margin-bottom: 0px;">
                    <label>Musik</label>
                    <input type="file" class="form-control" name="musik" value="{{ old('musik') }}">
                    <label for="" class="text-danger">
                      @error('musik')
                        {{ $message }}
                      @enderror
                    </label>
                  </div>
                  <div >
                      <label for="ayat" class="form-label">Quotes (Ayat)</label>
                      <input class="form-control" type="text" id="ayat" name="ayat_quotes" >
                      <label for="" class="text-danger">
                        @error('ayat_quotes')
                          {{ $message }}
                        @enderror
                      </label>
                  </div>
                  <div>
                    <label for="maps" class="form-label">Maps</label>
                    <input class="form-control" type="text" id="maps" name="maps" value="{{ old('maps') }}">
                    <label for="" class="text-danger">
                      @error('maps')
                        {{ $message }}
                      @enderror
                    </label>
                  </div>
                  <div class="mb-3">
                    <label for="quotes" class="form-label">Quotes</label>
                    <input class="form-control" type="text" id="quotes" name="quotes" value="{{ old('quotes') }}">
                    <label for="" class="text-danger">
                      @error('quotes')
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