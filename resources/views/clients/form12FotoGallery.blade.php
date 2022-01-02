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
      @if ($foto_gallery != null)
      <div class="col-md-5 col-sm-12">
        <label for="" class="text-danger">
          Foto gallery sudah terisi
        </label>
        <div class="card">
          <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" style="padding-bottom: 0px;">
              <div class="form-group" style="margin-bottom: 0px;">
                  <label for="foto1" class="form-label">Foto 1 <span class="text-danger">*</span></label>
                  <input class="form-control" type="file" id="foto1" name="foto1" disabled>
                  <label for="" class="text-danger">
                    @error('foto1')
                      {{ $message }}
                    @enderror
                  </label>
              </div>
              <div>
                  <label for="foto2" class="form-label">Foto 2 <span class="text-danger">*</span></label>
                  <input class="form-control" type="file" id="foto2" name="foto2" disabled>
                  <label for="" class="text-danger">
                    @error('foto2')
                      {{ $message }}
                    @enderror
                  </label>
              </div>
              <div>
                <label for="foto3" class="form-label">Foto 3 <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="foto3" name="foto3" disabled>
                <label for="" class="text-danger">
                  @error('foto3')
                    {{ $message }}
                  @enderror
                </label>
             </div>
             <div>
                <label for="foto4" class="form-label">Foto 4 <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="foto4" name="foto4" disabled>
                <label for="" class="text-danger">
                  @error('foto4')
                    {{ $message }}
                  @enderror
                </label>
             </div>
             <div>
                <label for="foto5" class="form-label">Foto 5 <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="foto5" name="foto5" disabled>
                <label for="" class="text-danger">
                  @error('foto5')
                    {{ $message }}
                  @enderror
                </label>
             </div>
             <div>
                <label for="foto6" class="form-label">Foto 6 <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="foto6" name="foto6" disabled>
                <label for="" class="text-danger">
                  @error('foto6')
                    {{ $message }}
                  @enderror
                </label>
             </div>
             <div>
                <label for="foto7" class="form-label">Foto 7 <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="foto7" name="foto7" disabled>
                <label for="" class="text-danger">
                  @error('foto7')
                    {{ $message }}
                  @enderror
                </label>
             </div>
             <div>
                <label for="foto8" class="form-label">Foto 8 <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="foto8" name="foto8" disabled>
                <label for="" class="text-danger">
                  @error('foto8')
                    {{ $message }}
                  @enderror
                </label>
             </div>
             <div>
                <label for="foto9" class="form-label">Foto 9 <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="foto9" name="foto9" disabled>
                <label for="" class="text-danger">
                  @error('foto9')
                    {{ $message }}
                  @enderror
                </label>
             </div>
             <div>
                <label for="foto10" class="form-label">Foto 10 <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="foto10" name="foto10" disabled>
                <label for="" class="text-danger">
                  @error('foto10')
                    {{ $message }}
                  @enderror
                </label>
             </div>
             <div>
                <label for="foto11" class="form-label">Foto 11 <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="foto11" name="foto11" disabled>
                <label for="" class="text-danger">
                  @error('foto11')
                    {{ $message }}
                  @enderror
                </label>
             </div>
             <div class="mb-3">
                <label for="foto12" class="form-label">Foto 12 <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="foto12" name="foto12" disabled>
                <label for="" class="text-danger">
                  @error('foto12')
                    {{ $message }}
                  @enderror
                </label>
             </div>
            </div>
            <div class="card-footer text-right" style="padding-top: 0px">
              <a href="{{ route('form-foto-gallery', $id_client) }}" class="btn btn-secondary">Kembali</a>
            </div>
          </form>
          </div>
      </div>
      @else
      <div class="col-md-5 col-sm-12">
        <div class="card">
          <form action="{{ route('input-12-foto-gallery', $id_client) }}" method="POST" enctype="multipart/form-data">
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
               <div>
                  <label for="foto6" class="form-label">Foto 6 <span class="text-danger">*</span></label>
                  <input class="form-control" type="file" id="foto6" name="foto6">
                  <label for="" class="text-danger">
                    @error('foto6')
                      {{ $message }}
                    @enderror
                  </label>
               </div>
               <div>
                  <label for="foto7" class="form-label">Foto 7 <span class="text-danger">*</span></label>
                  <input class="form-control" type="file" id="foto7" name="foto7">
                  <label for="" class="text-danger">
                    @error('foto7')
                      {{ $message }}
                    @enderror
                  </label>
               </div>
               <div>
                  <label for="foto8" class="form-label">Foto 8 <span class="text-danger">*</span></label>
                  <input class="form-control" type="file" id="foto8" name="foto8">
                  <label for="" class="text-danger">
                    @error('foto8')
                      {{ $message }}
                    @enderror
                  </label>
               </div>
               <div>
                  <label for="foto9" class="form-label">Foto 9 <span class="text-danger">*</span></label>
                  <input class="form-control" type="file" id="foto9" name="foto9">
                  <label for="" class="text-danger">
                    @error('foto9')
                      {{ $message }}
                    @enderror
                  </label>
               </div>
               <div>
                  <label for="foto10" class="form-label">Foto 10 <span class="text-danger">*</span></label>
                  <input class="form-control" type="file" id="foto10" name="foto10">
                  <label for="" class="text-danger">
                    @error('foto10')
                      {{ $message }}
                    @enderror
                  </label>
               </div>
               <div>
                  <label for="foto11" class="form-label">Foto 11 <span class="text-danger">*</span></label>
                  <input class="form-control" type="file" id="foto11" name="foto11">
                  <label for="" class="text-danger">
                    @error('foto11')
                      {{ $message }}
                    @enderror
                  </label>
               </div>
               <div class="mb-3">
                  <label for="foto12" class="form-label">Foto 12 <span class="text-danger">*</span></label>
                  <input class="form-control" type="file" id="foto12" name="foto12">
                  <label for="" class="text-danger">
                    @error('foto12')
                      {{ $message }}
                    @enderror
                  </label>
               </div>
              </div>
            <div class="card-footer text-right" style="padding-top: 0px">
              <a href="{{ route('form-foto-gallery', $id_client) }}" class="btn btn-secondary">Kembali</a>
              <button class="btn btn-primary ml-1" type="submit">Submit</button>
            </div>
          </form>
          </div>
      </div>
      @endif

    </div>
  </div>
@endsection