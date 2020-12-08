
@extends('layouts.sbadmin')

@section('content')
<div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body box-profile">
      <h3 class="profile-username text-center">{{$user->name}}</h3>

      <p class="text-muted text-center">{{$user->email}}</p>

      <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
          <b>Username</b> <a class="float-right">{{$user->username}}</a>
        </li>
        <li class="list-group-item">
          <b>Telp/Hp</b> <a class="float-right">{{$user->telpon}}</a>
        </li>
        <li class="list-group-item">
          <b>Alamat</b> <a class="float-right">{{$user->alamat}}</a>
        </li>
        <li class="list-group-item">
        <b>Role</b> <a class="float-right">{{$user->roles}}</a>
          </li>
          <li class="list-group-item">
              <b>Status</b> <a class="float-right">{{$user->status}}</a>
            </li>
      </ul>

    <a href="{{route('profil.edit',[$user->id])}}" class="btn btn-primary btn-sm">Edit</a>

    </div>
    <!-- /.card-body -->
  </div>
@endsection
