@extends('layouts.sbadmin')

@section('content')
<div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
      </div>
      
      <div class="card-body">
    
      @if(session('status'))
          <div class="alert alert-success">
            {{session('status')}}
          </div>
        @endif 
    
      <form enctype="multipart/form-data"  class="bg-white shadow-sm p-3" action="{{route('daftarpokja.store')}}" method="POST">
          @csrf
        <label for="name">Name</label>
        <input class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" value="{{old('name')}}" placeholder="Full Name" type="text" name="nama"/>
        <div class="invalid-feedbeck">
        {{$errors->first('name')}}</div>  
        <br>
          <label for="phone">NIP</label> 
          <br>
          <input type="text" name="nip" value="{{old('nip')}}" class="form-control {{$errors->first('nip') ? "is-invalid" : ""}}" placeholder="Nip">
          <div class="invalid-feedbeck">
            {{$errors->first('nip')}}
          </div>
          <br>
          <label for="email">Golongan</label>
          <input class="form-control {{$errors->first('golongan') ? "is-invalid" : ""}}" value="{{old('golongan')}}" placeholder="golongan" type="text" name="golongan"/>
          <div class="invalid-feedbeck">
            {{$errors->first('golongan')}}
          </div>
          <br>
          <label for="role">Role</label>
          <select name="role" class="form-control {{$errors->first('role') ? "is-invalid" : ""}}">
            <option value=""></option>
            <option value="POKJA">POKJA</option>
            <option value="KEPALA UKPBJ">Kepala UKPBJ</option>
            <option value="PPTK">PPTK</option>
          </select>
          <div class="invalid-feedbeck">{{$errors->first('role')}}</div>
          <br>
        <label for="">Status</label>
        <div class="form-radio form-radio-inline">
            <input type="radio" name="status" id="ACTIVE" value="ACTIVE">
            <label for="form-radio-label" for="ACTIVE">ACTIVE</label>
        </div>
        <div class="form-radio form-radio-inline">
            <input type="radio" name="status" id="INACTIVE" value="INACTIVE">
            <label for="form-radio-label" for="INACTIVE">INACTIVE</label>
        </div><br>
          <button class="btn btn-primary btn-sm" type="submit" value="Save"><i class="fa fa-save fa-sm"></i> Simpan</button>
            <a href="{{route('daftarpokja.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </form>
      </div>
      </div>
    </div>  
@endsection