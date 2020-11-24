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

        <form action="{{route('users.update',[$user->id])}}" enctype="multipart/form-data" method="POST" class="bg-white shadow-sm p-3">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <label for="">Username</label>
        <input type="text" value="{{$user->username}}" class="form-control" disabled><br>
        <label for="">Nama</label>
        <input type="text" value="{{$user->name}}" name="name" class="form-control"><br>
        <label for="">Email</label>
        <input type="text" value="{{$user->email}}" class="form-control" disabled><br>
        <label for="">Roles</label>
        <br>
        <div class="form-radio form-radio-inline">
            <input type="radio" name="roles" id="ADMIN" value="ADMIN" {{$user->roles == "ADMIN" ? "checked" : ""}}>
            <label for="form-radio-label" for="ADMIN">Admin</label>
        </div>
        <div class="form-radio form-radio-inline">
            <input type="radio" name="roles" id="USER" value="USER" {{$user->roles == "USER" ? "checked" : ""}}>
            <label for="form-radio-label" for="USER">User</label>
        </div>
        <div class="form-radio form-radio-inline">
            <input type="radio" name="roles" id="AUDITOR" value="AUDITOR" {{$user->roles == "AUDITOR" ? "checked" : ""}}>
            <label for="form-radio-label" for="AUDITOR">Auditor</label>
        </div>
        <div class="form-radio form-radio-inline">
            <input type="radio" name="roles" id="POKJA" value="POKJA" {{$user->roles == "POKJA" ? "checked" : ""}}>
            <label for="form-radio-label" for="AUDITOR">Pokja</label>
        </div><br>
        <label for="">Status</label>
        <br>
        <div class="form-radio form-radio-inline">
            <input type="radio" name="status" id="ACTIVE" value="ACTIVE" {{$user->status == "ACTIVE" ? "checked" : ""}}>
            <label for="form-radio-label" for="ACTIVE">ACTIVE</label>
        </div>
        <div class="form-radio form-radio-inline">
            <input type="radio" name="status" id="INACTIVE" value="INACTIVE" {{$user->status == "INACTIVE" ? "checked" : ""}}>
            <label for="form-radio-label" for="INACTIVE">INACTIVE</label>
        </div><br>
        <label for="telpon">Telpon</label>
        <input type="text" class="form-control {{$errors->first('phone') ? "IS-INVALID" : ""}}" name="telpon" id="telpon" value="{{$user->telpon}}" placeholder="Nomor HP/Telp">
        <br>
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control {{$errors->first('alamat') ? "IS-INVALID" : ""}}">{{$user->alamat}}</textarea><br>
        <label for="">Avatar</label>
        <br>
        Current image :
        <br>
        @if ($user->avatar) <img src="{{asset('storage/App/public/'.$user->avatar)}}" width="120px"><br><br>
        @else
        No Image 
        @endif
        <input type="file" class="form-control" name="avatar">
        <small class="text-muted">* kosongkan  jika tidak ingin mengubah avatar</small>
        <br>
        <button type="submit" class="btn btn-primary btn-sm" value="Simpan"><i class="fa fa-save fa-sm"></i> Simpan</button>
        <a href="{{route('users.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </form>
        </div>
        </div>
    </div>
@endsection
