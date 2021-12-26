@extends('layouts.master')
@section('title', 'Edit Data | Undangan Online')

@section('content')
<div class="section-header">
    <h1>Edit Data</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('index') }}">Client</a></div>
      <div class="breadcrumb-item">Edit Data</div>
    </div>
</div>

<div class="section-body">
    <div class="row">
      <div class="col-5">
        <div class="card">
          <form action="{{ route('update-data', $data_client->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="card-body" style="padding-bottom: 0px">
              <div class="form-group" style="margin-bottom: 0px">
                <label>Nama Client</label>
                <input type="text" class="form-control" name="nama_client" value="{{ $data_client->nama_client }}">
                <label for="" class="text-danger">
                  @error('nama_client')
                    {{ $message }}
                  @enderror
                </label>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" id="">
                  <option value="1" @if ($data_client->status == 1)    
                    selected
                    @endif>Aktif</option>
                  <option value="0"  @if ($data_client->status == 0)    
                    selected
                    @endif>Tidak Aktif</option>
                </select>
              </div>
            </div>
            <div class="card-footer text-right" style="padding-top: 0px">
              <button class="btn btn-primary mr-1" type="submit">Submit</button>
            </div>
          </form>
          </div>
      </div>
    </div>
  </div>
@endsection