@extends('layouts.sbadmin')

@section('content')
<div class="col-md-10">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pegawai Pokja</h6>
      </div>
      
      <div class="card-body">
    
      @if(session('status'))
          <div class="alert alert-success">
            {{session('status')}}
          </div>
        @endif 
        <form action="{{route('pokja.tambahdata',[$pokja->id])}}" enctype="multipart/form-data" method="POST" class="bg-white shadow-sm p-3">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <div class="breadcrumb">
            Daftar Pegawai UKPBJ
        </div>
<table  class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>User ID</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $u)
            <tr>
            <td><input type="checkbox" class="checkbox" name="id_user[]" value="{{$u->id}}"/></td>
            <td>{{$u->name}}</td>
            <td>{{$u->username}}</td>
            <td>{{$u->email}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>  <hr>
        <button type="submit" class="btn btn-primary btn-sm" value="Simpan"><i class="fa fa-save fa-sm"></i> Simpan</button>
        <a href="{{route('pokja.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </form>
      </div>
    </div>
</div>
@endsection