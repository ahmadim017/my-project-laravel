@extends('layouts.sbadmin')

@section('content')
<div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Penyedia</h6>
      </div>
      
      <div class="card-body">
    
      @if(session('status'))
          <div class="alert alert-success">
            {{session('status')}}
          </div>
        @endif 
    
      <form enctype="multipart/form-data"  class="bg-white shadow-sm p-3" action="{{route('datapenyedia.update',[$datapenyedia->id])}}" method="POST">
          @csrf
          <input type="hidden" value="PUT" name="_method">
        <label for="name">Nama Perusahaan</label>
      <input class="form-control {{$errors->first('namaperusahaan') ? "is-invalid" : ""}}" value="{{$datapenyedia->namaperusahaan}}" placeholder="Nama Perusahaan" type="text" name="namaperusahaan"/>
        <div class="invalid-feedbeck">
        {{$errors->first('namaperusahaan')}}</div>  
        <br>
        <label for="nip">Bentuk Usaha</label> 
        <select name="bentukusaha" class="form-control">
            <option value=""></option>
            <option @if ($datapenyedia->bentukusaha == "CV") selected @endif value="CV">CV</option>
            <option @if ($datapenyedia->bentukusaha == "PT") selected @endif value="PT">PT</option>
        </select>
          <div class="invalid-feedbeck">
            {{$errors->first('bentukusaha')}}
          </div>
          <br>
          <label for="email">Email</label>
        <input class="form-control {{$errors->first('email') ? "is-invalid" : ""}}" value="{{$datapenyedia->email}}" placeholder="email" type="text" name="email"/>
          <div class="invalid-feedbeck">
            {{$errors->first('email')}}
          </div>
          <br>
          <label for="email">NPWP</label>
          <input class="form-control {{$errors->first('npwp') ? "is-invalid" : ""}}" value="{{$datapenyedia->npwp}}" placeholder="npwp" type="text" name="npwp"/>
          <div class="invalid-feedbeck">
            {{$errors->first('npwp')}}
          </div>
          <br>
          <label for="email">Telpon</label>
          <input class="form-control {{$errors->first('telp') ? "is-invalid" : ""}}" value="{{$datapenyedia->telp}}" placeholder="Telpon" type="text" name="telp"/>
          <div class="invalid-feedbeck">
            {{$errors->first('telp')}}
          </div>
          <br>
          <label for="">Alamat</label>
        <textarea name="alamat" class="form-control {{$errors->first('alamat') ? "is-invalid" : ""}}" placeholder="Alamat Lengkap">{{$datapenyedia->alamat}}</textarea>
          <div class="invalid-feedbeck">
            {{$errors->first('alamat')}}
          </div>
          <br>
          <label for="">File Pendukung</label>
          <input type="file" class="form-control {{$errors->first('file') ? "is-invalid" : ""}}" name="file">
          <small class="text-muted">*Kosongkan jika tidak merubah file</small>
          <small class="text-muted">*input file pendukung max 5mb</small>
          <div class="invalid-feedbeck">
              {{$errors->first('file')}}
          </div>
          <br>
          <button class="btn btn-primary btn-sm" type="submit" value="Save"><i class="fa fa-save fa-sm"></i> Simpan</button>
            <a href="{{route('datapenyedia.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </form>
      </div>
      </div>
    </div>  
@endsection