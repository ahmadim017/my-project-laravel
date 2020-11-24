@extends('layouts.sbadmin') 

@section('content')
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
              </div>
        <div class="card-body">

        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <form action="{{route('profil.update',[$profil->id])}}" enctype="multipart/form-data" method="POST" class="bg-white shadow-sm p-3">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <label for="">Username</label>
        <input type="text" value="{{$profil->username}}" class="form-control" disabled><br>
        <label for="">Nama</label>
        <input type="text" value="{{$profil->name}}" name="name" class="form-control"><br>
        <label for="">Email</label>
        <input type="text" value="{{$profil->email}}" class="form-control" disabled><br>
        <label for="telpon">Telpon</label>
        <input type="text" class="form-control {{$errors->first('phone') ? "IS-INVALID" : ""}}" name="telpon" id="telpon" value="{{$profil->telpon}}" placeholder="Nomor HP/Telp">
        <br>
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control {{$errors->first('alamat') ? "IS-INVALID" : ""}}">{{$profil->alamat}}</textarea><br>
        <label for="">Avatar</label>
        <br>
        Current image :
        <br>
        @if ($profil->avatar) <img src="{{asset('storage/App/public/'.$profil->avatar)}}" width="120px"><br><br>
        @else
        No Image 
        @endif
        <input type="file" class="form-control" name="avatar">
        <small class="text-muted">* kosongkan  jika tidak ingin mengubah avatar</small>
        <br>
        <button type="submit" class="btn btn-primary btn-sm" value="Simpan"><i class="fa fa-save fa-sm"></i> Simpan</button>
        <a href="{{route('profil.show',[$profil->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </form>
        </div>
        </div>
    </div>
@endsection