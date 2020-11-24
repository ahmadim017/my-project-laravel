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
    
      <form enctype="multipart/form-data"  class="bg-white shadow-sm p-3" action="{{route('users.store')}}" method="POST">
    
          @csrf
        <label for="name">Name</label>
      <input class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" value="{{old('name')}}" placeholder="Full Name" type="text" name="name" id="name"/>
        <div class="invalid-feedbeck">
        {{$errors->first('name')}}</div>  
        <br>
        <label for="username">Username</label>
        <input class="form-control {{$errors->first('username') ? "is-invalid" : ""}}" value="{{old('username')}}" placeholder="username" type="text" name="username" id="username"/>
        <div class="invalid-feedbeck">
          {{$errors->first('username')}}
        </div>
        <br>
        <label for="">Roles</label>
          <br>
          <input class=" {{$errors->first('roles') ? "is-invalid" : ""}}" type="checkbox" name="roles" id="admin"  value="ADMIN"> 
            <label for="ADMIN">Admin</label>
          <input class=" {{$errors->first('roles') ? "is-invalid" : ""}}" type="checkbox" name="roles" id="user" value="USER"> 
            <label for="USER">User</label>
          <input class=" {{$errors->first('roles') ? "is-invalid" : ""}}" type="checkbox" name="roles" id="auditor" value="AUDITOR"> 
            <label for="AUDITOR">Auditor</label>
           <!-- 
           <input class=" {{$errors->first('roles') ? "is-invalid" : ""}}" type="checkbox" name="roles" id="pokja" value="POKJA"> 
            <label for="AUDITOR">Pokja</label>
           -->
          <br>
          <label for="phone">No Hp</label> 
          <br>
          <input type="text" name="telpon" value="{{old('telpon')}}" class="form-control {{$errors->first('telpon') ? "is-invalid" : ""}}">
          <div class="invalid-feedbeck">
            {{$errors->first('telpon')}}
          </div>
          <br>
          <label for="address">Alamat</label>
          <textarea name="alamat" id="alamat"  class="form-control {{$errors->first('alamat') ? "is-invalid" : ""}}">{{old('alamat')}}</textarea>
          <div class="invalid-feedbeck">
            {{$errors->first('alamat')}}
          </div>
          <br>
          <!--
          <label for="avatar">Avatar image</label>
          <br>
          <input id="avatar" name="avatar" type="file" class="form-control {{$errors->first('avatar') ? "is-invalid" : ""}}">
          <div class="invalid-feedbeck">
            {{$errors->first('avatar')}}
          </div>
          -->
          <label for="email">Email</label>
          <input class="form-control {{$errors->first('email') ? "is-invalid" : ""}}" value="{{old('email')}}" placeholder="user@mail.com" type="text" name="email" id="email"/>
          <div class="invalid-feedbeck">
            {{$errors->first('email')}}
          </div>
          <br>
          <label for="password">Password</label>
          <input class="form-control {{$errors->first('password') ? "is-invalid" : ""}}" placeholder="password" type="password" name="password" id="password"/>
          <div class="invalid-feedbeck">
            {{$errors->first('password')}}
          </div>
          <br>
          <label for="password_confirmation">Password Confirmation</label>
          <input class="form-control {{$errors->first('password_confirmation') ? "is-invalid" : ""}}" placeholder="password confirmation" type="password" name="password_confirmation" id="password_confirmation"/>
          <div class="invalid-feedbeck">
            {{$errors->first('password_confrimation')}}
          </div>
          <br>
          <button class="btn btn-primary btn-sm" type="submit" value="Save"><i class="fa fa-save fa-sm"></i> Simpan</button>
        <a href="{{route('users.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </form>
      </div>
      </div>
    </div>
@endsection